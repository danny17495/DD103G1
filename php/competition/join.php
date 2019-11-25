<?php
$errMsg = "";
$memNo=$_GET["memNo"];
$time=date("Y-m-d");

try {
    require_once("../connect.php");
    session_start();

    $sql_join_compet = 
    "INSERT INTO `competition` (`competNo`, `memNo`,`startDate`,`vote`) VALUES
(null, {$memNo} ,'{$time}',0)";

    echo json_encode($sql_join_compet);



}
catch (PDOException $e) {
    $errMsg = $errMsg . "錯誤訊息: " . $e->getMessage() . "<br>";
    $errMsg .= "錯誤行號: " . $e->getLine() . "<br>";
}

$join_compet = $pdo->prepare($sql_join_compet);
$join_compet ->execute();

?>