<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>會員中心</title>
    <link href="https://fonts.googleapis.com/css?family=Noto+Serif+TC&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="css/common.css">
       <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="./js/jquery-3.4.1.min.js"></script>
    <script src="js/memberScript.js"></script>
      <script src="js/vue-2.6.10.min.js"></script>
    <script src="js/alert.js"></script>
    <script src="js/login.js"></script>
    <link rel="stylesheet" href="css/memberStyle1.css">    
</head>
<?php 
$errMsg = "";
session_start();
// echo "<pre>_SESSION:"; print_r($_SESSION); echo "</pre>";
//$_SESSION['memNo'] = 1;
$memNo = $_SESSION['memNo'];
?>

<body>
    <!-- <header>
        <div class="container headerStyle">
            <a href="index.html">
                <h1>
                    <img src="images/logo.png" alt="logo">
                </h1>
            </a>
            <input type="checkbox" id="headerCheck">
            <label for="headerCheck" class="headerClick">
                <span></span>
                <span></span>
                <span></span>
            </label>
            <nav class="navMenu">
                <div class="navDarken">
                    <ul>
                        <li>
                            <a href="#">行程介紹</a>
                        </li>
                        <li>
                            <a href="#">預約行程</a>
                        </li>
                        <li>
                            <a href="postcard.html">客製明信片</a>
                        </li>
                        <li>
                            <a href="#">購物商城</a>
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
                <a href="shopcart.html">
                    <img src="images/icon_shopcar.png" alt="icon_shopcar">
                </a>
                <a href="#">
                    <img src="images/icon_login.png" alt="icon_login">
                </a>
            </div>
        </div>
    </header> -->
      <header>
            <div class="container headerStyle">
                <a href="home.html">
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
                                    <a href="competition.php">投票比賽</a> 
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <div class="headerMemInfo">
                        <span id="headerMemName"></span>
                        <a href="javascript:;"></a>
                    </div>
                <div class="headerIcon">
                    <a href="shopcart.html" id="shopcart">
                        <img src="images/icon_shopcar.png" alt="icon_shopcar">
                    </a>
                    <a id="memberInfo" href="member.php">
                        <img src="images/icon_login.png" alt="icon_login">
                    </a>
                </div>
            </div>
        </header>
<!--header------------------------------------------------------------------------->
    <div class="forCloudAnimation">
        <!-- 最外層為了雲消失包的 -->
        <!-- 11111111111111111111標題11111111111111111111 -->
        <section class="pageTitle shopcartPageTitle wrapA">
            <div class="container">
                <!-- <h1>會員中心</h1> -->
                <div class="pageTitleCloud1">
                    <img src="images/shopcart/cloud1-60.png" alt="cloud">
                </div>
                <div class="pageTitleCloud2">
                    <img src="images/shopcart/cloud2-70.png" alt="cloud">
                </div>
                <div class="pageTitleBird1">
                    <img src="images/shopcart/bird1.png" alt="bird">
                </div>
                <div class="pageTitleBird2">
                    <img src="images/shopcart/bird2.png" alt="bird">
                </div>
            </div>
        </section><!-- section.pageTitle結束div -->

<!--****會員中心內容***************************************************************************-->
        <div id="memberWrap">
            <div class="container member">
                <div id="memberTab-panel">
                    <!-- 表頭 -->
                    <div class="memberTabs">
                        <a><i id="member-i" class="fa fa-address-book-o" aria-hidden="true"></i>
                            <p>基本資料</p>
                        </a>
                        <a><i id="member-i" class="fa fa-picture-o" aria-hidden="true"></i>
                            <p>明信片</p>
                        </a>
                        <a><i id="member-i" class="fa fa-money" aria-hidden="true"></i>
                            <p>優惠卷</p>
                        </a>
                        <a><i id="member-i" class="fa fa-shopping-bag" aria-hidden="true"></i>
                            <p>訂單查詢</p>
                        </a>
                        <a><i id="member-i" class="fa fa-map" aria-hidden="true"></i>
                            <p>預約行程</p>
                        </a>
                    </div>
                    <!-- 表身 -->
                    <div class="memberTab-content">
