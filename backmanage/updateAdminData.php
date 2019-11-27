<?php
try{
  require_once("connect.php");


  $sql = "update admin SET adminName=:adminName, adminId=:adminId, adminPsw=:adminPsw WHERE adminNo=:adminNo";
  $admin_member = $pdo->prepare($sql);
  $admin_member->bindValue(":adminName", $_POST["adminName"]);
  $admin_member->bindValue(":adminId", $_POST["adminId"]);
  $admin_member->bindValue(":adminPsw", $_POST["adminPsw"]);
  $admin_member->bindValue(":adminNo", $_POST["adminNo"]);
  $admin_member->execute(); 
  
  

    echo "修改成功";
    header('Location:manage.php');
  	
}catch(PDOException $e){
  echo $e->getMessage();
}
?>