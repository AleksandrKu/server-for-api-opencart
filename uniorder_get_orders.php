<?php
echo " ***************** ***************** uniorder № order  ***************** ***************** ";

$url_order = 'http://api-opencart-2.3.0.2/index.php?route=api/uniorder/order&order_id=30';
$ch_order = curl_init();
curl_setopt($ch_order,CURLOPT_URL, $url_order);
curl_setopt($ch_order, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($ch_order);
$err = curl_error($ch_order);
curl_close($ch_order);
if ($err) {
    echo "cURL Error #:" . $err;
} else {
    var_dump(json_decode($response));
    /*var_dump($response);*/
}

echo " ***************** ***************** uniorder  orders ***************** ***************** ";

/*$url_order = 'http://api-opencart-2.3.0.2/index.php?route=api/uniorder/orders&limit=2';*/
$url_order = 'http://krisdano/index.php?route=api/uniorder/orders&limit=8';
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

echo " ***************** ***************** uniorder DATE  orders ***************** ***************** ";

$url_order = 'http://api-opencart-2.3.0.2/index.php?route=api/uniorder/ordersbydate&startdate=2017-10-02&enddate=2017-10-05';
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