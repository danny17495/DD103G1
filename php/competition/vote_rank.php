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

// $j=0;
// while( $user_ctnRow[$j]= $user_ctn -> fetch(PDO::FETCH_ASSOC)){
//    $j++;
// }
// array_splice($user_ctnRow,$j,1);
$memberVoteRow = $memberVote -> fetchAll(PDO::FETCH_ASSOC);
echo json_encode( $memberVoteRow );
?>