<?php
session_start();
try{
        require_once("../connect.php");
        if(isset($_POST["user_id"]) && $_POST["user_id"] != ''){
            $sql='select * from  `member` where account=:user_id';
            $user=$pdo->prepare($sql);
            $user->bindValue(':user_id',$_POST['user_id']);
            $user->execute();
            $userRow=$user->fetchAll(PDO::FETCH_ASSOC);
            if($user->rowCount() == 0){
                echo 'loginError';
                return;
            }
            $passwd=$userRow[0]['password'];
            if($_POST["user_psw"]===$passwd){
                $_SESSION['memNo']=$userRow[0]['memNo'];
                echo json_encode($userRow);
                return;
            }else{
                echo 'loginError';
            }
        }else{
            echo 'loginError';
        }
}catch(PDOException $e){
     echo "systemError";
    // $errMsg .= "錯誤原因 : ".$e -> getMessage(). "<br>";
    // $errMsg .= "錯誤行號 : ".$e -> getLine(). "<br>";
}

?>