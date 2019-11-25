  <?php
session_start();
try{
  require_once("connect.php");
  $sql = "select * from admin where adminId=:memId and adminPsw=:memPsw";
  $member = $pdo->prepare( $sql);
  $member->bindValue(":memId", $_REQUEST["memId"]);
  $member->bindValue(":memPsw", $_REQUEST["memPsw"]);
  $member->execute();
  if( $member->rowCount() == 0){ //查無此人
    echo "查無此人";
  }else{
    $memRow = $member->fetch(PDO::FETCH_ASSOC);
  //登入成功,將登入者的資料寫入session
  $_SESSION["memId"] = $memRow["adminId"];
  $_SESSION["memName"] = $memRow["adminName"];
  $_SESSION["memNo"] = $memRow["adminNo"];
  
    echo $memRow["adminName"];
  }
}catch(PDOException $e){
  //echo $e->getMessage();
  //echo "系統異常,請通知系統維護人員";  
  echo "sysError";
}
?>