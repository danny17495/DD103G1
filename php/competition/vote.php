<?php
    $errMsg = "";
    $competNo= $_GET["competNo"];
//$user_no=13;
try {
    require_once("../connect.php");
    session_start();

    $sql_vote = 
    "select vote
    from `competition`
    where  competNo = {$competNo}";
    $vote_item = $pdo->prepare($sql_vote);
    $vote_item->execute();

}
catch (PDOException $e) {
    $errMsg = $errMsg . "錯誤訊息: " . $e->getMessage() . "<br>";
    $errMsg .= "錯誤行號: " . $e->getLine() . "<br>";
}
    $vote_box= $vote_item -> fetch(PDO::FETCH_ASSOC);
    $vote_box['vote']=$vote_box['vote']+1;

    $sql_vote_up=
    " UPDATE `competition` SET `vote` = '{$vote_box['vote']}'
    WHERE `competition`.`competNo` = {$competNo};";
    
    $user_vote_up = $pdo->prepare($sql_vote_up);
    $user_vote_up ->execute();
    
    echo($vote_box['vote']);
?>