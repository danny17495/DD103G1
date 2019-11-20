<?php
try{
	require_once("connect.php");
	$sql = "select * from `holdingcoupon` order by couponNo desc";
	$coupon=$pdo->query($sql);
	$couponRow = $coupon->fetch(PDO::FETCH_ASSOC);
  	// echo $couponRow["couponNo"];
  	$num=$couponRow["couponNo"]+1;
  	$num = str_pad($num,5,'0',STR_PAD_LEFT);
  	echo $num;

	}catch(PDOException $e){
		 echo "error";
}

?>