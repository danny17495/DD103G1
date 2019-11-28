<?php
$errMsg = "";
try{
  require_once("connect.php");
  $sql = "update scenicspots SET spotsName=:spotsName, spotsDec=:spotsDec WHERE spotsNo=:spotsNo";
  $spots = $pdo->prepare($sql);
  $spots->bindValue(":spotsName",$_REQUEST['spotsName']);
  $spots->bindValue(":spotsDec",$_REQUEST['spotsDec']);
  $spots->bindValue(":spotsNo",$_REQUEST['spotsNo']);
  $spots->execute(); 
  
  switch($_FILES["spotsPic"]["error"]){
	case UPLOAD_ERR_OK:
			//檢查是否有modify資料夾
			$dir = "modify";
			if(file_exists($dir)===false){
				mkdir($dir); //make directory
			}
			$fileName=$_FILES["spotsPic"]["name"];
			$from = $_FILES["spotsPic"]["tmp_name"];
			$to = "$dir/" . $fileName;  //images/smile.gif

			copy($from, $to);
			echo "OK~"; 
			break;	
	case UPLOAD_ERR_INI_SIZE:
			echo "檔案太大, 不得超過", ini_get("upload_max_filesize"),"<br>";
			break;
	case UPLOAD_ERR_FORM_SIZE:
			echo "檔案太大, 不得超過", $_POST["MAX_FILE_SIZE"],"<br>";
			break;	
	case UPLOAD_ERR_PARTIAL : 
			echo "檔案上傳不完整<br>";
			break;
	case UPLOAD_ERR_NO_FILE :		
			echo "您未選檔案<br>";		
			break;
	default :
	        echo "系統錯誤<br>";		
						
}

$dsn = "mysql:host=localhost;port=3306;dbname=dd103g1;charset=utf8";
$user = "dd103g1";
$password = "dd103g1";

$options=array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION, PDO::ATTR_CASE=>PDO::CASE_NATURAL);
$pdoa = new PDO($dsn, $user, $password, $options);

//將檔案名稱寫回資料庫
	$save_directory = "images/spotIntro/";
	$sql = "update scenicspots set spotsPic=:spotsPic where spotsNo = :spotsNo";

	$newPic = $pdoa->prepare($sql);
	$newPic -> bindValue(":spotsPic", "$save_directory"."$fileName");
	$newPic->bindValue(":spotsNo",$_REQUEST['spotsNo']);
	$newPic -> execute();

    echo "修改成功";
    header('Location:viewpicture.php');
  
}catch(PDOException $e){
  echo $e->getMessage();
}
?>