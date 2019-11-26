<?php
  $dsn = "mysql:host=localhost;port=3306;dbname=dd103g1;charset=utf8";
<<<<<<< HEAD
  // $password = "dd103g1";
  // $user = "dd103g1";
  $user = "root";  
  $password = "ddj1778";
=======
  $password = "da0919294452";
  $user = "root";
<<<<<<< HEAD
  //$password = "dd103g1";
   $password = "root";
=======
>>>>>>> cc458fa155c2d78c7157c89e5e25a8d975054099
>>>>>>> b4cf3092f247f8a963b046f92bb8af33297bbbe6
  $options=array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION, PDO::ATTR_CASE=>PDO::CASE_NATURAL);
  $pdo = new PDO($dsn, $user, $password, $options);
?>