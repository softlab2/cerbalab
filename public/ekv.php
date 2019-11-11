<?php

$url = "https://mpi.bspb.ru:5443/Exec";
$ch = curl_init($url);

$xml = '<TKKPG><Request><Operation>CreateOrder</Operation><Language>RU</Language><Order><Merchant>55079</Merchant><OrderType>Purchase</OrderType><Amount>300000</Amount><Currency>643</Currency><Description>Оплата покупки</Description><ApproveURL>https://shop.com/approve.php</ApproveURL><CancelURL>https://shop.com/cancel.php</CancelURL><DeclineURL>https://shop.com/decline.php</DeclineURL><AddParams><SenderEmail>test@test.com</SenderEmail></AddParams></Order></Request></TKKPG>';

curl_setopt($ch, CURLOPT_POST, 1);
//curl_setopt($ch, CURLOPT_HEADER, 1);
//curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
//curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_VERBOSE, 1);
curl_setopt($ch, CURLOPT_PORT, 443);
curl_setopt($ch, CURLOPT_SSLKEY, getcwd().'/privateKey.key');
curl_setopt($ch, CURLOPT_SSLCERT, getcwd().'/sebalab.pem');
//curl_setopt($ch, CURLOPT_CAINFO, '/home/s/starlinorg/lm/sebalab.pem');
//curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
    
    $data = curl_exec($ch);
    echo '<pre>';
    print_r(curl_getinfo($ch));
    echo '</pre>';
    echo '<pre>';
    print_r(curl_getinfo($ch));
    echo htmlentities($data);
    echo '</pre>';
	print curl_error($ch);
