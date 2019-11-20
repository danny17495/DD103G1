<?php
try{
	require_once("connect.php");
	$sql="insert into `holdingcoupon` (memNo,discount,used) VALUES('1','10','0')";
	$coupon=$pdo->exec($sql);
	 echo "成功"; 
	}catch(PDOException $e){
		 echo "error";
}

?>