<?php 
$errMsg ="";
$postcardNo = $_POST['hidden_data3'];
$memNo = $_POST['hidden_data4'];
$postcardPic = $_POST['hidden_data5'];

try {
	require_once("connectg1.php");
	// $dsn = "mysql:host=localhost;port=3306;dbname=dd103g1;charset=utf8";
	// $user = "dd103g1";
	// $password = "dd103g1";
	// $options = array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);
	// $pdo = new PDO( $dsn, $user, $password, $options);  
	$sql = "INSERT INTO postcard(postcardNo, memNo, postcardPic) VALUES(:postcardNo, :memNo,:postcardPic)";

	//INSERT INTO postcard(postcardNo, memNo, postcardPic) VALUES(1, 1,'m001p01')

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