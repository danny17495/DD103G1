<?php
try{
	require_once("connect.php");
	$sql = "select * from `holdingcoupon`";
	$coupon=$pdo->query($sql);
	$couponRow = $coupon->fetch(PDO::FETCH_ASSOC);
  	// echo $couponRow["couponNo"];
  	$num=$couponRow["couponNo"];
  	$num = str_pad($num,3,'0',STR_PAD_LEFT);
  	echo $num;

	}catch(PDOException $e){
		 echo "error";
}

?>