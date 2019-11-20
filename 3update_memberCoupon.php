<?php
$errMsg="";

try {
    session_start();
    require_once('connect.php');
  $postcard=$pdo->prepare("UPDATE `coupon` SET `coupon_status` = '0' WHERE
   `coupon`.`couponNo` = :couponNo AND `coupon`.`couponNo` = :couponNo;");
  $postcard->bindValue(':memNo',$_SESSION['memNo']);
  $postcard->bindValue(':couponNo',$_POST['couponNo']);
  $postcard->execute();
  echo"異動成功";

} catch (PDOException $e) {

    $errMsg = $errMsg . "錯誤訊息: " . $e->getMessage() . "</br>";
    $errMsg .= "錯誤行號: " . $e->getLine() . "<br>";
    echo $errMsg;
}

?>