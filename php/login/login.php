<?php
session_start();

try{
    require_once("../connect.php");
    if(isset($_POST["password"])){
        $sql='select * from member where account=:account and password=:password;';
        //  $sql='select * from user;';

        $user=$pdo->prepare($sql);
        $user->bindValue(':account',$_POST['account']);
        $user->bindValue(':password',$_POST["password"]);
        $user->execute();
        if($user->rowCount() == 0){
            echo 'loginError';
        }else{
            $userRow=$user->fetchAll(PDO::FETCH_ASSOC);
            $_SESSION['memNo']=$userRow[0]['memNo'];
            echo json_encode($userRow);
        };
    }else{
        $sql='select * from user where memNo=:memNo;';
        $user=$pdo->prepare($sql);
        $user->bindValue(':memNo',$_SESSION['memNo']);
        $user->execute();
        $userRow=$user->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($userRow);
    }

}catch(PDOException $e){
    // echo $e->getMessage();
    echo "sysError";

}
?>