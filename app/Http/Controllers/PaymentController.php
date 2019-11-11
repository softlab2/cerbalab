<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Payment;
use \App\Order;
use Mail;
use Cache;

class PaymentController extends Controller
{
    public function createOrder(Request $request)
    {
        $order = \App\Order::find($request->input('order_id'));
        $payment = \App\Payment::find($request->input('payment_id'));
        $settings = $payment->settings;

        $xml = '<TKKPG><Request><Operation>CreateOrder</Operation><Language>RU</Language><Order><Merchant>{mercahntID}</Merchant><OrderType>Purchase</OrderType><Amount>{amount}00</Amount><Currency>{currency}</Currency><Description>Оплата покупки</Description><ApproveURL>{approveURL}</ApproveURL><CancelURL>{cancelURL}</CancelURL><DeclineURL>{declineURL}</DeclineURL><AddParams><SenderEmail>test@test.com</SenderEmail></AddParams></Order></Request></TKKPG>';//$settings['xml'];
        $xml = str_replace('{mercahntID}', $settings['merchant_id'], $xml);
        $xml = str_replace('{amount}', $order->total, $xml);
        
        $xml = str_replace('{currency}', $settings['currency'], $xml);
        $xml = str_replace('{approveURL}', $settings['approve_url'].'/'.$order->id.'/'.$payment->id, $xml);
        $xml = str_replace('{cancelURL}', $settings['cancel_url'].'/'.$order->id.'/'.$payment->id, $xml);
        $xml = str_replace('{declineURL}', $settings['decline_url'].'/'.$order->id.'/'.$payment->id, $xml);

        if($settings['test'] && 0)
           $url = "http://bank.cerbalab.ru/exec.php";
        else
            $url = $settings['create_order_url'];

        $ch = curl_init($url);
//        if(!$settings['test']){
//            curl_setopt($ch, CURLOPT_PORT, 443);
//        }
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_PORT, 5443);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
        curl_setopt($ch, CURLOPT_VERBOSE, $settings['test']);
        curl_setopt($ch, CURLOPT_SSLKEY, $settings['key_path']);
        curl_setopt($ch, CURLOPT_SSLCERT, $settings['cert_path']);
        curl_setopt($ch, CURLOPT_CAINFO, $settings['cert_path']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);

