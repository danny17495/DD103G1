<?php
$errMsg="";
session_start();

try {
  require_once('connect.php');

  $orders=$pdo->prepare("select * from `orderform` WHERE `orderform`.`orderNo` = :orderNo AND `orderform`.`orderNo` = :orderNo");
  $orders->bindValue(':memNo',$_SESSION['memNo']);
  $orders->bindValue(':orderNo',$_POST['orderNo']);
  $orders->execute();
  $ordersRow = $orders->fetchObject(); 

  if($ordersRow->order_status=="2"){
    echo"已取消過";

  }elseif($ordersRow->order_status=="1"){
    echo"已出貨，無法取消";
    
  }else{

    $orderform=$pdo->prepare("UPDATE `orderform` SET `order_status` = '2' WHERE `orderform`.`orderNo` = :orderNo AND `orderform`.`orderNo` = :orderNo ");
    $orderform->bindValue(':memNo',$_SESSION['memNo']);
    $orderform->bindValue(':orderNo',$_POST['orderNo']);
    $orderform->execute();
    echo"異動成功";
  }
  
} catch (PDOException $e) {
    $errMsg = $errMsg . "錯誤訊息: " . $e->getMessage() . "</br>";
    $errMsg .= "錯誤行號: " . $e->getLine() . "<br>";
    echo $errMsg;
}

?>