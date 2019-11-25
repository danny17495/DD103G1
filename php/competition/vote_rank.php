<?php
$errMsg = "";
try {
    require_once("../connect.php");
    session_start();
    $sql_member_vote = 
    "select member.memId,member.postcardPic,competition.vote,competition.memId,postcard.postcardPic,message.msgContent
    from `member`, `competition`, `postcard` ,`message`
    where member.memId=competition.memId and member.postcardPic=postcard.postcardPic and YEAR(startDate) = 2019 
    order by competition.vote desc";
    $memberVote = $pdo->prepare($sql_member_vote);
    $memberVote ->execute();
}
catch (PDOException $e) {
    $errMsg = $errMsg . "錯誤訊息: " . $e->getMessage() . "<br>";
    $errMsg .= "錯誤行號: " . $e->getLine() . "<br>";
}

$memberVoteRow = $memberVote -> fetchAll(PDO::FETCH_ASSOC);
echo json_encode( $memberVoteRow );
?>