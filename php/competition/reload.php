<?php
require_once("../connect.php");
$sql_msg_member2 = 
"select message.msgContent,message.msgDate,member.memName
from `dd103g1`.`message`,`dd103g1`.`member`
where message.memNo=member.memNo and message.competNo=1 order by message.msgDate desc limit 2 ";
$msgMember2 = $pdo->prepare($sql_msg_member2);
$msgMember2 ->execute();
$msgMember2Row = $msgMember2->fetchAll(PDO::FETCH_ASSOC);

$sql_msg_member3 = 
"select message.msgContent,message.msgDate,member.memName
from `message`,`member`
where message.memNo=member.memNo and message.competNo=2 order by message.msgDate desc limit 2 ";
$msgMember3 = $pdo->prepare($sql_msg_member3);
$msgMember3 ->execute();
$msgMember3Row = $msgMember3->fetchAll(PDO::FETCH_ASSOC);

$sql_msg_member4 = 
"select message.msgContent,message.msgDate,member.memName
from `message`,`member`
where message.memNo=member.memNo and message.competNo=3 order by message.msgDate desc limit 2";
$msgMember4 = $pdo->prepare($sql_msg_member4);
$msgMember4 ->execute();
$msgMember4Row = $msgMember4->fetchAll(PDO::FETCH_ASSOC);

$sql_member_vote = 
"select member.memName,competition.vote,competition.memNo,postcard.postcardPic
from `member`, `competition`, `postcard`
where member.memNo=competition.memNo and member.memNo=postcard.memNo and YEAR(startDate) = 2019 
order by competition.vote desc";

$memberVote = $pdo->prepare($sql_member_vote);
$memberVote ->execute();
$memberVoteRow = $memberVote->fetchAll(PDO::FETCH_ASSOC);
echo json_encode(array("first"=>$msgMember2Row,"second"=>$msgMember3Row,"third"=>$msgMember4Row,"vote"=>$memberVoteRow));
?>