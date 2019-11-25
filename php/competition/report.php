<?php
$memNo=$_GET["memNo"];
$msgNo=$_GET["msgNo"];
$report_reason=$_GET["report_reason"];
require_once("../connect.php");
// $time=date("Y-m-d");
$sql_INSERT =
"INSERT INTO `report` (`reportNo`, `memNo`,`msgNo`,`reportReason`,`reportStatus`) VALUES
(null, '{$memNo}', '{$msgNo}', '{$report_reason}','0');";
$data_INSERT = $pdo->prepare($sql_INSERT);
$data_INSERT ->execute();
echo json_encode( $report_reason);
 
?> 