<?php

namespace App;	

class Cart{
	public static function has($id){
			if(!session()->has('cart')){
				return false;
			}else{
				$cart = session('cart');
				return isset($cart[$id]);
			}
	}

	public static function add($id){
		if($product = \App\Product::find($id)){
			if(!session()->has('cart')){
				session(['cart'=>[]]);
			}
			$cart = session('cart');
			if(!isset($cart[$id])){
				$cart[$id] = $product->getPrice();
			}
			session(['cart'=>$cart]);
		}
		return self::content();
	}

	public static function clear(){
		session(['cart'=>[]]);
		return self::content();
	}

	public static function remove($id){
		if($product = \App\Product::find($id)){
			if(!session()->has('cart')){
				session(['cart'=>[]]);
			}
			$cart = session('cart');
			if(isset($cart[$id])){
				unset($cart[$id]);
			}
			session(['cart'=>$cart]);
		}		
		return self::content();
	}

	public static function items(){
		if(!session()->has('cart')){
			session(['cart'=>[]]);
		}
		return session('cart');
	}
	public static function content(){
		if(!session()->has('cart')){
			session(['cart'=>[]]);
		}
		$cart = session('cart');
		$total = 0;
		foreach ($cart as $price) {
			$total += $price;
		}
		return ['count'=>count($cart), 'total'=>$total];
	}
}