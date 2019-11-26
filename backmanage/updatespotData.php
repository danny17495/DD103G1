<?php
$errMsg = "";
try{
  require_once("connect.php");
  $sql = "update scenicspots SET spotsName=:spotsName, spotsDec=:spotsDec, spotsPic=:spotsPic WHERE spotsNo=:spotsNo";
  $spots = $pdo->prepare($sql);
  $spots->bindValue(":spotsName",$_REQUEST['spotsName']);
  $spots->bindValue(":spotsDec",$_REQUEST['spotsDec']);
  $spots->bindValue(":spotsPic",$_REQUEST['spotsPic']);
  $spots->bindValue(":spotsNo",$_REQUEST['spotsNo']);
  $spots->execute(); 
  
    echo "修改成功";
    header('Location:viewpicture.php');
  
}catch(PDOException $e){
  echo $e->getMessage();
}
?>