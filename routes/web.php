<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::post('/merch', function(Request $request){
	$xml = '<?xml version="1.0" encoding="UTF-8"?><TKKPG><Request><Operation>CreateOrder</Operation><Language>RU</Language><Order><Merchant>55079</Merchant><OrderType>Purchase</OrderType><Amount>300000</Amount><Currency>643</Currency><Description>Оплата покупки</Description><ApproveURL>https://shop.com/approve.php</ApproveURL><CancelURL>https://shop.com/cancel.php</CancelURL><DeclineURL>https://shop.com/decline.php</DeclineURL><AddParams><SenderEmail>test@test.com</SenderEmail></AddParams></Order></Request></TKKPG>';

	$url = "https://mpitest.bspb.ru:5443/Exec"; // URL to make some test
	$ch = curl_init($url);

	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_PORT, 5443);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
	curl_setopt($ch, CURLOPT_VERBOSE, true);
	curl_setopt($ch, CURLOPT_SSLKEY, '/home/s/starlinorg/lm/privateKey.key');
	curl_setopt($ch, CURLOPT_SSLCERT, '/home/s/starlinorg/lm/sebalab.pem');
	curl_setopt($ch, CURLOPT_CAINFO, '/home/s/starlinorg/lm/sebalab.pem');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

	
	$data = curl_exec($ch);

dd($data);
	if(curl_errno($ch))
		print curl_error($ch);
	else
		curl_close($ch);

	return redirect('https://mpitest.bspb.ru/index.jsp?ORDERID='.$orderID.'&SESSIONID='.$sessionID);
});

Route::get('/merch', function(Request $request){
	return view('merch', [])->render();
});

Route::get('/price', function(Request $request){
	$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('price_tpl.xls');
	$worksheet = $spreadsheet->getActiveSheet();

  	$categories = [];
	$roots = \App\Category::defaultOrder()->whereIsRoot()->get();
	foreach ($roots as $root)
	{
		$categories[] = makeCategory($root,0);
			foreach ($root->children()->defaultOrder()->whereEnabled(1)->get() as $sub){
			$categories[] = makeCategory($sub,1);
			foreach($sub->children()->defaultOrder()->whereEnabled(1)->get() as $sub2){
    			$categories[] = makeCategory($sub2,2);
					foreach($sub2->children()->defaultOrder()->whereEnabled(1)->get() as $sub3){
					$categories[] = makeCategory($sub3,3);
					foreach($sub3->children()->defaultOrder()->whereEnabled(1)->get() as $sub4){
    					$categories[] = makeCategory($sub4,4);
    				}
    			}
    		}
    	}
    }

    $i=11;
    foreach ($categories as $c) {
	    $cStyles = $worksheet->getStyle('C'.($c->level+2));
    	$worksheet->duplicateStyle($cStyles, 'C'.$i);
    	$worksheet->getCell('A'.$i)->setValue('c');
    	$worksheet->getCell('B'.$i)->setValue($c->id);
    	$worksheet->getCell('C'.$i)->setValue($c->name);
    	$worksheet->mergeCells('C'.$i.':F'.$i);
    	$i++;
    	$itemType = 0;
    	$itemOffset = 6;
    	foreach ($c->products as $p) {
    		$line = $itemType + $itemOffset;
	    	$worksheet->duplicateStyle($worksheet->getStyle('C'.$line), 'C'.$i);
	    	$worksheet->duplicateStyle($worksheet->getStyle('D'.$line), 'D'.$i);
	    	$worksheet->duplicateStyle($worksheet->getStyle('E'.$line), 'E'.$i);
	    	$worksheet->duplicateStyle($worksheet->getStyle('F'.$line), 'F'.$i);
	    	$worksheet->getCell('A'.$i)->setValue('p');
    		$worksheet->getCell('B'.$i)->setValue($p->id);
    		$worksheet->getCell('E'.$i)->setValue($p->sku);
    		$worksheet->getCell('C'.$i)->setValue($p->name);
    		$worksheet->getCell('F'.$i)->setValue($p->timelength);
    		$worksheet->getCell('D'.$i)->setValue($p->price);
    		$i++;
    		if($p->description){
		    	$worksheet->duplicateStyle($worksheet->getStyle('C'.($line+1)), 'C'.$i);
		    	$worksheet->duplicateStyle($worksheet->getStyle('D'.($line+1)), 'D'.$i);
		    	$worksheet->duplicateStyle($worksheet->getStyle('E'.($line+1)), 'E'.$i);
		    	$worksheet->duplicateStyle($worksheet->getStyle('F'.($line+1)), 'F'.$i);
	    		$worksheet->getCell('D'.$i)->setValue($p->description);
		    	$worksheet->getCell('A'.$i)->setValue('d');
	    		$i++;
	    	}
	    	if($itemType == 0)
	    		$itemType = 2;
	    	else
	    		$itemType = 0;
    	}
    }
    $worksheet->getColumnDimension('A')->setVisible(true);
    $worksheet->getColumnDimension('B')->setVisible(true);
    $worksheet->getRowDimension('1')->setVisible(true);
    $worksheet->getRowDimension('2')->setVisible(true);
    $worksheet->getRowDimension('3')->setVisible(true);
    $worksheet->getRowDimension('4')->setVisible(true);
    $worksheet->getRowDimension('5')->setVisible(true);
    $worksheet->getRowDimension('6')->setVisible(true);
    $worksheet->getRowDimension('7')->setVisible(true);
	$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xls');
	$writer->save('price.xls');

});

