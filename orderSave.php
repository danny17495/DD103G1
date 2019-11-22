<?php 
$errMsg ="";
$totalPrice = $_POST['hidden_data2'];
$shippingName = $_POST['hidden_data3'];
$shippingPhone = $_POST['hidden_data4'];
$shippingAddress = $_POST['hidden_data5'];
$cardNumber = $_POST['hidden_data6'];
$cardDateline = $_POST['hidden_data7'];
$cardSafenumber = $_POST['hidden_data8'];

date_default_timezone_set("Asia/Taipei");
$startDate = date("Ymd");

echo "訂單存入資料庫成功~~~";
try {
	$dsn = "mysql:host=localhost;port=3306;dbname=dd103g1;charset=utf8";
	$user = "root";
	$password = "ddj1778";
	$options = array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);
	$pdo = new PDO($dsn, $user, $password, $options);  
	$sql = "insert into `orderform`(memNo, totalPrice, startDate, shippingName, shippingPhone, shippingAddress, cardNumber, cardDateline, cardSafenumber) values(:memNo, :totalPrice, :startDate, :shippingName, :shippingPhone, :shippingAddress, :cardNumber, :cardDateline, :cardSafenumber)";

	$order = $pdo->prepare($sql);
	$order->bindValue(":memNo", '1');
	$order->bindValue(":totalPrice", $totalPrice);
	$order->bindValue(":startDate", $startDate);
	$order->bindValue(":shippingName", $shippingName);
	$order->bindValue(":shippingPhone", $shippingPhone);
	$order->bindValue(":shippingAddress", $shippingAddress);
	$order->bindValue(":cardNumber", $cardNumber);
	$order->bindValue(":cardDateline", $cardDateline);
	$order->bindValue(":cardSafenumber", $cardSafenumber);

	$order->execute();

	echo "訂單存入資料庫成功~~~";
} catch (PDOException $e) {
	$errMsg .= "錯誤原因 : ".$e -> getMessage(). "<br>";
  	$errMsg .= "錯誤行號 : ".$e -> getLine(). "<br>";
  	echo $errMsg;
}
?> 