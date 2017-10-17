<!DOCTYPE html>
<html>
<head>
    <style>
        .center { text-align: center}
    </style>
</head>
<body>

<form action="/server/uniorder_get_orders.php">
    <select name="site">

        <option value="http://api-opencart-2.3.0.2/">Api-opencart-2.3.0.2</option>
        <option value="http://krisdano/">Krisdano</option>
    </select>
    <input name="limit" placeholder="limit" type="number">
    <input name="start-date" value="2017-10-04" type="date">
    <input name="end-date" value="2017-10-05" type="date">
    <input type="submit"  value="Показать">
</form>
<?php
if($_GET["limit"] && $_GET["site"]) {
    echo " ***************** Last  ".$_GET["limit"]." orders *************** <br>";
echo "Site: ".$_GET["site"]."<br>";


$url_order = $_GET["site"].'index.php?route=api/uniorder/orders&limit='.$_GET["limit"];
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
    /* var_dump($response); */
 }
}

if($_GET["site"] && $_GET["start-date"] && $_GET["end-date"]) {
 echo " ***************** ***************** uniorder DATE  orders ***************** ***************** ";
 $startdate=implode("-",array_reverse(preg_split("/-/", $_GET["start-date"])));
echo "<br>".$startdate."<br>";
    $endrtdate=implode("-",array_reverse(preg_split("/-/", $_GET["end-date"])));
    echo $endrtdate;

 $url_order = $_GET["site"].'index.php?route=api/uniorder/ordersbydate&startdate='.$_GET["start-date"].'&enddate='.$_GET["end-date"];


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

}
    /*echo " ***************** ***************** uniorder  ALL orders ***************** ***************** ";

    $url_order = 'http://api-opencart-2.3.0.2/index.php?route=api/uniorder/orders';
    $ch_order = curl_init();
    curl_setopt($ch_order, CURLOPT_URL, $url_order);
    curl_setopt($ch_order, CURLOPT_RETURNTRANSFER, 1);

    $response = curl_exec($ch_order);
    $err = curl_error($ch_order);
    curl_close($ch_order);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        echo "<br>";
        var_dump(json_decode($response));

    }*/


?>
</body>
</html>
