<!DOCTYPE html>
<html>
<head>
<style>
    .center { text-align: center}
</style>
</head>
<body>

<form action="/server/get.php">
    <select name="site">
        <option value="all">All</option>
        <option value="http://api-opencart-2.3.0.2/">Api-opencart-2.3.0.2</option>
        <option value="http://krisdano/">Krisdano</option>
    </select>
    <input type="submit" value="Показать">
</form>
<br>

<?php
$site = $_GET['site'];

$shop = $_GET['shop'];
$order_id = $_GET['order_id'];
$version_op = $_GET['version_op'];
$token = $_GET['token'];

$host = '127.0.0.1';
$db   = 'server_api';
$user = 'root';
$pass = '';
$charset = 'utf8';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, $user, $pass, $opt);


if(!empty($_GET['shop']) && !empty($_GET['order_id'])) {
    $sql = "INSERT INTO orders (shop, order_id, version_op, token, time_now) VALUES (:shop, :order_id, :version_op, :token, NOW())";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':shop', $shop, PDO::PARAM_STR);
    $stmt->bindParam(':order_id', $order_id,PDO::PARAM_STR);
    $stmt->bindParam(':version_op', $version_op,PDO::PARAM_STR);
    $stmt->bindParam(':token', $token,PDO::PARAM_STR);
    $stmt->execute();
}

if(empty($_GET['site']) || $site == "all") {
    $stmt = $pdo->query("SELECT * FROM orders");
} else
{
    $stmt = $pdo->query("SELECT * FROM orders WHERE shop = '$site'");
}
?>

<table border="1px solid black" >
    <tr>
        <td>Shop</td>
        <td class="center">Order Id</td>
        <td class="center">Version OP</td>
        <td>Token</td>
        <td>Time</td>
    </tr>
<?php
echo $site;
/*$domen = preg_split("/\/\//", $site);
var_dump($domen);*/

while ($row = $stmt->fetch())
{ ?>
    <tr>
        <td><?= $row["shop"] ?></td>
        <td class="center"><a  href="<?php echo '/server/get.php?domen='.$row["shop"]."&order_id=".$row["order_id"] ?>"><?= $row["order_id"] ?></a></td>
        <td class="center"><?= $row["version_op"] ?></td>
        <td><?= $row["token"] ?></td>
        <td><?= $row["time_now"] ?></td>
    </tr>
<?php } ?>
</table>
<?php
$domen = $_GET['domen'];
if(!empty($_GET['domen']) && !empty($_GET['order_id']) ) {
    $url_order = $domen.'index.php?route=api/uniorder/order&order_id='.$_GET['order_id'];
    $ch_order = curl_init();
    curl_setopt($ch_order, CURLOPT_URL, $url_order);
    curl_setopt($ch_order, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($ch_order);
    $err = curl_error($ch_order);
    curl_close($ch_order);
    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        var_dump(json_decode($response));
        /* var_dump($response); */
    }
}
?>
</body>
</html>