function makeCategory($c, $level){
	$category = new	\StdClass;
	$category->name = $c->title;
	$category->id = $c->id;
	$category->level = $level;
	$category->products = $c->products()->whereEnabled(1)->orderBy('feature', 'desc')->orderBy('position')->orderBy('name')->get();
	return $category;
}

Route::post('admin/upload_price', function (Request $request){
	$deleteall = request()->get('deleteall');
	if($deleteall){
		\App\Category::truncate();
		\App\Product::truncate();
		DB::table('product_categories')->delete();
	}
//	dd(Request::file('price'));
	Excel::import(new \App\Imports\ProductsImport, Request::file('price'), null, \Maatwebsite\Excel\Excel::XLS);
//	Excel::import(new \App\Imports\ProductsImport, public_path().'/price.xls', null, \Maatwebsite\Excel\Excel::XLSX);
	return redirect('/admin/products')->with('success', 'All good!');
});

Route::post('admin/upload_tpl', function (Request $request){
	$file = Request::file('tpl');
	$file->move(public_path(), 'price_tpl.xls');
	return redirect('/admin/products')->with('success', 'All good!');
});

Route::get('cart/add/{id}', function (Request $request, $id){
	return response()->json(\App\Cart::add($id));
});

Route::get('cart/remove/{id}', function (Request $request, $id){
	return response()->json(\App\Cart::remove($id));
});

foreach (\App\Page::where('enabled',1)->get() as $page) {
	Route::get($page->slug, function ()use($page){
		if($page->slug == '/')
			$p = 'home';
		else
			$p = $page->slug;
		return view()->first([$p, 'page'], ['page'=>$page])->render();
	});
}

Route::get('cart', function (Request $request){
    $validator = Validator::make(['phone'=>''],[]);
	return view('cart_list', ['order'=>new \App\Order, 'messages'=>$validator->messages()])->render();
});

Route::get('checkout/{url}', function (Request $request, $url){
	return view('checkout', ['order'=>\App\Order::whereUrl($url)->first()])->render();
});

Route::post('checkout/{url}', '\App\Http\Controllers\PaymentController@createOrder');
Route::post('order/{url}', '\App\Http\Controllers\PaymentController@createOrder');
Route::post('payment/{order_id}/{payment_id}', '\App\Http\Controllers\PaymentController@payment');
// Route::get('kkt/{order_id}', function(Request $request, $order_id){
// 	$order = \App\Order::find($order_id);
//     if(settings('kkt', '')){
//         $kkt = config('kkt.'.settings('kkt', ''));
//     	if($kkt){
//             $token = Cache::store('file')->get('kkt_token_');
//             if(!$token){
//                 $ch = curl_init($kkt['api_url'].'/token');
//                 $params = json_encode( ['login'=>$kkt['login'], 'password'=>$kkt['password']] );
// 	            curl_setopt($ch, CURLOPT_POST, 1);
// 	            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
// 	            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//                 $response = json_decode(curl_exec($ch));
//                 dd($response);
//                 if($token = $response->token){
//                 	Cache::store('file')->put('kkt_token_', $token);
//                 }

//                 $items = [];
//                 foreach ($order->items as $item) {
//                 	if($kkt['tax'] == 'vat0')
//                 		$tax = 0;
//                 	if($kkt['tax'] == 'none')
//                 		$tax = 0;
//                 	if($kkt['tax'] == 'vat10')
//                 		$tax = $item->price*10 / 110;
//                 	if($kkt['tax'] == 'vat110')
//                 		$tax = $item->price*10/100 + $item->price;
//                 	if($kkt['tax'] == 'vat20')
//                 		$tax = round($item->price*20 / 120, 2);
//                 	if($kkt['tax'] == 'vat120')
//                 		$tax = $item->price*20/100 + $item->price;
//                 	if($kkt['tax'] == 'vat18')
//                 		$tax = round($item->price*18 / 118, 2);
//                 	if($kkt['tax'] == 'vat118')
//                 		$tax = $item->price*18/100 + $item->price;
                	
