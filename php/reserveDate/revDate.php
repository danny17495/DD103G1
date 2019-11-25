<?php
session_start();
$errMsg ='';
try{
    require_once("../connect.php");
    if(isset($_POST['data'])&&($_POST['data']!='')){   
        $data=json_decode($_POST['data']);

        $sql="INSERT INTO `reserve` (`reserveNo`, `memNo`, `reserveDate`, `reserveRoute`, `reserveNum`) 
        VALUES (null,:memNo,:reserveDate,:reserveRoute,:reserveNum)";

        $rev=$pdo->prepare($sql);
        
        foreach ($data as $i => $n) {
             $rev->bindValue(":{$i}",$n);
        }
        $rev->execute();
        echo "success"; 
    }



}catch (PDOException $e) {
	$errMsg = $errMsg . "錯誤訊息: " . $e->getMessage() . "</br>";
    $errMsg .= "錯誤行號: " . $e->getLine() . "<br>";
     echo  $errMsg ;
}
?>

