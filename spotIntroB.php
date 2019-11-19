<?php
try{
	require_once("connect.php");
	$sql = "select * from `scenicspots` where spotsNo=2";
	$spotsB=$pdo->query($sql);
	$spotRowB = $spotsB->fetch(PDO::FETCH_ASSOC);
	  	$xml = '<?xml version="1.0" ?>';
	  	$xml .= "<scenicspots>";
	  	$xml .= "<spotsNo>{$spotRowB["spotsNo"]}</spotsNo>";
	  	$xml .= "<spotsName>{$spotRowB["spotsName"]}</spotsName>";
	  	$xml .= "<spotsDec>{$spotRowB["spotsDec"]}</spotsDec>";
	  	$xml .= "<spotsPic>{$spotRowB["spotsPic"]}</spotsPic>";
	  	$xml .= "</scenicspots>";
	  	header('Content-Type: application/xml; charset=utf-8');
  	echo $xml;
	}catch(PDOException $e){
		 echo "error";
}

?>

