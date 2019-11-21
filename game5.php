<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link href="https://fonts.googleapis.com/css?family=Noto+Serif+TC&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
	<link rel="stylesheet" href="css/common.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="js/login.js"></script>
	<style>
		.loginToCheck{
			margin-top: -25px;
			margin-bottom: 30px;
			cursor: pointer;
			font-family: inherit;
			color: #fff;
		}
		.loginToCheck:hover{
			color: rgba(243, 152, 0);
		}
	</style>
</head>
<body>
  <div class="alertWindow">
    <div class="alert">
        <div class="alertTitle">提示</div>
        <div class="alertContent">您已成功獲得優惠券!</div>
        <a href="#">
        <div class="loginToCheck">查看優惠券</div>
    	</a>
        <div class="closeWrap">
        	<a href="game.html">
            <div class="yesButton whiteButton">確認</div>
			</a>
            <div class="cancelButton whiteButton">取消</div>
        </div>
        <div class="alertClose">
        	<a href="game.html">
            	<i class="fa fa-times-circle Trip2_lightBoxBTN" aria-hidden="true" id="Trip2_lightBoxBTN02"></i>
      		</a>
        </div>
    </div>
  </div>
  <section id="login" class="Loginwrap">
    <div class="LoginForm">
        <div class="Loginhead" id="LoginForm-head">
            <div data-tab="login">
                <div class="Loginclose">
                    <h3>會員登入</h3>
                    <i class="fa fa-times-circle Trip2_lightBoxBTN game_close" aria-hidden="true"></i>
                </div>
            </div>
        </div>
        <form action="">
            <div class="Loginbody" id="LoginForm-body">
                <div class="Login-login">
                    <div class="LoginForm-row">
                        <label class="LoginLabel" for="">帳號</label>
                        <input class="Logininput" id="user-id" type="text" placeholder="account" autocomplete="on">
                    </div>
                    <div class="LoginForm-row">
                        <label class="LoginLabel" for="">密碼</label>
                        <input class="Logininput" type="password" id="user-psw" placeholder="Password"
                            autocomplete="on">
                    </div>
                    <div class="Login-forget">
                        <a class="Login-forget-password" id="linkLoginForget">
                            <p class="LoginP">忘記密碼</p>
                        </a>
                    </div>
                    <div class="LoginForm-row">
                        <div class="LoginBtnCenter whiteButton">登入</div>
                    </div>
                    <a class="LoginForm-signup-now" href="javascript:;">立即註冊</a>
                </div>
            </div>
        </form>
    </div>
</section>
<section id="loginRegister" class="Loginwrap" style="display: none">
    <div class="LoginForm">
        <div class="Loginhead" id="LoginForm-head">
            <div data-tab="login">
                <div class="Loginclose">
                    <h3>會員註冊</h3>
                    <i class="fa fa-times-circle Trip2_lightBoxBTN game_close" aria-hidden="true"></i>
                </div>
            </div>
        </div>
        <form action="">
            <div class="Loginbody" id="LoginForm-body">
                <div class="Login-signup">
                    <div class="LoginForm-row">
                        <label class="Loginlabal" for="">姓名</label>
                        <input id="name" class="Logininput" name="name" type="text" placeholder="Name">
                    </div>
                    <div class="LoginForm-row">
                        <label class="Loginlabal" style="color:aliceblue;" for="">密碼</label>
                        <input id="password" class="Logininput" name="password" type="password" placeholder="Password"
                            autocomplete="on">

                    </div>
                    <div class="LoginForm-row">
                        <label class="Loginlabal" style="color:aliceblue;" for="">密碼確認</label>
                        <input id="passwordcheck" class="Logininput" name="passwordcheck" type="password"
                            placeholder="passwordcheck" autocomplete="on">
                    </div>
                    <div class="LoginForm-row">
                        <label class="Loginlabal" style="color:aliceblue;">Email</label>
                        <input id="Email" class="Logininput" name="email" type="text" size=20 placeholder="email">
                    </div>
                    <div class="LoginForm-row">
                        <div class="LoginBtnR">
                            <div class="whiteButton">
                                <a href="#" id="signup" name="signup">註冊</a>
                            </div>
                        </div>
                        <div class="LoginBtnL">
                            <div class="whiteButton">
                                <a href="javascript:;">回上頁</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<section id="loginforget" class="Loginwrap" style="display: none">
    <div class="LoginForm">
        <div class="Loginhead" id="LoginForm-head">
            <div data-tab="login">
                <div class="Loginclose">
                    <h3>重設密碼</h3>
                    <i class="fa fa-times-circle Trip2_lightBoxBTN game_close" aria-hidden="true"></i>

                </div>
            </div>
        </div>
        <div class="Loginbody LoginForm-body">
            <div class="login">
                <div class="LoginForm-row">
                    <label class="LoginLabel" for="">email</label>
                    <input class="Logininput" type="email" placeholder="email">
                </div>
                <p class="resetpsw">*請送出表單後,到信箱查看並重設密碼*</p>
                <div class="LoginForm-row fix">
                    <div class="LoginBtnR">
                        <div class="whiteButton">
                            <a href="#">
                                送出
                            </a>
                        </div>
                    </div>
                    <div class="LoginBtnL">
                        <div class="whiteButton">
                            <a href="javascript:;">回上頁</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   </section>
<?php
if(isset( $_SESSION['memNo'])){
	$memNo=$_SESSION['memNo'];
    try{
		require_once("connect.php");
		$sql="insert into `holdingcoupon` (memNo,discount,used) VALUES($memNo,'5','0')";
		$coupon=$pdo->exec($sql);
		 // echo "success";
		 ?>

	<script>
	console.log('hihi');

    let alertWindow = document.querySelector('.alertWindow');
    let alertContent = document.querySelector('.alertContent');
    let alertClose = document.querySelector('.alertClose');
    let yesButton = document.querySelector('.yesButton');
    alertWindow.style.display = 'flex';
    // alertContent.innerHTML = title;
    alertClose.addEventListener('click', function () {
        alertWindow.style.display = "none";
        return false;
    });
    yesButton.addEventListener('click', function () {
        alertWindow.style.display = "none";
    });
	</script>

<?php 
	}catch(PDOException $e){
		 echo "error";
}
}else{
    // echo "not login";
?>

<script>
	console.log('no!');
	openLoginData();
</script>
<?php
}

?>
</body>
</html>
