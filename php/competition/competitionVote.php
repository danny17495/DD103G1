<?php
$errMsg = "";
try {
    require_once("../connect.php");
    session_start();
    //選取member跟competition
    $sql_member_vote = 
    "select member.memId,member.postcardPic,competition.vote,competition.memId,postcard.postcardPic
    from `member`, `competition`, `postcard`
    where member.memId=competition.memId and member.postcardPic=postcard.postcardPic and YEAR(startDate) = 2019 
    order by competition.vote desc";
    //根據票數從大到小排列
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
$memberVoteRow = $memberVote -> fetch(PDO::FETCH_ASSOC);
echo json_encode( $memberVoteRow );
?>