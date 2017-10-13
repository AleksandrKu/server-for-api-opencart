<?php
echo "Hi<br>";

$apiKey = 'K6jgpIHRMQUcMTe7fgCNkv04gLuRKFxnIIwpjLCEaKNiHOu4vJ7SsO8xkPxh8eHtoPj4R1hPLOsbwBXduf0bb58FRVlth4TFyNuOEFSLwQru0jp8TbIpOY8oFAbEDOhZ26oXJNS82WcnD6cHKWlDOoSMfP4sblkQRToKhbTbsgNZblABqkPygKEnrSIYncn8lMkeCYyU8hiWZsSYDxlIbviZWhcZsPzJ0vMqI5Z6xbVsHJXsMeyxKkh0qDRI4CIe';
$url = 'http://api-opencart-2.3.0.2/index.php?route=api/login';
$cookie_file = $_SERVER['DOCUMENT_ROOT']."/server/cookie.txt";
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array( 'key'=>$apiKey)));
/*curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, FALSE);*/
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
$response = json_decode(curl_exec( $ch ));
curl_close($ch);

if (isset($response->token)) { echo $token = $response->token;
    echo "<br/>";
    $file = fopen("cookie.txt", 'r');
    echo fread($file, 100000000);
    echo "<br/>";

} else {  var_dump(print_r($response));   }


echo " ***************** ***************** ***************** ***************** ";

$url_order = 'http://api-opencart-2.3.0.2/index.php?route=api/order/info&order_id=20&token='.$token;
$ch_order = curl_init();
curl_setopt($ch_order, CURLOPT_COOKIEFILE, $cookie_file);
curl_setopt($ch_order,CURLOPT_URL, $url_order);
curl_setopt($ch_order, CURLOPT_RETURNTRANSFER, 1);

$response = curl_exec($ch_order);
$err = curl_error($ch_order);

curl_close($ch_order);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
   /* var_dump(json_decode($response));*/
     var_dump($response);
 }
 echo " ***************** ***************** uniorder № order  ***************** ***************** ";

 $url_order = 'http://api-opencart-2.3.0.2/index.php?route=api/uniorder/order&order_id=18';
 $ch_order = curl_init();
 /*curl_setopt($ch_order, CURLOPT_COOKIEFILE, $cookie_file);*/
curl_setopt($ch_order,CURLOPT_URL, $url_order);
curl_setopt($ch_order, CURLOPT_RETURNTRANSFER, 1);

$response = curl_exec($ch_order);
$err = curl_error($ch_order);
curl_close($ch_order);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    /*var_dump(json_decode($response));*/
   var_dump($response);
}

echo " ***************** ***************** uniorder  orders ***************** ***************** ";

$url_order = 'http://api-opencart-2.3.0.2/index.php?route=api/uniorder/orders&limit=2';
$ch_order = curl_init();
curl_setopt($ch_order,CURLOPT_URL, $url_order);
curl_setopt($ch_order, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($ch_order);
$err = curl_error($ch_order);
curl_close($ch_order);
if ($err) {
    echo "cURL Error #:" . $err;
} else {
    echo "<br>";
    var_dump(json_decode($response));
    /*var_dump($response);*/
}

echo " ***************** ***************** uniorder  ALL orders ***************** ***************** ";

$url_order = 'http://api-opencart-2.3.0.2/index.php?route=api/uniorder/orders';
$ch_order = curl_init();
curl_setopt($ch_order,CURLOPT_URL, $url_order);
curl_setopt($ch_order, CURLOPT_RETURNTRANSFER, 1);

$response = curl_exec($ch_order);
$err = curl_error($ch_order);
curl_close($ch_order);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    echo "<br>";
    var_dump(json_decode($response));
    /*var_dump($response);*/
}