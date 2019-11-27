<?php
session_start();
$errMsg = "";
$type = (isset($_POST['type'])) ? trim($_POST['type']) : exit('ERROR: NO TYPE!');
$memNo = (isset($_SESSION['memNo'])) ? (int)$_SESSION['memNo'] : exit('ERROR: NO MEMNO!');
try{
	require_once('connect.php');
	switch($type)
	{
		case "memInfo":
			$sql = "SELECT `member`.`memName`, 
						   `member`.`memPassword`, 
						   `member`.`memEmail`, 
						   `member`.`memPhone`, 
						   `member`.`memAddress`, 
						   `member`.`memVisa` 
					FROM `dd103g1`.`member` 
					WHERE `member`.`memNo` = :memNo";
			$memInfo=$pdo->prepare($sql);
	  		$memInfo->bindValue(':memNo',$memNo);
	  		$memInfo->execute();
			$memInfoRow = $memInfo->fetchAll(PDO::FETCH_ASSOC);

			echo json_encode($memInfoRow[0]);
			break;
		case "memPsw":
			$enterPsw = (isset($_POST['enterPsw'])) ? trim($_POST['enterPsw']) : exit('ERROR: NO ENTERPSW!');
			$sql = "SELECT `member`.`memPassword`
					FROM `dd103g1`.`member` 
					WHERE `member`.`memNo` = :memNo";
			$memPsw=$pdo->prepare($sql);
	  		$memPsw->bindValue(':memNo',$memNo);
	  		$memPsw->execute();
			$memPswRow = $memPsw->fetchAll(PDO::FETCH_ASSOC);
			if($enterPsw == $memPswRow[0]['memPassword'])
			{
				echo json_encode(array(true), JSON_FORCE_OBJECT);
			}else{
				echo json_encode(array(false), JSON_FORCE_OBJECT);
			}
			break;
		case "memPostcard"://新的在最上面還是下面?上面
			$sql = "SELECT `postcard`.`postcardNo`, 
						   `postcard`.`postcardPic` 
					FROM `dd103g1`.`postcard` 
					WHERE `postcard`.`memNo` = :memNo 
					ORDER BY `postcard`.`postcardNo` DESC";
			$memPostcard=$pdo->prepare($sql);
	  		$memPostcard->bindValue(':memNo',$memNo);
	  		$memPostcard->execute();
			$memPostcardRow = $memPostcard->fetchAll(PDO::FETCH_ASSOC);
			echo json_encode($memPostcardRow);
			break;
		case "memCoupon"://新的在最上面還是下面?上面
			$sql = "SELECT `holdingcoupon`.`discount`, 
						   `holdingcoupon`.`used`,
						   `holdingcoupon`.`couponNo` 
					FROM `dd103g1`.`holdingcoupon` 
					WHERE `holdingcoupon`.`memNo` = :memNo";
			$memCoupon=$pdo->prepare($sql);
	  		$memCoupon->bindValue(':memNo',$memNo);
	  		$memCoupon->execute();
			$memCouponRow = $memCoupon->fetchAll(PDO::FETCH_ASSOC);
			echo json_encode($memCouponRow);
			break;
		case "memOrder"://1.運費(定價:60) 2.還有訂單狀態(刪除) 3.資料表(orderform)的信用卡有效期限類型有點奇怪(已修改) 4.orderdetails的orderNo不可重複(已把unique點掉)
			$sql = "SELECT `orderform`.`orderNo`, 
						   `orderform`.`startDate`, 
						   `orderform`.`totalPrice`, 
						   `orderform`.`cancelDate`
					FROM `dd103g1`.`orderform`
                    WHERE `orderform`.`memNo` = :memNo 
                    ORDER BY `orderform`.`orderNo` DESC";
			$memOrder=$pdo->prepare($sql);
	  		$memOrder->bindValue(':memNo',$memNo);
	  		$memOrder->execute();
			$memOrderRow = $memOrder->fetchAll(PDO::FETCH_ASSOC);
			echo json_encode($memOrderRow);
			break;
		case "memOrderDetail":
			$orderNo = (isset($_POST['orderNo'])) ? trim($_POST['orderNo']) : exit('ERROR: NO ORDERNO!');
			$sql = "SELECT `orderdetails`.`orderDetailNo`, 
						   `orderdetails`.`orderItemName`, 
						   `orderdetails`.`orderPrice`, 
						   `orderdetails`.`orderItemNum`, 
						   `orderdetails`.`orderItemTotal`, 
						   `orderdetails`.`orderItemPic`
					FROM `dd103g1`.`orderdetails`
                    WHERE `orderdetails`.`orderNo` = :orderNo";
			$memOrderDetail=$pdo->prepare($sql);
	  		$memOrderDetail->bindValue(':orderNo',$orderNo);
	  		$memOrderDetail->execute();
			$memOrderDetailRow = $memOrderDetail->fetchAll(PDO::FETCH_ASSOC);
			echo json_encode($memOrderDetailRow);
			break;
		case "memReserve"://1.預約日期是行程的日期還是我點選預約的那天?(行程的日期) 2.行程名稱放在哪個資料表?(scenicspots) 3.已取消的是直接刪掉還是在哪邊?(刪除) 4. reserve的reserveDate和reserveRoute的分別(reserveRoute是活動名稱)
			$sql = "SELECT `reserve`.`reserveNo`, 
						   `reserve`.`reserveDate`, 
						   `reserve`.`reserveRoute` , 
						   `reserve`.`reserveNum` 
					FROM `dd103g1`.`reserve` 
					WHERE `reserve`.`memNo` = :memNo 
					ORDER BY `reserve`.`reserveDate` DESC";
			$memReserve=$pdo->prepare($sql);
	  		$memReserve->bindValue(':memNo',$memNo);
	  		$memReserve->execute();
			$memReserveRow = $memReserve->fetchAll(PDO::FETCH_ASSOC);
			echo json_encode($memReserveRow);
			break;
		case "updateMemInfo"://修改個人資訊
			$memName = (isset($_POST['memName'])) ? trim($_POST['memName']) : exit('ERROR: NO MEMNAME!');
			$memPhone = (isset($_POST['memPhone'])) ? trim($_POST['memPhone']) : exit('ERROR: NO MEMPHONE!');
			$memAddress = (isset($_POST['memAddress'])) ? trim($_POST['memAddress']) : exit('ERROR: NO MEMADDRESS!');
			$memEmail = (isset($_POST['memEmail'])) ? trim($_POST['memEmail']) : exit('ERROR: NO MEMEMAIL!');
			$memVisa = (isset($_POST['memVisa'])) ? trim($_POST['memVisa']) : exit('ERROR: NO memVisa!');
			$sql = "UPDATE `dd103g1`.`member` 
					SET `memName` = :memName, 
						`memPhone` = :memPhone, 
						`memAddress` = :memAddress, 
						`memEmail` = :memEmail, 
						`memVisa` = :memVisa 
					WHERE `memNo` = :memNo";
			$updateMemInfo=$pdo->prepare($sql);
	  		$updateMemInfo->bindValue(':memName',$memName);
	  		$updateMemInfo->bindValue(':memPhone',$memPhone);
	  		$updateMemInfo->bindValue(':memAddress',$memAddress);
	  		$updateMemInfo->bindValue(':memEmail',$memEmail);
	  		$updateMemInfo->bindValue(':memVisa',$memVisa);
	  		$updateMemInfo->bindValue(':memNo',$memNo);
	  		$updateMemInfo->execute();
	  		$text = "已修改完成";
			echo json_encode(array(true, $text), JSON_FORCE_OBJECT);
			break;
		case "updateMemPsw"://修改密碼
			$memPsw = (isset($_POST['memPsw'])) ? trim($_POST['memPsw']) : exit('ERROR: NO MEMPSW!');
			$sql = "UPDATE `dd103g1`.`member` 
					SET `memPassword` = :memPsw 
					WHERE `memNo` = :memNo";
			$updateMemPsw=$pdo->prepare($sql);
	  		$updateMemPsw->bindValue(':memPsw',$memPsw);
	  		$updateMemPsw->bindValue(':memNo',$memNo);
	  		$updateMemPsw->execute();
	  		$text = "已修改完成";
			echo json_encode(array(true, $text), JSON_FORCE_OBJECT);
			break;
		case "deletePostcard"://刪除明信片
			$postcardNo = (isset($_POST['postcardNo'])) ? (int)$_POST['postcardNo'] : exit('ERROR: NO POSTCARDNO!');
			$sql = "DELETE FROM `dd103g1`.`postcard` WHERE `postcardNo`= :postcardNo";
			$deletePostcard=$pdo->prepare($sql);
	  		$deletePostcard->bindValue(':postcardNo',$postcardNo);
	  		$deletePostcard->execute();
	  		$text = "已刪除此明信片";
			echo json_encode(array(true, $text), JSON_FORCE_OBJECT);
			break;
		case "cancelOrder"://取消訂單
			$orderNo = (isset($_POST['orderNo'])) ? (int)$_POST['orderNo'] : exit('ERROR: NO ORDERNO!');
			$cancelDate = date("Y-m-d");
			$sql = "UPDATE `dd103g1`.`orderform` 
					SET `cancelDate`= :cancelDate 
					WHERE `orderNo`= :orderNo";
			$cancelOrder=$pdo->prepare($sql);
	  		$cancelOrder->bindValue(':cancelDate',$cancelDate);
	  		$cancelOrder->bindValue(':orderNo',$orderNo);
	  		$cancelOrder->execute();
			$cancelOrderRow = $cancelOrder->fetchAll(PDO::FETCH_ASSOC);
	  		$text = "已取消訂單";
			echo json_encode(array(true, $text), JSON_FORCE_OBJECT);
			break;
		case "deleteReserve"://刪除行程
			$reserveNo = (isset($_POST['reserveNo'])) ? (int)$_POST['reserveNo'] : exit('ERROR: NO RESERVENO!');
			$sql = "DELETE FROM `dd103g1`.`reserve` WHERE `reserveNo`= :reserveNo";
			$deleteReserve=$pdo->prepare($sql);
	  		$deleteReserve->bindValue(':reserveNo',$reserveNo);
	  		$deleteReserve->execute();
	  		$text = "已刪除此行程";
			echo json_encode(array(true, $text), JSON_FORCE_OBJECT);
			break;
		default:
			break;
	}
} catch (PDOException $e) {
    $errMsg = $errMsg . "錯誤訊息: " . $e->getMessage() . "<br>";
    $errMsg .= "錯誤行號: " . $e->getLine() . "<br>";
}
if( $errMsg != ""){
    echo $errMsg;
}
?>