<?php
$errMsg="";

try {
    session_start();
    require_once('connectBook.php');
  $postcard=$pdo->prepare("UPDATE `postcard` SET `postcard_status` = '0' WHERE `postcard`.`postcardNo` = :postcardNo AND `postcard`.`postcardNo` = :postcardNo;");
  $postcard->bindValue(':memNo',$_SESSION['memNo']);
  $postcard->bindValue(':postcardNo',$_POST['postcardNo']);
  $postcard->execute();
  echo"異動成功";

} catch (PDOException $e) {

    $errMsg = $errMsg . "錯誤訊息: " . $e->getMessage() . "</br>";
    $errMsg .= "錯誤行號: " . $e->getLine() . "<br>";
    echo $errMsg;
}

?>