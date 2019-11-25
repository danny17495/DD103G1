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
<header>
            <div class="container headerStyle">
                <a href="index.html">
                    <h1>
                        <img src="images/logo.png" alt="logo">
                    </h1>
                </a>
                <input type="checkbox" id="headerCheck" >
                <label for="headerCheck" class="headerClick">
                    <span></span>
                    <span></span>
                    <span></span>
                </label>
                    <nav  class="navMenu">
                        <div class="navDarken">
                            <ul>
                                <li>
                                    <a href="spotIntro.html">行程介紹</a>
                                </li>
                                <li>
                                    <a href="reserve.html">預約行程</a>
                                </li>
                                <li>
                                    <a href="postcard.html">客製明信片</a>
                                </li>
                                <li>
                                    <a href="shop.html">購物商城</a>
                                </li>
                                <li>
                                    <a href="competition.html">投票比賽</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <div class="headerMemInfo">
                        <span id="headerMemName"></span>
                        <a href="javascript:;"></a>
                    </div>
                    <div class="headerIcon">
                        <a href="javascript:;" id="shopcart">
                            <img src="images/icon_shopcar.png" alt="icon_shopcar">
                        </a>
                        <a id="memberInfo" href="member.php">
                            <img src="images/icon_login.png" alt="icon_login">
                        </a>
                    </div>
            </div>
    </header>
   <!------- 小遊戲 說明 ------> 
   <section class="gameOuter">
    <div class="container">
       <h1>玩遊戲拿優惠券</h1>
       <div class="game_illustration">
           <h3>遊戲說明</h3>
           <p>遊戲的任務是尋找九份特產。
            <br>
            <span></span>
            找出以上三個隱藏在畫面中的特產，在遊戲面板上點選指定的九份特產即可獲得優惠券，優惠券可以折抵購物商城中的消費唷!
            <br>
            您需要尋找的三個物品皆為九份特產，
            找到並使用滑鼠點選特產後，您選到的特產會以紅圈標示：<span></span>
            該特產名稱的顏色會變暗。 
            當您找不到特產時，您可以按左上角的提示尋求幫助。<span></span>
            提示按鈕可以幫助你找到特產、達成任務。
            <br>
            現在就開始遊戲吧!
            </p>
  </div>
  <!------- 小遊戲------> 
       <div class="littleGame">
            <div class="littleGameWrap" id="GameWrap">
                <!-- <img src="images/game/game1_playbtn.png" alt="" id="game_playbtn">  -->
                <div class="whiteButton" id="game_playbtn">玩遊戲拿優惠券</div>
                <div class="suggestionBar" id="suggestionBar">
                   <img src="images/game/suggestion.png" alt="" id="game_suggestion">
                   <span id="taroText">芋圓</span> 
                   <img src="images/game/taro.png" alt="" id="taro">
                   <span id="grassriceText">草仔粿</span> 
                   <img src="images/game/grassrice.png" alt="" id="grassrice">
                   <span id="meatballText">肉圓</span> 
                   <img src="images/game/meatball.png" alt="" id="meatball">
                </div>
                <div class="game1" id="game1">
                    <div id="taro_img">
                        <img src="images/game/taro_in_game.png" alt="" id="taro_in_game1">
                        <span id="taro_in_game1_after"></span>
                    </div>
                    <div class="grassrice_img">
                       <img src="images/game/grassrice_in_game.png" alt="" id="grassrice_in_game1">
                       <span id="grassrice_in_game1_after"></span> 
                    </div>
                    <div class="meatball_img">
                       <img src="images/game/meatball_in_game.png" alt="" id="meatball_in_game1">
                       <span id="meatball_in_game1_after"></span> 
                    </div>  
                </div>
                <div class="game2" id="game2">
                    <div id="taro_img">
                        <img src="images/game/taro_in_game.png" alt="" id="taro_in_game2">
                        <span id="taro_in_game2_after"></span>
                    </div>
                    <div id="grassrice_img">
                       <img src="images/game/grassrice_in_game.png" alt="" id="grassrice_in_game2">
                       <span id="grassrice_in_game2_after"></span> 
                    </div>
                    <div id="meatball_img">
                       <img src="images/game/meatball_in_game.png" alt="" id="meatball_in_game2">
                       <span id="meatball_in_game2_after"></span> 
                    </div>  
                </div>
            </div>
            <form action="game5.php" id="game_form5">
                <button id="game_getCoupon">領取優惠券</button>
            </form>
            <form action="game10.php" id="game_form10">
                <button id="game_getCoupon2">領取優惠券</button>
            </form>
        </div>
     </div>
   </section>
    <footer>
        <div>
            <a href="#">
                <i class="fa fa-facebook" aria-hidden="true"></i>
            </a>
            <a href="#">
                <i class="fa fa-twitter" aria-hidden="true"></i>
            </a>
            <a href="#">
                <i class="fa fa-instagram" aria-hidden="true"></i>
            </a>
        </div>
        <p>DD103 G1 copyright</p>
 </footer>
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
  <!-- <section id="login" class="Loginwrap">
    <div class="LoginForm">
        <div class="Loginhead" id="LoginForm-head">
            <div data-tab="login">
                <div class="Loginclose">
                    <h3>會員登入</h3>
                    <a href="game.html">
                    <i class="fa fa-times-circle Trip2_lightBoxBTN game_close" aria-hidden="true"></i>
                    </a>
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
   </section> -->
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
<section id="loginRegister" class="Loginwrap">
    <div class="LoginForm">
        <div class="Loginhead" id="LoginForm-head">
            <div data-tab="login">
                <div class="Loginclose">
                    <h3>會員註冊</h3>
                    <i class="fa fa-times-circle Trip2_lightBoxBTN game_close" aria-hidden="true" @click="clear"></i>
                </div>
            </div>
        </div>
        <form action="" id="myForm">
            <div class="Loginbody" id="LoginForm-body">
                <div class="Login-signup">
                    <div class="LoginForm-row">
                        <label class="Loginlabal">姓名</label>
                        <input class="Logininput" type="text" placeholder="輸入您的名字" v-model="memName">
                    </div>
                    <div class="LoginForm-row">
                        <label class="Loginlabal">帳號<span class="errMsg">{{idMsg}}</span></label>
                        <input class="Logininput" v-model="memId" @change="testId" type="text" placeholder="4~10個英文字或數字"
                            maxlength="10">

                    </div>
                    <div class="LoginForm-row">
                        <label class="Loginlabal" style="color:aliceblue;">密碼<span
                                class="errMsg">{{pswMsg}}</span></label>
                        <input class="Logininput" @change="testPsw" v-model="memPassword" type="password"
                            placeholder="英文開頭且包含數字">
                    </div>
                    <div class="LoginForm-row">
                        <label class="Loginlabal" style="color:aliceblue;">密碼確認<span
                                class="errMsg">{{pswConfirmMsg}}</span></label>
                        <input class="Logininput" type="password" placeholder="再次輸入您的密碼" v-model="pswConfirm">
                    </div>
                    <div class="LoginForm-row">
                        <label class="Loginlabal" style="color:aliceblue;">Email<span
                                class="errMsg">{{emailMsg}}</span></label>
                        <input class="Logininput" v-model="memEmail" type="text" @change="testEmail"
                            placeholder="輸入您的信箱">
                    </div>
                    <div class="LoginForm-row">
                        <div class="LoginBtnR">
                            <div class="whiteButton">
                                <a href="#" id="signup" name="signup" @click="submit">註冊</a>
                            </div>
                        </div>
                        <div class="LoginBtnL">
                            <div class="whiteButton">
                                <a href="javascript:;" @click="clear">回上頁</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<section id="loginforget" class="Loginwrap">
    <div class="LoginForm">
        <div class="Loginhead" id="LoginForm-head">
            <div data-tab="login">
                <div class="Loginclose">
                    <h3>重設密碼</h3>
                    <i class="fa fa-times-circle Trip2_lightBoxBTN game_close" aria-hidden="true" @click="clear"></i>

                </div>
            </div>
        </div>
        <form action="#">
            <div class="Loginbody LoginForm-body">
                <div class="login">
                    <div class="LoginForm-row">
                        <label class="LoginLabel">Email<span class="errMsg">{{errMsg}}</span></label>
                        <input class="Logininput" type="email" placeholder="輸入您的信箱" v-model="email" @change="test"
                            id="inputEmail">
                    </div>
                    <p class="resetpsw">*請送出表單後,到信箱查看並重設密碼*</p>
                    <div class="LoginForm-row fix">
                        <div class="LoginBtnR">
                            <div class="whiteButton">
                                <a href="#" @click="submitEmail">
                                    送出
                                </a>
                            </div>
                        </div>
                        <div class="LoginBtnL">
                            <div class="whiteButton">
                                <a href="javascript:;" @click="clear">回上頁</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<script>

