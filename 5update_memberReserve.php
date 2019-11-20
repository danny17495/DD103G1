<?php
$errMsg="";
session_start();

try {
  require_once('connect.php');


  //找預約日期<目前日期
  $reserveDate=$pdo->prepare("select * from `reserve` WHERE 
  `reserve`.`reserveDate` < CURRENT_DATE AND `reserve`.`reserveNo` = :reserveNo;");
  $reserveDate->bindValue(':reserveNo',$_POST['reserveNo']);
  $reserveDate->execute();

  if(! $revstime->rowCount()==0){
    echo"日期已過，無法取消";
    exit();
  }

  $reserve=$pdo->prepare("select * from `reserve` WHERE 
  `reserve`.`memId` = :memId AND `reserve`.`reserveNo` = :reserveNo;");
  $reserve->bindValue(':memId',$_SESSION['memNo']);
  $reserve->bindValue(':reserveNo',$_POST['reserveNo']);
  $reserve->execute();
  $revsRow = $reserve->fetchObject();


  if($reserveRow->reserve_status=="2"){
    echo"已取消過";

  }elseif($reserveRow->reserve_status=="1"){
    echo"已到場過，無法取消";
    
  }else{
    $reserve=$pdo->prepare("UPDATE `reserve` SET `reserve_status` = '2' WHERE `reserve`.`memberId` = :memberId AND `reserve`.`reserveNo` = :reserveNo;");
    $reserve->bindValue(':memberId',$_SESSION['memberNo']);
    $reserve->bindValue(':reserveNo',$_POST['reserveNo']);
    $reserve->execute();
    echo"異動成功";
  }
  
} catch (PDOException $e) {
    $errMsg = $errMsg . "錯誤訊息: " . $e->getMessage() . "</br>";
    $errMsg .= "錯誤行號: " . $e->getLine() . "<br>";
    echo $errMsg;
}

?>