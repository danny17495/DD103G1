<?php
try {
		require_once("connect.php");
		
		$sql = "insert into admin (adminName, adminId, adminPsw,adminStatus) values (:adminName, :adminId, :adminPsw , 1)";
		$newAdmin = $pdo->prepare($sql);
		$newAdmin->bindValue(":adminName",$_POST['adminName']);
		$newAdmin->bindValue(":adminId",$_POST['adminId']);
		$newAdmin->bindValue(":adminPsw",$_POST['adminPsw']);
		$newAdmin->execute();
		//取得自動創號的管理員號碼
        $admin_no = $pdo->lastInsertId();
        echo "新增管理員成功";
    	header('Location:manage.php');
	} catch (PDOException $e) {
		$errMsg = $errMsg . "錯誤訊息: " . $e->getMessage() . "</br>";
		$errMsg .= "錯誤行號: " . $e->getLine() . "<br>";
		// $pdo->rollback();
	}

?>