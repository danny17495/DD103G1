<?php
session_start();
$errMsg ='';
try{
    require_once("../connect.php");
    if(isset($_POST['journey'])&& $_POST['journey']!=''&& isset($_POST['people'])&& $_POST['people']!=''){   

        $sql="select reserveDate from `reserve` where reserveRoute = :reserveRoute and reserveNum > 20-:reserveNum";
        // 20->$_POST['people']+reserveNum <=20
        $rev=$pdo->prepare($sql);
        $rev->bindValue(':reserveRoute',$_POST['journey']);
        $rev->bindValue(':reserveNum',$_POST['people']);
        $rev->execute();
        $revRow=$rev->fetchAll(PDO::FETCH_ASSOC);

        if($rev->rowCount() == 0){
                echo 'allpass';
                return;
        }else{
             echo json_encode($revRow);
        }
    }

}catch (PDOException $e) {
	$errMsg = $errMsg . "錯誤訊息: " . $e->getMessage() . "</br>";
    $errMsg .= "錯誤行號: " . $e->getLine() . "<br>";
     echo  $errMsg ;
}
?>
