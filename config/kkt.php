<?php

return [
	'schetmash'=>[
		'login' => env('kkt_login', 'test_api'),
		'password' => env('kkt_password', '123456'),
		'shop_id' => env('kkt_shop_id', '42'),
		'api_url' => env('kkt_api_url', 'https://online.schetmash.com/lk/api/v1'),
		'tax' => env('kkt_tax', 'none'),
		'type' => env('kkt_type', '1'),
		'callback_url' => env('kkt_callback_url', '')
	],
];