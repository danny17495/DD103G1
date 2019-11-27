<?php
$errMsg = "";
$memNo = $_POST['hidden_data'];

try{
	require_once("connectg1.php");	

  	$sql = "select * from `holdingcoupon` where memNo = :memNo and used = 0";
  	//used = 0表示未使用
 	$holdingCoupon = $pdo->prepare($sql);
  	$holdingCoupon->bindValue(":memNo", $memNo);
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