<?php
session_start();
$errMsg ='';
try{
    require_once("../connect.php");
    if(isset($_POST['data'])&&($_POST['data']!='')){   
        $data=json_decode($_POST['data']);

        $sql="INSERT INTO `member` (`memNo`, `memName`, `memAccount`, `memPassword`, `memEmail`, `memLoginStatus`,`memPhone`,`memAddress`,`memVisa`) 
        VALUES (null,:memName,:memId,:memPassword,:memEmail,1,'','','')";

        $user=$pdo->prepare($sql);
        
        foreach ($data as $i => $n) {
            $user->bindValue(":{$i}",$n);
        }
        $user->execute();
        

        $memNo = $pdo->lastInsertId();

        $_SESSION['memNo']=$memNo;
    

        $login=$pdo->query("select * from `member` where memNo = $memNo");
        $loginRow=$login->fetch(PDO::FETCH_ASSOC);
        
        echo json_encode($loginRow); 


    }else if(isset($_GET['id'])){   //比對帳號是否重複
        $Id=$pdo->prepare("select * from `member` where memAccount=:memAccount");
        $Id->bindValue(":memAccount",$_GET['id']);
        $Id->execute();
        if($Id->rowCount()==0){
            echo "success";
        }else{
            echo "error";
        }
    }



}catch (PDOException $e) {
	$errMsg = $errMsg . "錯誤訊息: " . $e->getMessage() . "</br>";
    $errMsg .= "錯誤行號: " . $e->getLine() . "<br>";
     echo  $errMsg ;
}
?>

