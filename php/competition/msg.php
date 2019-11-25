<?php
$competNo=$_GET["competNo"];
$msg=$_GET["msg"];
$memNo=$_GET["memNo"];
// $memNo=6;

require_once("../connect.php");

$time=date("Y-m-d H:i:s");
$sql_INSERT =
"INSERT INTO  `message` (`msgNo`, `memNo`,`msgContent`,`msgDate`,`competNo`, `msgStatus`)  VALUES
(null, '{$memNo}', '{$msg}','{$time}', '{$competNo}', '1' );";
$data_INSERT = $pdo->prepare($sql_INSERT);
$data_INSERT ->execute();

echo json_encode($time);
 
?> 