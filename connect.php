<?php
  //$dsn = "mysql:host=140.115.236.71;port=3306;dbname=dd103g1;charset=utf8";
  $dsn = "mysql:host=localhost;port=3306;dbname=dd103g1;charset=utf8";

  // $password = "da0919294452";
  $user = "root";
  $options=array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION, PDO::ATTR_CASE=>PDO::CASE_NATURAL);
  $pdo = new PDO($dsn, $user, $password, $options);
?>