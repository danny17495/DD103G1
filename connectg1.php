<?php
	$dsn = "mysql:host=localhost;port=3306;dbname=dd103g1;charset=utf8";
	$user = "dd103g1";
	$password = "dd103g1";
// 	  $user = "root";
//   $password = "ddj1778";
	$options = array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);
	$pdo = new PDO( $dsn, $user, $password, $options);  
?>