<?php 
$errMsg = "";
session_start();


try {
	require_once('connect.php');
	
	$members=$pdo->prepare('update user set memberId=:memberId,memberPassword
	=:memberPassword,memberEmail=:memberEmail,memberPhone=:memberPhone,memberAddress
	=:memberAddress,memberVisa=:memberVisa where memberId =:memberId');

	$members->bindValue(':memrId',$_REQUEST["memId"]);
	$members->bindValue(':memPassword',$_REQUEST["memPassword"]);
	$members->bindValue(':memEmail',$_REQUEST["memrEmail"]);
	$members->bindValue(':memPhone',$_REQUEST["memPhone"]);
	$members->bindValue(':memAddress',$_REQUEST["memAddress"]);
	$members->bindValue(':memVisa',$_REQUEST["memVisa"]);
	
	// echo "異動成功~" ;

	//將檔案名稱寫回資料庫
    	$memberImg -> bindValue(':memId',$_REQUEST["memId"]);
		$memberImg -> execute();
		// echo "新增成功~";
		header("location:../../member.php");

	}else if($_FILES["upFile"]["error"] == 4){ //如果未指定上傳檔案,還是跳轉成功
		header("location:../../member.php");
	}
	else{
		echo "錯誤代碼 : {$_FILES["upFile"]["error"]} <br>";
		echo "新增失敗";
	}


} catch (PDOException $e) {
	$errMsg = $errMsg . "錯誤訊息: " . $e->getMessage() . "</br>";
    $errMsg .= "錯誤行號: " . $e->getLine() . "<br>";
    echo $errMsg;
}
?>   