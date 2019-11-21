<?php
$errMsg = "";
$competNo=$_GET["competNo"];
try {
    require_once("../connect.php");
    session_start();

    $sql_msg_member = 
   "select message.msgContent,message.msgDate,member.memId,message.competNo,message.msgNo
    from `message`,`member`
    where message.memNo=member.memberNo and message.msgStatus=1 and message.competNo= $competNo
    order by message.msgDate desc;";

    $msgMember = $pdo->prepare($sql_msg_member);
    $msgMember ->execute();
}
catch (PDOException $e) {
    $errMsg = $errMsg . "錯誤訊息: " . $e->getMessage() . "<br>";
    $errMsg .= "錯誤行號: " . $e->getLine() . "<br>";
}

$j=0;
while( $msgMemberRow[$j]= $msgMember -> fetch(PDO::FETCH_ASSOC)){
   $j++;
}
array_splice($msgMemberRow,$j,1);
echo json_encode( $msgMemberRow );
?>  