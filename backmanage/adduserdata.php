<?php
try{
  require_once("connect.php");
  $sql = "update member SET memLoginStatus=:memLoginStatus WHERE memNo=:memNo";
  $user = $pdo->prepare($sql);
  $user->bindValue(":memLoginStatus", $_REQUEST["memLoginStatus"]);
  $user->bindValue(":memNo", $_REQUEST["memNo"]);
  $user->execute(); 
  
    echo "修改成功";
    header('Location:member.php');
  	
}catch(PDOException $e){
  echo $e->getMessage();
}
?>