<!----------------- 第一頁-基本資料 -->
                    <!-- profile -->
                        <span id="memberTab1" class="memberTabInfo">
                            <div class="top_part">
                                <div class="membertitle">
                                    <h2>基本資料</h2>
                                </div>
                                <div class="memberTabGroup">
                                    <label for="memberName" class="label">姓名</label>
                                    <input id="memberName" type="text" class="memberinput">
                                    <div class="memberRow"><p></p></div>
                                </div>
                             
                                <div class="memberTabGroup">
                                    <label for="memberPhone" class="label">電話</label>
                                    <input id="memberPhone" type="tel" class="memberinput">
                                </div>
                                <div class="memberTabGroup">
                                    <label for="memberEmail" class="label">Email</label>
                                    <input id="memberEmail" type="email" class="memberinput">
                                </div>
                                <div class="memberTabGroup">
                                    <label for="memberAdd" class="label">地址</label>
                                    <input id="memberAdd" type="text" class="memberinput">
                                </div>
                                <div class="memberTabGroup">
                                    <label for="memberVisaN1" class="label">VISA</label>
                                        <input id="memberVisaN1" name="card1" maxlength="4" size="4" onKeyUp="next(this)" class="memberinput memberVisa">&nbsp;-
                                        <input id="memberVisaN2" name="card2" maxlength="4" size="4" onKeyUp="next(this)" class="memberinput memberVisa">&nbsp;-
                                        <input id="memberVisaN3" name="card3" maxlength="4" size="4" onKeyUp="next(this)" class="memberinput memberVisa">&nbsp;-
                                        <input id="memberVisaN4" name="card4" maxlength="4" size="4" onKeyUp="next(this)" class="memberinput memberVisa">
                                    </br>
                                </div>
                                <div class="memberBigbtn">
                                    <div id="memInfoBtn" class="whiteButton memberwbtn" style="border:1px solid #ccc;">
                                        修改
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="bottom_part">
                                <div class="membertitle">
                                    <h2>更改密碼</h2>
                                </div>
                                <div class="memberTabGroup">
                                    <label for="memberPassword" class="label">目前密碼&nbsp;&nbsp;&nbsp;</label>
                                    <input id="memberPassword" type="password" class="memberinput" maxlength="16" placeholder="請輸入目前密碼">
                                </div>
                                <div class="memberTabGroup">
                                    <label for="memberNewPassword" class="label">新的密碼&nbsp;&nbsp;&nbsp;</label>
                                    <input id="memberNewPassword" type="password" class="memberinput" maxlength="16" placeholder="請輸入新的密碼">
                                </div>
                                <div class="memberTabGroup">
                                    <label for="NewPasswordCheck" class="label">再輸入密碼</label>
                                    <input id="NewPasswordCheck" type="password" class="memberinput" maxlength="16" placeholder="請再輸入新的密碼">
                                    </br>
                                </div>
                                <div class="memberBigbtn">
                                    <div id="memPswBtn" value="test" class="whiteButton memberwbtn" style="border:1px solid #ccc;">
                                        儲存變更
                                    </div>
                                </div>
                            </div>
                        </span>
<!------------ 第二頁-明信片 -->
                        <!-- postcard -->
                        <span id="memberTab2" class="memberTabInfo">
                            <ul id="memberPostcard" class="memberul">
                            </ul>
                        </span>
<!------------ 第三頁-優惠劵 -->
                        <!-- coupon -->
                        <span id="memberTab3" class="memberTabInfo">
                            <ul id="memberCoupon" class="memberul" >
                                <div class="memberboxdivwrap1">
                                </div>
                            </ul>
                        </span>
<!---------- 第四頁-訂單查詢 -->
                        <!-- order -->
                        <span id="memberTab4" class="memberTabInfo">
                            <ul id="memberOrder" class="memberul">
                            </ul>
                        </span>
<!---------- 第五頁-預約行程 -->
                        <!-- reserve -->
                        <span id="memberTab5" class="memberTabInfo">
                            <ul id="memberReserve" class="memberul">
                            </ul>
                        </span>
                    </div>
                </div>
                <!--memberTab-panel--整個表格-->
            </div>
            <!--container member-->
        </div>
        <!--memberWap-->
    </div>
 <!--------------------------------------------------------------------------------->
