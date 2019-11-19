<?php
try{
	require_once("connect.php");
	$sql = "select * from `scenicspots` where spotsNo=1";
	$spotsA=$pdo->query($sql);
	$spotRowA = $spotsA->fetch(PDO::FETCH_ASSOC);
	  	$xml = '<?xml version="1.0" ?>';
	  	$xml .= "<scenicspots>";
	  	$xml .= "<spotsNo>{$spotRowA["spotsNo"]}</spotsNo>";
	  	$xml .= "<spotsName>{$spotRowA["spotsName"]}</spotsName>";
	  	$xml .= "<spotsDec>{$spotRowA["spotsDec"]}</spotsDec>";
	  	$xml .= "<spotsPic>{$spotRowA["spotsPic"]}</spotsPic>";
	  	$xml .= "</scenicspots>";
	  	header('Content-Type: application/xml; charset=utf-8');
  	echo $xml;
	}catch(PDOException $e){
		 echo "error";
}

?>

