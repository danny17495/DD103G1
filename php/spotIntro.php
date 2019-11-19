<?php
try{
	require_once("connect.php");
	$sql = "select * from `scenicspots` where spotsName='九份老街'";
	$spots=$pdo->query($sql);

	if($spots->rowCount()!=0){
		echo "查無資料";
	}else{
		$spotRow = $spots->fetch();
		echo $spotRow["spotsName"];
	}
	}catch(PDOException $e){
		 echo "error";
}
?>