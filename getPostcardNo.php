<?php 
$errMsg ="";

try {
	$dsn = "mysql:host=localhost;port=3306;dbname=dd103g1;charset=utf8";
	$user = "root";
	// $password = "ddj1778";
	$password = "UNIVERLK258";
	$options = array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);
	$pdo = new PDO($dsn, $user, $password, $options);

	//取得已有的明信片編號
	$rowResult = 0;
	$sql = "SELECT * FROM `postcard` ORDER BY `postcard`.`postcardNo` ASC";
	$getPostcardNo = $pdo->prepare($sql);
	$getPostcardNo->execute();
	$getPostcardNoRows = $getPostcardNo->fetchAll(PDO::FETCH_ASSOC);

	foreach($getPostcardNoRows as $i => $getPostcardNo){  
		$Result = $getPostcardNo["postcardNo"];
	}

	$newPostcardNo = $Result + 1;
	echo $newPostcardNo;  //新編號= 目前已有的明信片編號+1

} catch (PDOException $e) {
	$errMsg .= "錯誤原因 : ".$e -> getMessage(). "<br>";
  	$errMsg .= "錯誤行號 : ".$e -> getLine(). "<br>";
  	echo $errMsg;
}
?> 