//                 	$items[] = [
//                 		"name" =>$item->name,
//                 		"type" => 4,
//                 		"price" =>$item->price,
//                 		"quantity" => 1,
//                 		"sum" =>$item->price,
//                 		"tax" => $kkt['tax'],
//                 		"tax_sum" => 1//round($tax,2)
//                 	];
//                 }

//                 $chData = [
//                 	"timestamp"=>date("d.m.Y h:i:s"),
//                 	"external_id"=>"order_".$order->id,
//                 	"service"=> [
//                 		"callback_url"=>$kkt["callback_url"]
//                 	],
//                 	"receipt"=>[
//                 		"attributes"=>[
//                 			"email"=>$order->email,
//                 			"phone"=>$order->phone,
//                 			"name"=>'',//$order->name,
//                 			"inn"=>''
//                 		],
// 	                	"items"=>$items,
// 	                	"total"=>$order->total,
// 	                	"payments"=>[
// 	                		["type"=>1, "sum"=>$order->total]
// 	                	]
//                 	],
//                 ];

//                 //dd(json_encode($chData));
//                 $ch = curl_init($kkt['api_url'].'/'.$kkt['shop_id'].'/sell?token='.$token);
//                 $params = json_encode($chData);
// 	            curl_setopt($ch, CURLOPT_POST, 1);
// 	            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
// 	            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//                 $response = json_decode(curl_exec($ch));
//                 dd($response);
//             }
//         }
//     }	
// });


Route::get('order/{url}', function (Request $request, $url){
	return view('order', ['order'=>\App\Order::whereUrl($url)->first(), 'orderStatus'=>request()->get('orderStatus'), 'status'=>request()->get('status')])->render();
});

Route::post('cart', function (Request $request){
	$personal_id = Request::input('personal_id');
    $validator = Validator::make(
    	[
    		'phone'=>Request::input('phone'),
    		'email'=>Request::input('email')
    	], 
    	[
        	'phone' => ['required', 'string', 'max:255'],
        	'email' => ['required', 'email'],
    	]);
    $cart = \App\Cart::content();
  	$order = new \App\Order;
	$order->name = Request::input('name');
	$order->phone = Request::input('phone');
	$order->email = Request::input('email');
	$order->url = uniqid();
	$order->paid = 0;
	$order->status_id = 0;
	$order->total = $cart['total'];
	$order->payment_id = Request::input('payment_id');
	if(auth()->user())
		$order->user_id =auth()->user()->id; 
    if(!$validator->fails()){
    	$order->save();
    	$pids = Request::input('items');
    	$products = \App\Product::whereIn('id', $pids)->get();
    	foreach ($products as $p) {
    		$item = new \App\OrderItem;
    		$item->product_id = $p->id;
    		$item->name = $p->name;
    		$item->price = $p->getPrice();
    		$item->order_id = $order->id;
    		$item->save();
    	}
    	\App\Cart::clear();
    	Mail::send('email.order_created', ['order'=>$order], function($message)use($order){
    		$message->from(env('MAIL_FROM_ADDRESS'))->to($order->email)->subject('Новый заказ на сайте Cerbalab.ru');
    	});
        Mail::send('email.admin.order_created', ['order'=>$order], function($message)use($order){
            $message->from(env('MAIL_FROM_ADDRESS'))->to(settings('order_email',env('MAIL_FROM_ADDRESS')))->subject('Cerbalab.ru: оплата заказа № '.$order->id);
        });
    	return redirect('/checkout/'.$order->url);
    }
	return view('cart_list', ['order'=>$order, 'messages'=>$validator->messages()])->render();
});

Route::get('akcii', function (Request $request){
	return view('akcii', [])->render();
});

Route::get('nashi-specialisty', function (Request $request){
	return view('nashi-specialisty', [])->render();
});

Route::get('nashi-specialisty/{slug}', function (Request $request, $slug){
	$personal = \App\Personal::whereSlug($slug)->whereEnabled(1)->first();
	if(!$personal)
		abort(404);
	return view('personal', ['personal'=>$personal])->render();
});

Route::get('zapisatsya', function (Request $request){
	$personal_id = Request::input('doctor');
    $validator = Validator::make(['phone'=>''],[]);
	return view('zapisatsya', ['personal_id'=>$personal_id, 'reception'=>new \App\Reception, 'messages'=>$validator->messages()])->render();
});

