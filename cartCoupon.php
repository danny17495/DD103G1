<?php
$errMsg = "";
//連線資料庫
try{
	$dsn = "mysql:host=localhost;port=3306;dbname=dd103g1;charset=utf8";
	$user = "root";
	$password = "ddj1778";
	$options = array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);
	$pdo = new PDO( $dsn, $user, $password, $options);  

 	// require_once("connectBooks.php");
  	$sql = "select * from `holdingcoupon` where memNo = :memNo and used = 0";
  	//used = 0表示未使用
 	$holdingCoupon = $pdo->prepare($sql);
  	$holdingCoupon->bindValue(":memNo", 1);
  	// $holdingCoupon->bindValue(":memNo", $_SESSION['memNo']);
  	$holdingCoupon->execute();

 	$holdingCouponRows = $holdingCoupon->fetchAll(PDO::FETCH_ASSOC);

	// $aa = $holdingCoupon->rowCount();

	$result = array();
	foreach($holdingCouponRows as $i => $holdingCoupon){  

		if( in_array($holdingCoupon["discount"], $result) == false){
			$result[] = $holdingCoupon["discount"];
		}
		// $i = $holdingCoupon["discount"];
	}

	echo json_encode($result);

 	// echo json_encode($aa);
 	// echo json_encode($holdingCouponRows);


}catch(PDOException $e){
  $errMsg .= "錯誤原因 : ".$e -> getMessage(). "<br>";
  $errMsg .= "錯誤行號 : ".$e -> getLine(). "<br>";
}
?> 