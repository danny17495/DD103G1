<?php
try{
  require_once("connect.php");
  if(isset($_GET["adminNo"])){
    echo $_GET["adminStatus"];
     $sql = "update admin SET adminStatus=:adminStatus WHERE adminNo=:adminNo";
     $admin_member = $pdo->prepare($sql);
     $admin_member->bindValue(":adminStatus",(int)$_GET["adminStatus"]);
     $admin_member->bindValue(":adminNo", $_GET["adminNo"]);
      $admin_member->execute(); 
  }
    echo "修改成功";
 //   header('Location:manage.php');
  	
}catch(PDOException $e){
  echo $e->getMessage();
}
?>