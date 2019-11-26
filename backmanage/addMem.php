  <?php
    require_once('connect.php');
    $sql="update `member` set memLoginStatus = :memLoginStatus where memNo = :memNo";
    $member = $pdo->prepare($sql);
    $member->bindValue(":memLoginStatus", $_GET["memLoginStatus"]);
    $member->bindValue(":memNo", $_GET["memNo"]);
    $member->execute();
    header("location:member.php");
  ?>