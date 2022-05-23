<?php




$json = file_get_contents('http://api.openweathermap.org/data/2.5/weather?q=kerman&appid=f0a69d67b4cd12a9930400b455732f20');
$obj = json_decode($json);
$data = $obj->access_token;
//json_decode($data, true);

ini_set("allow_url_fopen", 1);

$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL, 'url_here');
$result = curl_exec($ch);
curl_close($ch);

$obj = json_decode($result);
echo $obj['access_token'];