<?php
try{
	require_once("connect.php");
	$sql="INSERT INTO `holdingcoupon` (couponNo,memNo,discount,used) VALUES('','01','5','0')";
	$coupon=$pdo->exec($sql);
	 echo "成功"; 
	}catch(PDOException $e){
		 echo "error";
}

?>