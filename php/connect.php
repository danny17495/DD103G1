<!-- require_once 要求登入資料庫
帳號密碼要改成自己的 -->
<?php
  $dsn = "mysql:host=localhost;port=3306;dbname=dd103g1;charset=utf8";
  $user = "root";
  $password = "da0919294452";
  // $user = "dd103g1";
  // $password = "dd103g1";
  $options=array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION, PDO::ATTR_CASE=>PDO::CASE_NATURAL);
  $pdo = new PDO($dsn, $user, $password, $options);
?>