        $data = new \SimpleXMLElement($response);
        $status = (string)$data->Response->Status;
        $orderID = (string)$data->Response->Order->OrderID;
        $sessionID = (string)$data->Response->Order->SessionID;
        $url = (string)($data->Response->Order->URL).'?ORDERID='.$orderID."&SESSIONID=".$sessionID;
        session(['ORDERID'=>$orderID]);
        session(['SESSIONID'=>$sessionID]);
        if($settings['test'])
            if($status == '00')
                return view('redirect', ['url'=> $url]);
            else
                dd('error1');
        else
            return view('redirect', ['url'=> $url]);
//            return redirect('https://mpitest.bspb.ru/index.jsp?ORDERID='.$orderID.'&SESSIONID='.$sessionID);
    }

    public function payment(Request $request, $order_id, $payment_id)
    {
        $order = \App\Order::find($order_id);
        $orderId = session('ORDERID');
        $sessionId = session('SESSIONID');
        $payment = \App\Payment::find($payment_id);

        $settings = $payment->settings;

        $xml = view('request', ['merchantId'=>$settings['merchant_id'],'orderId'=>$orderId,'sessionId'=>$sessionId])->render();

        if($settings['test'] && 0)
            $url = "http://bank.cerbalab.ru/exec2.php";
        else
            $url = $settings['create_order_url'];

        $ch = curl_init($url);
        if(!$settings['test']){
            curl_setopt($ch, CURLOPT_PORT, 443);
        }
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_PORT, 5443);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
        curl_setopt($ch, CURLOPT_VERBOSE, $settings['test']);
        curl_setopt($ch, CURLOPT_SSLKEY, $settings['key_path']);
        curl_setopt($ch, CURLOPT_SSLCERT, $settings['cert_path']);
        curl_setopt($ch, CURLOPT_CAINFO, $settings['cert_path']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);

        $data = new \SimpleXMLElement($response);
        $status2 = (string)$data->Response->Status;
        $orderId2 = (string)$data->Response->Order->OrderID;
        $orderStatus = (string)$data->Response->Order->OrderStatus;

        session('ORDERID','');
        session('SESSIONID','');
        if($status2 == '00' && $orderStatus == 'APPROVED'){
            $order->paid = 1;
            $order->payment_id = $payment->id;
            $order->save();
            Mail::send('email.order_paid', ['order'=>$order], function($message)use($order){
                $message->from(env('MAIL_FROM_ADDRESS'))->to($order->email)->subject('Cerbalab.ru: оплата заказа № '.$order->id);
            });
            Mail::send('email.admin.order_paid', ['order'=>$order], function($message)use($order){
                $message->from(settings('order_email',env('MAIL_FROM_ADDRESS')))->subject('Cerbalab.ru: оплата заказа № '.$order->id);
            });
            if(settings('kkt', '')){
                $kkt = config('kkt.'.settings('kkt', ''));
                if($kkt){
                    $token = Cache::store('file')->get('kkt_token_');
                    if(!$token){
                        $ch = curl_init($kkt['api_url'].'/token');
                        $params = json_encode( ['login'=>$kkt['login'], 'password'=>$kkt['password']] );
                        curl_setopt($ch, CURLOPT_POST, 1);
                        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                        $response = json_decode(curl_exec($ch));
                        if($token = $response->token){
                            Cache::store('file')->put('kkt_token_', $token);
                        }

                        $items = [];
                        foreach ($order->items as $item) {
                            if($kkt['tax'] == 'vat0')
                                $tax = 0;
                            if($kkt['tax'] == 'none')
                                $tax = 0;
                            if($kkt['tax'] == 'vat10')
                                $tax = $item->price*10 / 110;
                            if($kkt['tax'] == 'vat110')
                                $tax = $item->price*10/100 + $item->price;
                            if($kkt['tax'] == 'vat20')
                                $tax = round($item->price*20 / 120, 2);
                            if($kkt['tax'] == 'vat120')
                                $tax = $item->price*20/100 + $item->price;
                            if($kkt['tax'] == 'vat18')
                                $tax = round($item->price*18 / 118, 2);
                            if($kkt['tax'] == 'vat118')
                                $tax = $item->price*18/100 + $item->price;
                            
                            $items[] = [
                                "name" =>$item->name,
                                "type" => 4,
                                "price" =>$item->price,
                                "quantity" => 1,
                                "sum" =>$item->price,
                                "tax" => $kkt['tax'],
                                "tax_sum" => 1//round($tax,2)
                            ];
                        }

                        $chData = [
                            "timestamp"=>date("d.m.Y h:i:s"),
                            "external_id"=>"order_".$order->id,
                            "service"=> [
                                "callback_url"=>$kkt["callback_url"]
                            ],
                            "receipt"=>[
                                "attributes"=>[
                                    "email"=>$order->email,
                                    "phone"=>$order->phone,
                                    "name"=>'',//$order->name,
                                    "inn"=>''
                                ],
                                "items"=>$items,
                                "total"=>$order->total,
                                "payments"=>[
                                    ["type"=>1, "sum"=>$order->total]
                                ]
                            ],
                        ];

                        $ch = curl_init($kkt['api_url'].'/'.$kkt['shop_id'].'/sell?token='.$token);
                        $params = json_encode($chData);
                        curl_setopt($ch, CURLOPT_POST, 1);
                        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                        $response = json_decode(curl_exec($ch));
//                        dd($response);
                    }
                }
            }   
        }
        return redirect('/order/'.$order->url.'?orderStatus='.$orderStatus.'&status='.$status2);

    }

    public function approved(Request $request)
    {
    }

    public function cancel(Request $request)
    {
    }

    public function decline(Request $request)
    {
    }

}
