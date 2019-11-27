<?php
try {
		require_once("connect.php");
		//啟動交易管理
		// $pdo->beginTransaction();
		//刪除表單傳送 GET 值
        $sql = "DELETE FROM orderform WHERE orderNo =:orderNo";
        $deleteOrder = $pdo->prepare($sql);
        $deleteOrder->bindValue(":orderNo", $_GET["orderNo"]);
        //$admin_member->bindValue(":admin_name", $_GET["admin_name"]);
		$deleteOrder->execute();
        echo "刪除訂單成功";
    	header('Location:order.php');
	} catch (PDOException $e) {
		$errMsg = $errMsg . "錯誤訊息: " . $e->getMessage() . "</br>";
		$errMsg .= "錯誤行號: " . $e->getLine() . "<br>";
		// $pdo->rollback();
	}
?>