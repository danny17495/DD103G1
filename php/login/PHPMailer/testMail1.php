<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>
<?php
require("class.phpmailer.php");

//Send mail using gmail
$mail = new PHPMailer(true);
    $mail->IsSMTP(); // telling the class to use SMTP
    $mail->SMTPAuth = true; // enable SMTP authentication
    $mail->SMTPSecure = "ssl"; // sets the prefix to the servier
    $mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
    $mail->Port = 465; // set the SMTP port for the GMAIL server
    // $mail->SMTPDebug = 2;
//         $mail->SMTPOptions = array(
// 'ssl' => array(
// 'verify_peer' => false,
// 'verify_peer_name' => false,
// 'allow_self_signed' => true
// )
// );
    $mail->Username = "dd103.g1@gmail.com"; // =====GMAIL username
    $mail->Password = "Dd123456"; // =====GMAIL password

//Typical mail data
$mail->AddAddress("dillkst123@gmail.com");//========收件者
$mail->SetFrom("dd103.g1@gmail.com");//========寄件者
$mail->Subject = "I Love CD106~~";//========
$mail->Body = "祝大家 ... 心涼脾透開 ...";//========

try{
    $mail->Send();
    echo "Success!";
} catch(Exception $e){
    //Something went bad
    echo "Fail - " . $mail->ErrorInfo;
}

?>
</body>
</html>