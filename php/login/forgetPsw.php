<?php

 session_start();
 $errMsg ='';
 try{
     require_once("../connect.php");
     //echo $_GET['email'];
    function MakePass($length) { 
        $number = "0123456789"; 
        $letter="qazwsxedcrfvtgbyhnujmikolp";
        $str = ""; 
        while(strlen($str)<$length){ 
        $str .= substr($number, rand(0, strlen($number)), 1); 
        $str .= substr($letter, rand(0, strlen($letter)), 1); 
        }
        return($str); 
    }
    if(isset($_GET['email'])&&($_GET['email']!='')){   

        $sql="select * from `member` where memEmail=:memEmail";
        $user=$pdo->prepare($sql);
        $user->bindValue(":memEmail",$_GET['email']);
        $user->execute();
       
        if($user->rowCount()==0){
            echo "emailError";
        }else{
            $userRow=$user->fetchAll(PDO::FETCH_ASSOC);
            $userName = $userRow[0]['memName'];
            $userId = $userRow[0]['memAccount'];
            $userPsw = $userRow[0]['memPassword'];
            $userEmail = $userRow[0]['memEmail'];
            $newpasswd = MakePass(6);
            $query_update = "UPDATE `member` SET memPassword='{$newpasswd}' WHERE memName='{$userName}'";
		    $stmt= $pdo->prepare($query_update);
            $stmt->execute();

            $mailcontent=<<<msg
            親愛的 $userName 您好：

            --------------------------------------------------
            您的帳號：$userId 
            您的新密碼：$newpasswd 
            --------------------------------------------------
            希望能再次為您服務 
            
            九份客棧 敬上
msg;
            $mailFrom="=?UTF-8?B?" . base64_encode("九份客棧") . "?= <service@e-happy.com.tw>";
	        $mailto =  $userEmail;
	        $mailSubject="=?UTF-8?B?" . base64_encode("密碼更換通知"). "?=";
	        $mailHeader="From:".$mailFrom."\r\n";
	        $mailHeader.="Content-type:text/html;charset=UTF-8";
	        if(!@mail($mailto,$mailSubject,nl2br($mailcontent),$mailHeader)) die("郵寄失敗！");
            echo  'success';
    }
    }



}catch (PDOException $e) {
	$errMsg = $errMsg . "錯誤訊息: " . $e->getMessage() . "</br>";
    $errMsg .= "錯誤行號: " . $e->getLine() . "<br>";
     echo  $errMsg ;
}
?>