<!--footer-------------------------------------------------------------------------->
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
            <div class="alertContent">我是內容</div>
            <div class="closeWrap">
                <div class="yesButton whiteButton">確認</div>
                <div class="cancelButton whiteButton">取消</div>
            </div>
            <div class="alertClose">
                <i class="fa fa-times-circle Trip2_lightBoxBTN" aria-hidden="true" id="Trip2_lightBoxBTN02"></i>
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
                            <label class="Loginlabal" >帳號<span class="errMsg">{{idMsg}}</span></label>
                            <input class="Logininput" v-model="memId" @change="testId"  type="text" placeholder="4~10個英文字或數字" maxlength="10" >
                        
                        </div>
                        <div class="LoginForm-row">
                            <label class="Loginlabal" style="color:aliceblue;">密碼<span class="errMsg">{{pswMsg}}</span></label>
                            <input class="Logininput" @change="testPsw" v-model="memPassword" type="password" placeholder="英文開頭且包含數字">
                        </div>
                        <div class="LoginForm-row">
                            <label class="Loginlabal" style="color:aliceblue;">密碼確認<span class="errMsg">{{pswConfirmMsg}}</span></label>
                            <input  class="Logininput"  type="password"
                                placeholder="再次輸入您的密碼"  v-model="pswConfirm">
                        </div>
                        <div class="LoginForm-row">
                            <label class="Loginlabal" style="color:aliceblue;" >Email<span class="errMsg">{{emailMsg}}</span></label>
                            <input  class="Logininput" v-model="memEmail" type="text"  @change="testEmail" placeholder="輸入您的信箱">
                        </div>
                        <div class="LoginForm-row">
                            <div class="LoginBtnR">
                                <div class="whiteButton">
                                    <a href="#" id="signup" name="signup"  @click="submit">註冊</a>
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
    <section id="loginforget" class="Loginwrap" >
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
                            <input class="Logininput" type="email" placeholder="輸入您的信箱" v-model="email" @change="test" id="inputEmail">
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
  
    <script src="js/register.js"></script>
    <script src="js/forgetPsw.js"></script>
    <script type="text/javascript">
    var memNo = "<?php echo $memNo; ?>", 
        memInfoBtn = false, //預設還不能修改
        memPswBtn = false, //預設沒全部輸入完成不能送出
        tapNo = 0, //預設是第一頁
        tapTypeArr = ["memInfo","memPostcard","memCoupon","memOrder","memReserve","memPsw"], 
        postcardNoArr = new Array(); //暫存明信片ID的Array(從新到舊)
        reserveNoArr = new Array(); //暫存預約行程ID的Array(從新到舊)
    Init(tapNo);
    $('input.memberVisa').keyup(function() { //限制數字
        this.value = this.value.replace(/[^0-9\.-]/g, '');
    });
    $(document).on("click", ".memberTabs a", function(){//頁籤切換
        let tabClickNo = $(this).index();
        tapNo = tabClickNo;
        Init(tapNo);
    });
    $(document).on("click", "#memInfoBtn", function(){//基本資料修改儲存按鈕
        if(memInfoBtn == false)
        {
            memInfoBtn = true;
            $(this).text("儲存");
            $('#memberTab1 .top_part input').attr('disabled', false).css('border', '1px solid #CCCCCC').css('color', '#000000');

        }else if(memInfoBtn == true){
            let checkStatus = checkMemInfo();
            if(checkStatus == true)
            {
                let memInfoArr = {
                  "memName": $("#memberName").val(),
                  "memPhone":$("#memberPhone").val(),
                  "memAdd":$("#memberAdd").val(),
                  "memEmail":$("#memberEmail").val(),
                  "memVisa":$("#memberVisaN1").val().toString()+$("#memberVisaN2").val().toString()+$("#memberVisaN3").val().toString()+$("#memberVisaN4").val().toString()};
                memInfoBtn = false;
                $(this).text("修改");
                $('#memberTab1 .top_part input').attr('disabled', true).css('border', '1px solid #EEEEEE').css('color', '#666666');
                updateInfoJson(tapNo,memInfoArr);
            }
        }
    });
    $(document).on("click", "#memPswBtn", function(){//更改密碼儲存按鈕
        let enterNewPsw = $('#memberNewPassword').val().toString(), 
            enterNewPswCheck = $('#NewPasswordCheck').val().toString();
        if(memPswBtn == true && enterNewPsw == enterNewPswCheck)
        {
            let memPswArr = {
                  "memPsw": enterNewPsw.toString()};
            updateInfoJson(5,memPswArr);
            $('#memberTab1 .bottom_part input').val("").attr('disabled', true).css('border', '1px solid #EEEEEE').css('color', '#666666');
            $('#memberPassword').attr('disabled', false).css('border', '1px solid #CCCCCC').css('color', '#000000');
        }else{
            alertWrap("尚未輸入完成！");
        }
    });
    $("#memberPassword").blur(function(){//失去focus時(當頁籤停留在基本資料和有輸入密碼)，會先去確認跟原來的密碼是否相符
        let enterPswLength = $(this).val().toString().length;
        if(tapNo == 0 && enterPswLength > 0)
        {
            checkMemPsw(5);
        }
    });
    $("#memberNewPassword").blur(function(){//失去focus時(當頁籤停留在基本資料和有輸入密碼)，會打開「再輸入密碼」的input
        let enterNewPsw = $(this).val().toString(), 
            enterNewPswCheck = $('#NewPasswordCheck').val().toString(), 
            enterNewPswLength = $(this).val().toString().length, 
            enterNewPswCheckLength = $('#NewPasswordCheck').val().toString().length;
        if(tapNo == 0 && enterNewPswLength > 0)
        {
            $('#NewPasswordCheck').attr('disabled', false).css('border', '1px solid #CCCCCC').css('color', '#000000').focus();
            if(enterNewPswCheckLength > 0 && enterNewPsw !== enterNewPswCheck)
            {
                memPswBtn = false;
                $("#NewPasswordCheck").val("").css("border","1px solid #FF0000");
            }
        }
    });
    $("#NewPasswordCheck").blur(function(){//失去focus時(當頁籤停留在基本資料和有輸入密碼)，會先去確認跟新的密碼是否相符
        let enterNewPsw = $('#memberNewPassword').val().toString(), 
            enterNewPswCheck = $(this).val().toString(), 
            enterNewPswLength = $('#memberNewPassword').val().toString().length, 
            enterNewPswCheckLength = $(this).val().toString().length;
        if(tapNo == 0 && enterNewPswCheckLength > 0)
        {
            if(enterNewPswCheck !== enterNewPsw)
            {
                memPswBtn = false;
                $("#NewPasswordCheck").val("").css("border","1px solid #FF0000");
            }else{
                memPswBtn = true;
                $('#NewPasswordCheck').attr('disabled', false).css('border', '1px solid #CCCCCC').css('color', '#000000');
            }
        }
    });
    $(document).on("click", ".delPostcard", function(){//刪除此圖片
        let postcardIndex = $(this).parents(".memberBigBoxdiv").index(), 
            memPostcardNoArr = {
                "postcardNo": postcardNoArr[postcardIndex].toString()};
        updateInfoJson(tapNo,memPostcardNoArr);
        Init(tapNo);
    });
    $(document).on("click", ".orderDetail", function(){//查看訂單明細
        let orderNo = $(this).parent(".memberli").siblings().eq(0).text(), 
            orderTotalPrice = $(this).parent(".memberli").prev().text(),
            memOrderNoArr = {
                "type": "memOrderDetail",
                "orderNo": orderNo
            };
        getOrderDetail(orderTotalPrice,memOrderNoArr);
        // Init(tapNo);
    });
    $(document).on("click", "#orderDetailMask", function(){//關閉訂單明細
        $(this).remove();
        $("#orderDetailLightbox").remove();
    });
    $(document).on("click", ".cancelOrder", function(){//取消訂單或者預約行程
        let orderNo = $(this).parent(".memberli").siblings().eq(0).text(), 
            cancelOrderNoArr = {
                "orderNo": orderNo
            };
        updateInfoJson(tapNo,cancelOrderNoArr);
        Init(tapNo);
    });
    $(document).on("click", ".deleteReserve", function(){//刪除此圖片
        let reserveIndex = $(this).parents(".membertbody").index()-1, 
            memReserveNoArr = {
                "reserveNo": reserveNoArr[reserveIndex]};
        updateInfoJson(tapNo,memReserveNoArr);
        Init(tapNo);
    });

    function Init(tapNo)//頁面切換後畫面重整
    {
        switch(tapNo)
        {
            case 0:
                memInfoBtn = false;
                memPswBtn = false;
                $('#memberTab1 .top_part input').attr('disabled', true).css('background', '#FFFFFF').css('border', '2px solid #EEEEEE').css('color', '#666666').css('padding', '3px');
                $('#memberTab1 .bottom_part input').css('padding', '3px').css('background', '#FFFFFF').css('border', '2px solid #CCCCCC');
                $('#memberTab1 .bottom_part input').val("").attr('disabled', true).css('border', '2px solid #EEEEEE').css('color', '#666666');
                $('#memberPassword').attr('disabled', false).css('border', '2px solid #CCCCCC').css('color', '#000000');
                break;
            case 1:
                $('#memberPostcard').empty();
                break;
            case 2:
                $('div.memberboxdivwrap1').empty();
                break;
            case 3:
                $('#memberOrder').empty();
                break;
            case 4:
                $('#memberReserve').empty();
                break;
        } 
        getInfo(tapNo);
    }
    function getInfo(tapNo)//取資料(除了訂單詳細資訊)
    {
        let type = tapTypeArr[tapNo];
        $.ajax({
            "type": "POST",
            "dataType": "json",
            "url": "php/getMember.php",
            "data": {
                "type": type
            },      
            "cache": false,
            "success": function (data) {   
                // console.log(data); 
                switch(type)
                {
                    case "memInfo":
                        memInfo(data);
                        break;
                    case "memPostcard":
                        memPostcard(data);
                        break;
                    case "memCoupon":
                        memCoupon(data);
                        break;
                    case "memOrder":
                        memOrder(data);
                        break;
                    case "memReserve":
                        memReserve(data);
                        break;
                    case "memPsw":
                        checkMemPsw(data);
                        break;
                }
            },
            "error":function(data){
                console.log(data);
            }
        });
    }
    function getOrderDetail(totalPrice, dataJson)//取訂單詳細資訊
    {
        let type = tapTypeArr[tapNo];
        $.ajax({
            "type": "POST",
            "dataType": "json",
            "url": "php/getMember.php",
            "data": dataJson,      
            "cache": false,
            "success": function (data) {   
                // console.log(data); 
                orderDetail(totalPrice,data);
            },
            "error":function(data){
                console.log(data);
            }
        });
    }
    function updateMem(dataJson)//更新
    {
        // console.log(dataJson);
        $.ajax({
            "type": "POST",
            "dataType": "json",
            "url": "php/getMember.php",
            "data": dataJson,      
            "cache": false,
            "success": function (data) {   
                // console.log(data); 
                if(data[0] == true)
                {
                    // alert(data[1]);
                }
            },
            "error":function(data){
                console.log(data);
            }
        });
    }
    function updateInfoJson(tapNo, dataArr)//更新要的資料
    {
        let type = tapTypeArr[tapNo], 
            dataJson = new Array();
        switch(type)
        {
            case "memInfo":
                dataJson = {
                      "type": "updateMemInfo",
                      "memName": dataArr.memName,
                      "memPhone":dataArr.memPhone,
                      "memAddress":dataArr.memAdd,
                      "memEmail":dataArr.memEmail,
                      "memVisa":dataArr.memVisa
                    };
                break;
            case "memPostcard":
                dataJson = {
                      "type": "deletePostcard",
                      "postcardNo": dataArr.postcardNo
                    };
                break;
            case "memCoupon":
                break;
            case "memOrder":
                dataJson = {
                      "type": "cancelOrder",
                      "orderNo": dataArr.orderNo
                    };
                break;
            case "memReserve":
                dataJson = {
                      "type": "deleteReserve",
                      "reserveNo": dataArr.reserveNo
                    };
                break;
            case "memPsw":
                dataJson = {
                      "type": "updateMemPsw",
                      "memPsw": dataArr.memPsw
                    };
                break;
        }
        updateMem(dataJson);
    }
    function memInfo(data)//顯示基本資料
    {
        // data.memVisa = 1234567890123456;
        $("#memberName").val("").val(data.memName);
        $("#memberPhone").val("").val(data.memPhone);
        $("#memberEmail").val("").val(data.memEmail);
        $("#memberAdd").val("").val(data.memAddress);
        $(".memberVisa").val("");
        if(data.memVisa !== null)
        {
            let memVisaArr = springSplit(data.memVisa.toString(),4);
            for(let x = 0; x < memVisaArr.length; x++)
            {
                $("#memberVisaN"+(x+1)).val(memVisaArr[x]);
            }
        }
    }
    function memPostcard(data)//顯示明信片
    {
        let addContent = '';
        if(data.length > 0)
        {
            for(let x = 0; x < data.length; x++)
            {
                postcardNoArr[x] = data[x].postcardNo;
                addContent += '<div class="memberBigBoxdiv"><div class="memberboxdiv"><li class="memberli">';
                addContent += '<img class="postcardPic" src="images/postcardClient/'+data[x].postcardPic+'">';
                addContent += '</li></div><div class="memberboxdiv"><span class="downloadPic"><a href="#">下載圖片</a></span><span class="LineShare"><a href="#">LINE</a></span><span class="delPostcard"><a href="#">刪除</a></span></div></div>';
            }
        }else{
            addContent += '<div class="ifNull"><p>尚未有明信片</p></div>';
        }
        $('#memberPostcard').append(addContent);
    }
    function memCoupon(data)//顯示優惠券
    {
        let addContentUsed = '', 
            addContentUnused = '', 
            addContent = '';
        if(data.length > 0)
        {
            for(let x = 0; x < data.length; x++)
            {
                if(data[x].used == 0)
                {
                    addContentUsed += '<div class="memberBigBoxdiv2"><div class="memberboxdiv3">折抵$'+data[x].discount+'<p>序號0000'+data[x].couponNo+'</p></div><div class="memberboxdiv3">';
                    addContentUsed += '<img src="images/member/memberCoupon.jpg">';
                    addContentUsed += '</div></div>';
                }else{
                    addContentUnused += '<div class="memberBigBoxdiv2 used"><div class="memberboxdiv3">折抵$'+data[x].discount+'<p>序號0000'+data[x].couponNo+'</p></div><div class="memberboxdiv3">';
                    addContentUnused += '<img src="images/member/memberCoupon.jpg">';
                    addContentUnused += '</div></div>';
                }    
            }
            addContent += addContentUsed;
            addContent += addContentUnused;
        }else{
            addContent += '<div class="ifNull"><p>尚未有優惠券</p></div>';
        }
        $('div.memberboxdivwrap1').append(addContent);
    }
    function memOrder(data)//顯示訂單(不是詳細訂單)
    {
        let addContentNow = '', 
            addContentCancel = '', 
            addContent = '';
        if(data.length > 0)
        {
            addContent += '<li class="memberthead"><ol class="memberol"><li class="memberli">訂單編號</li><li class="memberli">訂購日期</li><li class="memberli">總金額</li><li class="memberli">明細</li><li class="memberli">取消訂單</li></ol></li>';
            for(let x = 0; x < data.length; x++)
            {
                if(data[x].cancelDate == null)
                {
                    addContentNow += '<li class="membertbody"><ol class="memberol">';
                    addContentNow += '<li class="memberli" data-title="訂單編號">'+data[x].orderNo+'</li>';
                    addContentNow += '<li class="memberli" data-title="訂購日期">'+data[x].startDate+'</li>';
                    addContentNow += '<li class="memberli" data-title="總金額">'+data[x].totalPrice+'</li>';
                    addContentNow += '<li class="memberli" data-title="明細"><span class="orderDetail">查看</span></li>';
                    addContentNow += '<li class="memberli" data-title="取消訂單"><span class="cancelOrder">取消</span></li></ol></li>';
                }else{
                    addContentCancel += '<li class="membertbody"><ol class="memberol">';
                    addContentCancel += '<li class="memberli" data-title="訂單編號">'+data[x].orderNo+'</li>';
                    addContentCancel += '<li class="memberli" data-title="訂購日期">'+data[x].startDate+'</li>';
                    addContentCancel += '<li class="memberli" data-title="總金額">NT.'+data[x].totalPrice+'</li>';
                    addContentCancel += '<li class="memberli" data-title="明細"><span class="orderDetail">查看</span></li>';
                    addContentCancel += '<li class="memberli" data-title="取消訂單">'+data[x].cancelDate+'</li></ol></li>';
                }    
            }
            addContent += addContentNow;
            addContent += addContentCancel;
            addContent += '</tbody></table>';
        }else{
            addContent += '<div class="ifNull"><p>尚未有訂單</p></div>';
        }
        $('#memberOrder').append(addContent);
    }
    function memReserve(data)//顯示預約行程
    {
        let addContent = '';
        if(data.length > 0)
        {
            addContent += '<li class="memberthead"><ol class="memberol"><li class="memberli">預約日期</li><li class="memberli">行程</li><li class="memberli">人數</li><li class="memberli">取消預約</li></ol></li>';
            for(let x = 0; x < data.length; x++)
            {
                reserveNoArr[x] = data[x].reserveNo;
                addContent += '<li class="membertbody"><ol class="memberol">';
                addContent += '<li class="memberli" data-title="預約日期">'+data[x].reserveDate+'</li>';
                addContent += '<li class="memberli" data-title="行程">'+data[x].reserveRoute+'</li>';
                addContent += '<li class="memberli" data-title="人數">'+data[x].reserveNum+'</li>';
                addContent += '<li class="memberli" data-title="取消預約"><span class="deleteReserve">取消</span></li></ol></li>';   
            }
        }else{
            addContent += '<div class="ifNull"><p>尚未有訂單</p></div>';
        }
        $('#memberReserve').append(addContent);
        $('#memberReserve li.memberthead li.memberli:nth-child(1)').css("width","120px");
        $('#memberReserve li.memberthead li.memberli:nth-child(2)').css("width","100px");
        $('#memberReserve li.memberthead li.memberli:nth-child(3)').css("width","50px");
        $('#memberReserve li.memberthead li.memberli:nth-child(4)').css("width","80px");
    }
    function orderDetail(totalPrice, data)//顯示詳細訂單
    {
        let discount = parseInt(totalPrice), 
            addContent = '<div id="orderDetailMask"></div><div id="orderDetailLightbox"><div id="orderDetailTable">';
        if(data.length > 0)
        {
            addContent += '<li class="memberthead"><ol class="memberol"><li class="memberli">訂單明<br>細編號</li><li class="memberli">圖片</li><li class="memberli">商品名稱</li><li class="memberli">單價</li><li class="memberli">數量</li><li class="memberli">小計</li></ol></li>';
            for(let x = 0; x < data.length; x++)
            {
            if (data[x].productType == '商城商品'){
                discount -= parseInt(data[x].orderItemTotal);
                addContent += '<li class="membertbody"><ol class="memberol">';
                addContent += '<li class="memberli" data-title="訂單明細編號">'+data[x].orderDetailNo+'</li>';
                addContent += '<li class="memberli" data-title="圖片"><img class="orderItemPic" src="images/shopcart/shopItemClient/'+data[x].orderItemPic+'"></li>';
                addContent += '<li class="memberli" data-title="商品名稱">'+data[x].orderItemName+'</li>';
                addContent += '<li class="memberli" data-title="單價">'+data[x].orderPrice+'</li>';
                addContent += '<li class="memberli" data-title="數量">'+data[x].orderItemNum+'</li>';
                addContent += '<li class="memberli" data-title="小計">'+data[x].orderItemTotal+'</li></ol></li>';
            }else{
                discount -= parseInt(data[x].orderItemTotal);
                addContent += '<li class="membertbody"><ol class="memberol">';
                addContent += '<li class="memberli" data-title="訂單明細編號">'+data[x].orderDetailNo+'</li>';
                addContent += '<li class="memberli" data-title="圖片"><img class="orderItemPic" src="images/postcardClient/'+data[x].orderItemPic+'"></li>';
                addContent += '<li class="memberli" data-title="商品名稱">'+data[x].orderItemName+'</li>';
                addContent += '<li class="memberli" data-title="單價">'+data[x].orderPrice+'</li>';
                addContent += '<li class="memberli" data-title="數量">'+data[x].orderItemNum+'</li>';
                addContent += '<li class="memberli" data-title="小計">'+data[x].orderItemTotal+'</li></ol></li>';
            }
        }
            discount -= 120;
            discount = Math.abs(discount);
            addContent += '<div id="others">';
            addContent += '<div id="shippingPrice">運費：120元</div>';
            if(discount > 0)
            {
                addContent += '<div id="discount">折抵：'+discount+'元</div>';
            }
            addContent += '<div id="totalPrice">總金額：'+totalPrice+'元</div>';
            addContent += '</div>';
        }else{
            addContent += '<div class="ifNull"><p>尚未有訂單</p></div>';
        }
        addContent += '</div></div>';
        $('.memberTab-content').append(addContent);
    }
    function checkMemPsw(tapNo)//比對輸入密碼是否與目前密碼相符
    {
        let type = tapTypeArr[tapNo];
        let enterPsw = $("#memberPassword").val().toString();
        $.ajax({
            "type": "POST",
            "dataType": "json",
            "url": "php/getMember.php",
            "data": {
                "type": type, 
                "enterPsw": enterPsw
            },      
            "cache": false,
            "success": function (data) {   
                // console.log(data); 
                if(data[0] == true)
                {
                    $('#memberPassword').attr('disabled', true).css('border', '1px solid #EEEEEE').css('color', '#666666');
                    $('#memberNewPassword').attr('disabled', false).css('border', '1px solid #CCCCCC').css('color', '#000000').focus();
                }else{
                    $("#memberPassword").val("").css("border","1px solid #FF0000");
                }
            },
            "error":function(data){
                console.log(data);
            }
        });
    }
    function checkMemInfo()//確認資訊
    {
        let memStatus = true, //預設資訊都填對
            memName = $("#memberName").val(), 
            memPhone = $("#memberPhone").val(),
            memEmail = $("#memberEmail").val(),
            memAdd = $("#memberAdd").val(),
            memVisa = $("#memberVisaN1").val().toString()+$("#memberVisaN2").val().toString()+$("#memberVisaN3").val().toString()+$("#memberVisaN4").val().toString();
        if(memName.length == 0)//確認姓名
        {
            memStatus = false;
            $("#memberName").css("border","1px solid #FF0000");
        }else{
            $("#memberName").css("border","1px solid #CCCCCC");
        }
        if(checkEmail(memEmail) == false)//確認Email
        {
            memStatus = false;
            $("#memberEmail").css("border","1px solid #FF0000");
        }else{
            $("#memberEmail").css("border","1px solid #CCCCCC");
        }
        if(memVisa.length !== 16 && memVisa.length !== 0)//確認Visa
        {
            memStatus = false;
            $("#memberVisaN1").css("border","1px solid #FF0000");
            $("#memberVisaN2").css("border","1px solid #FF0000");
            $("#memberVisaN3").css("border","1px solid #FF0000");
            $("#memberVisaN4").css("border","1px solid #FF0000");
        }else{
            $("#memberVisaN1").css("border","1px solid #CCCCCC");
            $("#memberVisaN2").css("border","1px solid #CCCCCC");
            $("#memberVisaN3").css("border","1px solid #CCCCCC");
            $("#memberVisaN4").css("border","1px solid #CCCCCC");
        }
        return memStatus;
    }
    function checkEmail(email)//確認Email
    {
        var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(!regex.test(email)) 
        {
            return false;
        }else{
            return true;
        }
    }
    function springSplit(text, number)//字串斷行
    {
        let textString = text.toString(), 
            textLength = textString.length, 
            arrKeyLength = Math.floor(textLength/number), 
            textArr = new Array();
        for(let x = 0; x < arrKeyLength; x++)
        {
            let startNum = x*number;
            textArr.push(textString.substr(startNum,number));
        }
        return textArr;
    }
    function next(obj) //填信用卡，滿4碼會自動跳到下一格
    {  
        if (obj.value.length == obj.maxLength) {  
            do {  
                obj = obj.nextSibling;  
            } while (obj.nodeName != "INPUT");  
            obj.focus();  
        }         
    }
    </script>
</body>
</html>