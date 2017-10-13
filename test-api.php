<?php
define("COOKIE_FILE", "cookie.txt");
function do_curl_request($url, $params=array()) {
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 /*   curl_setopt($ch, CURLOPT_COOKIEJAR, 'E:\practice\oc2.3\tmp\apicookie.txt');
    curl_setopt($ch, CURLOPT_COOKIEFILE, 'E:\practice\oc2.3\tmp\apicookie.txt');*/

    $params_string = '';
    if (is_array($params) && count($params)) {
        foreach($params as $key=>$value) {
            $params_string .= $key.'='.$value.'&';
        }
        rtrim($params_string, '&');

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_COOKIESESSION, true);
        curl_setopt ($ch, CURLOPT_COOKIEJAR, COOKIE_FILE);
        curl_setopt ($ch, CURLOPT_COOKIEFILE, COOKIE_FILE);

        curl_setopt($ch,CURLOPT_POST, count($params));
        curl_setopt($ch,CURLOPT_POSTFIELDS, $params_string);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD, "username:password"); //Your credentials goes here
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    }

    //execute post
    $result = curl_exec($ch);

    //close connection
    curl_close($ch);

    return $result;
}


$apiKey = 'K6jgpIHRMQUcMTe7fgCNkv04gLuRKFxnIIwpjLCEaKNiHOu4vJ7SsO8xkPxh8eHtoPj4R1hPLOsbwBXduf0bb58FRVlth4TFyNuOEFSLwQru0jp8TbIpOY8oFAbEDOhZ26oXJNS82WcnD6cHKWlDOoSMfP4sblkQRToKhbTbsgNZblABqkPygKEnrSIYncn8lMkeCYyU8hiWZsSYDxlIbviZWhcZsPzJ0vMqI5Z6xbVsHJXsMeyxKkh0qDRI4CIe';
$fields = array(
    'key' => $apiKey,
);

$url_for_token = 'http://api-opencart-2.3.0.2/index.php?route=api/login';
$json = do_curl_request($url_for_token, $fields);
$data = json_decode($json);
if (isset($data->token)) {
    echo $token = $data->token;

    $url_order = 'http://api-opencart-2.3.0.2/index.php?route=api/order/info&order_id=20&token='.$token;
    $ch = curl_init();
    $json_order = do_curl_request($url_order);
    $order = json_decode($json_order);
    var_dump($order);
}
var_dump($data);