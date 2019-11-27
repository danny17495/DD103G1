<?php

try {
		require_once("connect.php");
        $sql = "DELETE FROM admin WHERE adminNo =:adminNo";
        $deleteAdmin = $pdo->prepare($sql);
        $deleteAdmin->bindValue(":adminNo", $_GET["adminNo"]);

		$deleteAdmin->execute();
        echo "刪除管理員成功";
   		 header('Location:manage.php');
	} catch (PDOException $e) {
		$errMsg = $errMsg . "錯誤訊息: " . $e->getMessage() . "</br>";
		$errMsg .= "錯誤行號: " . $e->getLine() . "<br>";
		// $pdo->rollback();
	}

?>