// let contestnow= document.getElementById('contestnow'); //註冊你那個按鈕點擊事件
//     contestnow.addEventListener('click',function(e){ //點擊按鈕時 判定有無登入
//          if (!sessionStorage['memNo']) { //固定寫法 一定要有
//                  memberInfoClick = false;//固定寫法 一定要有
//                  e.preventDefault();//如果點擊的按鈕是a標籤 必須加入
//                  openLoginData();//固定寫法 一定要有 打開燈箱
//         }
     
//     });
// </script>
<?php
if(isset( $_SESSION['memNo'])){
    $memNo=$_SESSION['memNo'];
    try{
        require_once("connect.php");
        $sql="insert into `holdingcoupon` (memNo,discount,used) VALUES($memNo,'10','0')";
        $coupon=$pdo->exec($sql);
         // echo "success";
         ?>

    <script>
    console.log('hihi');
    function loginGetC(){
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
    }
    loginGetC();
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
    function loginGetC(){
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
    }
    function NOTLoginGetC(){ //登入 註冊 盒子
    let login=$id("login");
    let loginforget = $id("loginforget");
    let loginRegister = $id("loginRegister");
    let linkLoginForget = $id("linkLoginForget");
    let loginClose = document.querySelectorAll(".game_close");
    let linkLoginRegister = document.querySelector('.LoginForm-signup-now');
    let LoginBtnL = document.querySelectorAll('.LoginBtnL');
    let LoginBtnCenter = document.querySelector('.LoginBtnCenter');
    login.style.display="block";
    $id("user-id").value = '';
    $id("user-psw").value = '';
    linkLoginForget.addEventListener("click",function(){
        login.style.display = "none";
        loginforget.style.display="block";
    });
    linkLoginRegister.addEventListener('click',function(){
        login.style.display = "none";
        loginRegister.style.display = "block";
    });
    LoginBtnL.forEach(dom => {
        dom.addEventListener('click', function (e) {
            e.preventDefault();
            loginforget.style.display = "none";
            loginRegister.style.display="none";
            login.style.display = "block";
            $id("user-id").value = '';
            $id("user-psw").value = '';
        });
    });
    loginClose.forEach(function(dom) {
        dom.addEventListener('click', function () {
            login.style.display="none";
            loginforget.style.display = "none";
            loginRegister.style.display = "none";
            // $id("user-id").value = '';
            // $id("user-psw").value = '';
        });
    });
    LoginBtnCenter.addEventListener('click',sendData);
}

function sendData(){
    let userId = $id("user-id").value;
    let userPsw = $id("user-psw").value;
    if (userId == '' || userPsw==''){
        alertWrap("請輸入帳號密碼");
    }else{
        let xhr=new XMLHttpRequest();
        xhr.onload=function(){
            let loginResult=xhr.responseText;
            console.log(loginResult);
            if (loginResult.indexOf('systemError')!=-1){
                alertWrap("系統錯誤");
            } else if (loginResult.indexOf('loginError') != -1){
                alertWrap("帳號密碼錯誤");
            }else{
                userData = JSON.parse(loginResult)[0];
                alert(userData);
                for (var i in userData) {
                    sessionStorage.setItem(i, userData[i]);
                }
                sessionStorage.setItem('memPassword', "");//不顯示
                sessionStorage.setItem('memVisa', "");//不顯示
                //console.log(userData.name);
                $id("login").style.display = "none";
                $id("headerMemName").innerHTML = `${userData.memName}<a id="logout" href="javascript:;">登出</a>`;
                $id("logout").onclick=logout;
                if (memberInfoClick){ //判定原先有無按會員頁按鈕
                    document.location.href = "member.php";
                    memberInfoClick=false;
                }
                window.location.reload();
            }
            
        }
        xhr.open("post", "login.php", true);
        xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");
        xhr.send(`user_id=${userId}&user_psw=${userPsw}`);
    }
}
    NOTLoginGetC();

</script>
<?php
}

?>
<script src="js/vue-2.6.10.min.js"></script>
<script src="js/alert.js"></script>
<!-- <script src="js/login.js"></script> -->
<script src="js/register.js"></script>
<script src="js/forgetPsw.js"></script>
</body>
</html>
