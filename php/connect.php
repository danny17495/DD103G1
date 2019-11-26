<?php
  $dsn = "mysql:host=localhost;port=3306;dbname=dd103g1;charset=utf8";
  $password = "da0919294452";
  $user = "root";
<<<<<<< HEAD
  //$password = "dd103g1";
   $password = "root";
=======
>>>>>>> cc458fa155c2d78c7157c89e5e25a8d975054099
  $options=array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION, PDO::ATTR_CASE=>PDO::CASE_NATURAL);
  $pdo = new PDO($dsn, $user, $password, $options);
?>