Route::post('zapisatsya_', function (Request $request){
	$personal_id = Request::input('personal_id');
    $validator = Validator::make(['phone'=>Request::input('phone')], [
        'phone' => ['required', 'string', 'max:255'],
    ]);
  	$reception = new \App\Reception;
	$reception->name = Request::input('name');
	$reception->phone = Request::input('phone');
	$reception->personal_id = Request::input('personal_id');
	$reception->reception_time = Request::input('reception_time');
	$reception->description = Request::input('description');
    if(!$validator->fails()){
    	$reception->save();
        Mail::send('email.admin.reception', ['reception'=>$reception], function($message)use($reception){
            $message->from(env('MAIL_FROM_ADDRESS'))->to(settings('claim_email',env('MAIL_FROM_ADDRESS')))->subject('Новая запись на прем');
        });
    }
	return view('zapisatsya', ['personal_id'=>$personal_id, 'reception'=>$reception, 'messages'=>$validator->messages()])->render();
});

Route::get('products/{slug}', function (Request $request, $slug){
	$category = \App\Category::whereSlug($slug)->whereEnabled(1)->first();
	if(!$category)
		abort(404);
	$data = request()->all();
	if(!isset($data['p']) )
		$p=1;
	else
		$p=$data['p'];

	$cids = $category->descendants()->pluck('id')->toArray();
	$cids[] = $category->id;
	$ids = \App\Product::whereHas('categories', function($query)use($cids){
		$query->whereIn('category_id', $cids);
	})->where('enabled',1)->pluck('id')->toArray();
	$ps = ceil(count($ids)/50);
	$products = \App\Product::whereIn('id', $ids)->orderBy('position')->orderBy('name')->skip(($p-1)*50)->limit(50)->get();
	$dids = \App\Category::ancestorsAndSelf($category->id)->pluck('id')->toArray();
	return view('products', ['products'=>$products, 'page'=>$category, 'cids'=>$dids, 'cid'=>$category->id, 'p'=>$p,'ps'=>$ps])->render();
});

Route::post('search', function (Request $request){
	$data = request()->all();
	$q = '%'.$data['query'].'%';
	$ids = [];
	if($q){
	    $ids = \App\Product::where('name', 'like', $q)
		->orWhere('sku','like', $q)->orWhere('description', 'like',$q)->pluck('id')->toArray();
	}
	if(!isset($data['p']) )
		$p=1;
	else
		$p=$data['p'];

	$products = \App\Product::whereIn('id', $ids)->orderBy('name')->skip(($p-1)*50)->limit(50)->get();
	$ps = ceil(count($ids)/50);
	$page = new \StdClass;
	$page->h1 ='Поиск '.$q;
	$page->title ='Поиск '.$q;
	$page->description ='Поиск '.$q;
	$page->keywords ='Поиск '.$q;
	$page->slug = 'search';
	return view('products', ['products'=>$products, 'page'=>$page, 'cids'=>[], 'cid'=>0, 'p'=>$p,'ps'=>$ps])->render();
});

Route::get('product/{slug}', function (Request $request, $slug){
	$product = \App\Product::whereSlug($slug)->whereEnabled(1)->first();
	if(!$product)
		abort(404);
    $validator = Validator::make(['name'=>''],[]);
	
	return view('product', ['product'=>$product, 'page'=>$product, 'comment'=>new \App\Comment, 'messages'=>$validator->messages()])->render();
});

Route::post('product/{slug}', function (Request $request, $slug){
	$product = \App\Product::whereSlug($slug)->whereEnabled(1)->first();
	if(!$product)
		abort(404);
	
	$name = Request::input('name');
	$message = Request::input('message');
    $validator = Validator::make(
    	['name'=>Request::input('name'),'message'=>Request::input('message')], 
    	['name' => 'required','message' => 'required']
	);
  	$comment = new \App\Comment;
	$comment->name = Request::input('name');
	$comment->text = Request::input('message');
	$comment->approved = 0;
	$comment->product_id = Request::input('product_id');
    if(!$validator->fails()){
    	$comment->save();
    }
	return view('product', ['product'=>$product, 'page'=>$product, 'comment'=>$comment, 'messages'=>$validator->messages()])->render();
});

Route::get('/search/{keywords}', function () {
});

Route::get('preview_pdf', function(Request $request){
	mkdir(public_path().'/111');
	$im = new Imagick();
	$im->setRegistry('temporary-path', public_path().'/1.jpg');
	$im->readImage(public_path().'/files/uploads/1.pdf');
	$im->setImageFormat('jpg');
	$im->thumbnailImage(220, 0);
	header('Content-Type: image/jpeg');
	echo $im;
});
Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
