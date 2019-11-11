<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Payment;
use \App\Order;

class BankController extends Controller
{
    public function payment_process(Request $request)
    {
        $orderId = $request->input('ORDERID');
        $sessionId = $request->input('SESSIOID');
        return view('payment_process', ['url'=>$url]);
    }

    public function exec(Request $request)
    {
        $url = 'http://lm.cerbalab.ru/payment/'.\App\Order::max('id').'/2';
        return response()->view('response', ['url'=>$url])->header('Content-type', 'text/xml');
    }

    public function exec2(Request $request)
    {
        return response()->view('response2')->header('Content-type', 'text/xml');
    }

}
