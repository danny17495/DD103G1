<?php
$upload_dir = "images/postcardClient/";  //檢查資料夾存不存在
if( ! file_exists($upload_dir )){
  mkdir($upload_dir);
}

$imgDataStr = $_POST['hidden_data2'];//收到convas.toDataURL()送來的資料
$imgDataStr = str_replace('data:image/jpeg;base64,', '', $imgDataStr); //將檔案格式的資訊拿掉
// $imgDataStr = str_replace(' ', '+', $imgDataStr);
$data = base64_decode($imgDataStr);

$newPostcardNo = $_POST['hidden_data6'];


//準備好要存的filename
$fileName = $newPostcardNo;  //或time()

$file = $upload_dir . $fileName . ".jpg";
$success = file_put_contents($file, $data);

echo $success ? $file : 'error';
?>