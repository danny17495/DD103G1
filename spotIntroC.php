<?php
try{
	require_once("connect.php");
	$sql = "select * from `scenicspots` where spotsNo=3";
	$spotsC=$pdo->query($sql);
	$spotRowC = $spotsC->fetch(PDO::FETCH_ASSOC);
	  	$xml = '<?xml version="1.0" ?>';
	  	$xml .= "<scenicspots>";
	  	$xml .= "<spotsNo>{$spotRowC["spotsNo"]}</spotsNo>";
	  	$xml .= "<spotsName>{$spotRowC["spotsName"]}</spotsName>";
	  	$xml .= "<spotsDec>{$spotRowC["spotsDec"]}</spotsDec>";
	  	$xml .= "<spotsPic>{$spotRowC["spotsPic"]}</spotsPic>";
	  	$xml .= "</scenicspots>";
	  	header('Content-Type: application/xml; charset=utf-8');
  	echo $xml;
	}catch(PDOException $e){
		 echo "error";
}

?>

