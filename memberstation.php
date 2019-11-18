<?php 
$errMsg = "";
session_start();

try {
  require_once('php/connect.php');

  //找會員
  $member=$pdo->prepare('SELECT * FROM `member` where memberNo = :memberNo');
  $member->bindValue(':memberNo',@$_SESSION['memberNo']);
  $member->execute();

  //找明信片
  $postcardform=$pdo->prepare('SELECT * FROM `postcard` where postcardNo = :postcardNo');
  $postcardform->bindValue(':postcardNo',@$_SESSION['postcardNo']);
  $postcards->execute();

  //找優惠劵
  $holdingcoupon=$pdo->prepare('SELECT * FROM `holdingcoupon` where couponNo = :couponNo');
  $holdingcoupon->bindValue(':couponNo',@$_SESSION['couponNo']);
  $holdingcoupon->execute();

  //找訂單
  $orderform=$pdo->prepare('SELECT * FROM `orderform` where orderNo = :orderNo');
  $orderform->bindValue(':orderNo',@$_SESSION['orderNo']);
  $orderform->execute();

  //找預約
  $reserve=$pdo->prepare('SELECT * FROM `reserve` where reserveNo = :reserveNo');
  $reserve->bindValue(':reserveNo',@$_SESSION['reserveNo']);
  $reserve->execute();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>購物車</title>
    <link href="https://fonts.googleapis.com/css?family=Noto+Serif+TC&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="css/common.css">
    <script type="text/javascript" src="./js/jquery-3.4.1.min.js"></script>
    <script src="js/memberScript.js"></script>
    <link rel="stylesheet" href="css/memberStyle.css">
</head>
<body>
    <header>
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
                    <ul class="memberTab-content">
<!----------------- 第一頁-基本資料 -->
                    <!-- profile -->
                        <span id="memberTab1">
                            <php ?>
                            <div class="top_part">
                                <div class="membertitle">
                                    <h2>基本資料</h2>
                                </div>
                                <div class="memberTabGroup">
                                    <label for="membername" class="label">姓名</label>
                                    <input id="memberinput" type="text" class="memberinput">
                                </div>
                                <div class="memberTabGroup">
                                    <label for="nickname" class="label">暱稱</label>
                                    <input id="memberinput" type="text" class="memberinput">
                                </div>
                                <div class="memberTabGroup">
                                    <label for="phone" class="label">電話</label>
                                    <input id="memberinput" type="text" class="memberinput">
                                </div>
                                <div class="memberTabGroup">
                                    <label for="email" class="label">Email</label>
                                    <input id="memberinput" type="text" class="memberinput">
                                </div>
                                <div class="memberTabGroup">
                                    <label for="add" class="label">地址</label>
                                    <input id="memberinput" type="text" class="memberinput">
                                </div>
                                <div class="memberTabGroup">
                                    <label for="card" class="label">VISA</label>
                                    <input id="membervisa" type="text" class="memberinput">
                                    <input id="membervisa" type="text" class="memberinput">
                                    <input id="membervisa" type="text" class="memberinput">
                                    <input id="membervisa" type="text" class="memberinput">
                                    </br>
                                </div>
                                <div class="memberBigbtn">
                                    <div id="memberwbtn" class="whiteButton" style="border:1px solid #ccc;">
                                        修改
                                    </div>
                                </div>
                            </div>
                            <div class="bottom_part">
                                <div class="membertitle">
                                    <h2>更改密碼</h2>
                                </div>
                                <div class="memberTabGroup">
                                    <label for="password" class="label">目前密碼&nbsp;&nbsp;&nbsp;</label>
                                    <input id="memberinput" type="text" class="memberinput">
                                </div>
                                <div class="memberTabGroup">
                                    <label for="change" class="label">新的密碼&nbsp;&nbsp;&nbsp;</label>
                                    <input id="memberinput input1" type="text" class="memberinput">
                                </div>
                                <div class="memberTabGroup">
                                    <label for="change" class="label">再輸入密碼</label>
                                    <input id="memberinput input2" type="text" class="memberinput">
                                    </br>
                                </div>
                                <div class="memberBigbtn">
                                    <div id="memberwbtn" value="test" class="whiteButton" style="border:1px solid #ccc;">
                                        儲存變更
                                    </div>
                                </div>
                            </div>
                        </span>
<!------------ 第二頁-明信片 -->
                        <!-- postcard -->
                        <span id="memberTab2">
                            <ul id="memberPostcard" class="memberul">
                                <div class="memberBigBoxdiv">
                                    <div class="memberboxdiv">
                                        <li class="memberli"> <img src="../DD103G1/images/member/memberPostercard.png"></li>
                                    </div>
                                    <div class="memberboxdiv">
                                        <a href="#">下載圖片</a>
                                        <a href="#">FB</a>
                                        <a href="#">LINE</a>
                                        <a href="#">刪除</a>
                                    </div>
                                </div>
                                <div class="memberBigBoxdiv">
                                    <div class="memberboxdiv">
                                        <li class="memberli"> <img src="../DD103G1/images/member/memberPostercard.png"></li>
                                    </div>
                                    <div class="memberboxdiv">
                                        <a href="#">下載圖片</a>
                                        <a href="#">FB</a>
                                        <a href="#">LINE</a>
                                        <a href="#">刪除</a>
                                    </div>
                                </div>
                            </ul>
                        </span>
<!------------ 第三頁-優惠劵 -->
                        <!-- coupon -->
                        <span id="memberTab3">
                            <ul id="memberCoupon" class="memberul" >
                                <div class="memberboxdivwrap1">
                                    <div class="memberBigBoxdiv2">
                                        <div class="memberboxdiv3">
                                            <a href="#" style="text-align: left;">芋圓 $-5元</a>
                                            <a href="#" style="text-align: left;">序號: 12345</a>
                                        </div>
                                        <div class="memberboxdiv3">
                                            <img src="../DD103G1/images/member/memberCoupon.png">
                                        </div>
                                    </div>
                                    <div class="memberBigBoxdiv2">
                                        <div class="memberboxdiv3">
                                            <a href="#" style="text-align: left;">芋圓 $-5元</a>
                                            <a href="#" style="text-align: left;">序號: 12345</a>
                                        </div>
                                        <div class="memberboxdiv3">
                                            <img src="../DD103G1/images/member/memberCoupon.png">
                                        </div>
                                    </div>
                                </div>
                            </ul>
                        </span>
<!---------- 第四頁-訂單查詢 -->
                        <!-- order -->
                        <span id="memberTab4">
                            <ul id="memberOrder" class="memberul">
                                <li class="memberthead">
                                    <ol class="memberol">
                                        <li class="memberli">訂單<br>編號</li>
                                        <li class="memberli">訂購<br>日期</li>
                                        <li class="memberli">商品<br>名稱</li>
                                        <li class="memberli">運費</li>
                                        <li class="memberli">總金額</li>
                                        <li class="memberli">數量</li>
                                        <li class="memberli">訂單<br>狀態</li>
                                        <li class="memberli">取消<br>訂單</li>
                                    </ol>
                                </li>
                                <li class="membertbody">
                                    <ol class="memberol">
                                        <li class="memberli" data-title="訂單編號">10001</li>
                                        <li class="memberli" data-title="訂購日期">20191106</li>
                                        <div class="memberboxdiv2">
                                            <li class="memberli2">馬克杯</li>
                                            <li class="memberli2">Tshirt</li>
                                        </div>
                                        <li class="memberli" data-title="運費">NT.60</li>
                                        <li class="memberli" data-title="總金額">NT.250</li>
                                        <div class="memberboxdiv2">
                                            <li class="memberli2">1</li>
                                            <li class="memberli2">1</li>
                                        </div>
                                        <li class="memberli" data-title="訂單狀態">處理中</li>
                                        <li class="memberli" data-title="取消訂單"><a href="#">取消</a></li>
                                    </ol>
                                </li>
                                <li class="membertbody">
                                    <ol class="memberol">
                                        <li class="memberli" data-title="訂單編號">10001</li>
                                        <li class="memberli" data-title="訂購日期">20191106</li>
                                        <div class="memberboxdiv2">
                                            <li class="memberli2">馬克杯</li>
                                            <li class="memberli2">Tshirt</li>
                                        </div>
                                        <li class="memberli" data-title="運費">NT.60</li>
                                        <li class="memberli" data-title="總金額">NT.250</li>
                                        <div class="memberboxdiv2">
                                            <li class="memberli2">1</li>
                                            <li class="memberli2">1</li>
                                        </div>
                                        <li class="memberli" data-title="訂單狀態">處理中</li>
                                        <li class="memberli" data-title="取消訂單"><a href="#">取消</a></li>
                                    </ol>
                                </li>
                            </ul>
                        </span>
<!---------- 第五頁-預約行程 -->
                        <!-- reserve -->
                        <span id="memberTab5">
                            <li id="memberReserve" class="memberthead">
                                <ol class="memberol">
                                    <li class="memberli">日期</li>
                                    <li class="memberli">行程</li>
                                    <li class="memberli">時間</li>
                                    <li class="memberli">人數</li>
                                    <li class="memberli">取消訂單</li>
                                </ol>
                            </li>
                            <li class="membertbody">
                                <ol class="memberol">
                                    <li class="memberli" data-title="預約日期">20191106</li>
                                    <li class="memberli" data-title="行程">尋幽訪古之旅</li>
                                    <li class="memberli" ata-title="時間">09:00-12:00</li>
                                    <li class="memberli" data-title="人數">2</li>
                                    <li class="memberli" data-title="取消訂單">取消</li>
                                </ol>
                            </li>
                            <li class="membertbody">
                                <ol class="memberol">
                                    <li class="memberli" data-title="預約日期">20191106</li>
                                    <li class="memberli" data-title="行程">尋幽訪古之旅</li>
                                    <li class="memberli" ata-title="時間">09:00-12:00</li>
                                    <li class="memberli" data-title="人數">2</li>
                                    <li class="memberli" data-title="取消訂單">取消</li>
                                </ol>
                            </li>
                            <li class="membertbody">
                                <ol class="memberol">
                                    <li class="memberli" data-title="預約日期">20191106</li>
                                    <li class="memberli" data-title="行程">尋幽訪古之旅</li>
                                    <li class="memberli" ata-title="時間">09:00-12:00</li>
                                    <li class="memberli" data-title="人數">2</li>
                                    <li class="memberli" data-title="取消訂單">取消</li>
                                </ol>
                            </li>
                            <li class="membertbody">
                                <ol class="memberol">
                                    <li class="memberli" data-title="預約日期">20191106</li>
                                    <li class="memberli" data-title="行程">尋幽訪古之旅</li>
                                    <li class="memberli" ata-title="時間">09:00-12:00</li>
                                    <li class="memberli" data-title="人數">2</li>
                                    <li class="memberli" data-title="取消訂單">取消</li>
                                </ol>
                            </li>
                            <li class="membertbody">
                                <ol class="memberol">
                                    <li class="memberli" data-title="預約日期">20191106</li>
                                    <li class="memberli" data-title="行程">尋幽訪古之旅</li>
                                    <li class="memberli" ata-title="時間">09:00-12:00</li>
                                    <li class="memberli" data-title="人數">2</li>
                                    <li class="memberli" data-title="取消訂單">取消</li>
                                </ol>
                            </li>
                        </span>
                    </ul>
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
    <script>

            function check()
            
            {
            
            with(document.all){
            
            if(input1.value!=input2.value)
            
            {
            
            alert("false")
            
            input1.value = "";
            
            input2.value = "";
            
            }
            
            else document.forms[0].submit();
            
            }
            
            }
            
            </script>
</body>

</html>