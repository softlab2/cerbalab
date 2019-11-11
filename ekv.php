<?php

$url = "https://mpi.bspb.ru:5443/Exec";
$ch = curl_init($url);

curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_VERBOSE, 1);
curl_setopt($ch, CURLOPT_SSLKEY, '/home/s/starlinorg/lm/public/privateKey.key1');
curl_setopt($ch, CURLOPT_SSLCERT, '/home/s/starlinorg/lm/public/sebalab.pem');
curl_setopt($ch, CURLOPT_CAINFO, '/home/s/starlinorg/lm/public/sebalab.pem');
curl_setopt($ch, CURLOPT_CAPATH, '/home/s/starlinorg/lm/public/sebalab.pem');
//curl_setopt($ch, CURLOPT_CAINFO, '/home/s/starlinorg/lm/sebalab.pem');
    
    $data = curl_exec($ch);
    echo '<pre>';
    print_r(curl_getinfo($ch));
    echo '</pre>';
    echo '<pre>';
    print_r(curl_getinfo($ch));
    echo htmlentities($data);
    echo '</pre>';
	print curl_error($ch);
