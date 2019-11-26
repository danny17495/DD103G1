<?php 
$errMsg ="";
$postcardNo = $_POST['hidden_data3'];
$memNo = $_POST['hidden_data4'];
$postcardPic = $_POST['hidden_data5'];

try {
	require_once("connectg1.php");

	$sql = "INSERT INTO postcard(postcardNo, memNo, postcardPic) VALUES(:postcardNo, :memNo,:postcardPic)";
	$postcard = $pdo->prepare($sql);
	$postcard->bindValue(":postcardNo", $postcardNo);
	$postcard->bindValue(":memNo", $memNo);
	$postcard->bindValue(":postcardPic", $postcardPic);

	$postcard->execute();
	// echo "存入資料庫成功";
} catch (PDOException $e) {
	$errMsg .= "錯誤原因 : ".$e -> getMessage(). "<br>";
  	$errMsg .= "錯誤行號 : ".$e -> getLine(). "<br>";
  	echo $errMsg;
}
?> 