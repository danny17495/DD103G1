<?php
  
  $dsn = "mysql:host=localhost;port=3306;dbname=dd103g1;charset=utf8";

<<<<<<< HEAD
  // $password = "dd103g1";
  // $user = "dd103g1"; 
  $user = "root";
  $password = "root";
=======
  $password = "dd103g1";
  $user = "dd103g1"; 
  // $user = "root";
  // $password = "ddj1778";
>>>>>>> b39cfb53570fb1289e2a76a9df77b44695ddc982
  $options=array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION, PDO::ATTR_CASE=>PDO::CASE_NATURAL);
  $pdo = new PDO($dsn, $user, $password, $options);
?>