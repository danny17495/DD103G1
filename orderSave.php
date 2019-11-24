<?php 
$errMsg ="";
$totalPrice = $_POST['hidden_data2'];
$shippingName = $_POST['hidden_data3'];
$shippingPhone = $_POST['hidden_data4'];
$shippingAddress = $_POST['hidden_data5'];
$cardNumber = $_POST['hidden_data6'];
$cardDateline = $_POST['hidden_data7'];
$cardSafenumber = $_POST['hidden_data8'];
$jsonStr = $_POST['hidden_cart'];
$jsonStr2 = $_POST['hidden_cart2'];
$cart = json_decode($jsonStr);
$cart2 = json_decode($jsonStr2);
// exit( json_encode($cart));
// exit( json_encode($cart2));
date_default_timezone_set("Asia/Taipei");
$startDate = date("Ymd");


try {
	$dsn = "mysql:host=localhost;port=3306;dbname=dd103g1;charset=utf8";
	$user = "dd103g1";
	$password = "dd103g1";
	$options = array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);
	$pdo = new PDO($dsn, $user, $password, $options);

	//1. sql1 取得編號訂單
	$rowResult = 0;
	$sql1 = "SELECT * FROM `orderform` ORDER BY `orderform`.`orderNo` ASC";
	$getOrderNo = $pdo->prepare($sql1);
	$getOrderNo->execute();
	$getOrderRows = $getOrderNo->fetchAll(PDO::FETCH_ASSOC);

	foreach($getOrderRows as $i => $getOrderNo){  
		$rowResult = $getOrderNo["orderNo"];
	}

	echo "目前已有的訂單編號: ", $rowResult;
	$newOrderNo = $rowResult + 1;


	// 2. sql2: 訂單存入orderform
	$sql2 = "insert into `orderform`(orderNo, memNo, totalPrice, startDate, shippingName, shippingPhone, shippingAddress, cardNumber, cardDateline, cardSafenumber) values(:newOrderNo, :memNo, :totalPrice, :startDate, :shippingName, :shippingPhone, :shippingAddress, :cardNumber, :cardDateline, :cardSafenumber)";

	$order = $pdo->prepare($sql2);
	$order->bindValue(":newOrderNo", $newOrderNo);	
	// $order->bindValue(":memNo", $_SESSION['memNo']);
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

	// echo "訂單存入資料庫成功~~~";
	// echo json_last_error();


	//3. sql3 +sql4 : 訂單存入orderdetails
	// 如果有買明信片, $cart資料存入資料庫
	if( count($cart2) > 0 ){
		foreach($cart2 as $key =>$data){
			$productType = $data->productType;
			$orderItemNo = $data->orderItemNo;
			$orderItemName = $data->orderItemName;
			$orderPrice = $data->orderPrice;
			$orderItemNum = $data->orderItemNum;
			$orderItemTotal = $data->orderItemTotal;
			$orderItemPic = $data->orderItemPic;

			$sql4 = "insert into `orderdetails`(orderNo, productType, orderItemNo, orderItemName, orderPrice, orderItemNum, orderItemTotal, orderItemPic) values(:newOrderNo, :productType, :orderItemNo, :orderItemName, :orderPrice, :orderItemNum, :orderItemTotal, :orderItemPic)";

			$cartDetail_2 = $pdo->prepare($sql4);
			// $cartDetail_2->bindValue(":memNo", $_SESSION['memNo']);
			$cartDetail_2->bindValue(":newOrderNo", $newOrderNo);  //ok
			$cartDetail_2->bindValue(":productType", $productType);
			$cartDetail_2->bindValue(":orderItemNo", $orderItemNo);
			$cartDetail_2->bindValue(":orderItemName", $orderItemName);
			$cartDetail_2->bindValue(":orderPrice", $orderPrice);
			$cartDetail_2->bindValue(":orderItemNum", $orderItemNum);
			$cartDetail_2->bindValue(":orderItemTotal", $orderItemTotal);
			$cartDetail_2->bindValue(":orderItemPic", $orderItemPic);

			$cartDetail_2->execute();

			// $aa = var_dump($cart);
			// echo $aa;
		}

	}

	//3. sql3 +sql4 : 訂單存入orderdetails
	// 如果有買商城商品, $cart資料存入資料庫
	if( count($cart) > 0 ){
		foreach($cart as $key =>$data){
			$productType = $data->productType;
			$orderItemNo = $data->orderItemNo;
			$orderItemName = $data->orderItemName;
			$orderPrice = $data->orderPrice;
			$orderItemNum = $data->orderItemNum;
			$orderItemTotal = $data->orderItemTotal;
			$orderItemPic = $data->orderItemPic;

			$sql3 = "insert into `orderdetails`(orderNo, productType, orderItemNo, orderItemName, orderPrice, orderItemNum, orderItemTotal, orderItemPic) values(:newOrderNo, :productType, :orderItemNo, :orderItemName, :orderPrice, :orderItemNum, :orderItemTotal, :orderItemPic)";

			$cartDetail_1 = $pdo->prepare($sql3);
			// $cartDetail_1->bindValue(":memNo", $_SESSION['memNo']);
			$cartDetail_1->bindValue(":newOrderNo", $newOrderNo);  //ok
			$cartDetail_1->bindValue(":productType", $productType);
			$cartDetail_1->bindValue(":orderItemNo", $orderItemNo);
			$cartDetail_1->bindValue(":orderItemName", $orderItemName);
			$cartDetail_1->bindValue(":orderPrice", $orderPrice);
			$cartDetail_1->bindValue(":orderItemNum", $orderItemNum);
			$cartDetail_1->bindValue(":orderItemTotal", $orderItemTotal);
			$cartDetail_1->bindValue(":orderItemPic", $orderItemPic);

			$cartDetail_1->execute();

			// $aa = var_dump($cart);
			// echo $aa;
		}

	}



	// echo json_encode($cart);
	echo "訂單明細存入資料庫成功~~~";




} catch (PDOException $e) {
	$errMsg .= "錯誤原因 : ".$e -> getMessage(). "<br>";
  	$errMsg .= "錯誤行號 : ".$e -> getLine(). "<br>";
  	echo $errMsg;
}
?> 