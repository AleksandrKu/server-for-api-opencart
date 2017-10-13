<?php
echo " ***************** ***************** uniorder № product  ***************** ***************** ";
echo "<br>".date("Y-m-d H:i:s");
$url_order = 'http://api-opencart-2.3.0.2/index.php?route=api/uniorder/product&product_id=30';
$ch_order = curl_init();
curl_setopt($ch_order,CURLOPT_URL, $url_order);
curl_setopt($ch_order, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($ch_order);
$err = curl_error($ch_order);
curl_close($ch_order);
if ($err) {
    echo "cURL Error #:" . $err;
} else {
    /* var_dump(json_decode($response)); */
    /*  var_dump($response);*/
    $movies = new SimpleXMLElement($response);
     var_dump($movies);
}

