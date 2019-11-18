<?php 
$errMsg = "";
session_start();


try {
	require_once('connect.php');
	
	$members=$pdo->prepare('update user set memberId=:memberId,memberPassword=:memberPassword,memberEmail=:memberEmail,memberPhone=:memberPhone,memberAddress=:memberAddress where memberId =:memberId');

	$members->bindValue(':memrId',$_REQUEST["memId"]);
	$members->bindValue(':memPassword',$_REQUEST["memPassword"]);
	$members->bindValue(':memEmail',$_REQUEST["memrEmail"]);
	$members->bindValue(':memPhone',$_REQUEST["memPhone"]);
	$members->bindValue(':memAddress',$_REQUEST["memAddress"]);

	// echo "異動成功~" ;
	
	header("location:../../member.php");
    

  if( $_FILES["upFile"]["error"] == UPLOAD_ERR_OK){

		//先檢查images資料夾存不存在
		$dir ="../../images/";

		if(!file_exists($dir)){
			mkdir($dir);
		}
		//將檔案copy到要放的路徑
		// $fileInfoArr = pathinfo($_FILES["upFile"]["name"]); //原本使用者放的路徑
		
		// $fileName = "member". $_SESSION['memNo'] . "_sticker" . "." . $fileInfoArr["extension"];  //use1_sticker.gif
		
		// $from = $_FILES["upFile"]["tmp_name"];//暫存檔的路徑名稱
	
		// $to = $dir . $fileName;
		
		// copy( $from, $to);//從暫存檔的路徑名稱複製到images

	//將檔案名稱寫回資料庫
	
		$file_src = "img/customize/" . $fileName ;
	
		
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