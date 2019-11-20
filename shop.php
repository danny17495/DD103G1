<?php 
$errMsg = "";
try {
    require_once("php/connectShop.php");
    $prods  = $pdo->query("select * from productdeco where product_status=1");
    $prodsRow=$prods->fetchAll(PDO::FETCH_ASSOC);
    $sql = "select * from productdeco";

    

?>
<?php
} catch (PDOException $e) {
    $errMsg = $errMsg . "錯誤訊息: " . $e->getMessage() . "</br>";
    $errMsg .= "錯誤行號: " . $e->getLine() . "<br>";
}
?>



<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>購物商城</title>
<meta name="description" content="">
<meta name="keywords" content="">
<link rel="stylesheet" type="text/css" href="css/shop.css">
<link rel="stylesheet" type="text/css" href="css/common.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
<link rel="stylesheet"  href="css/slick.css" />
<link rel="stylesheet"  href="css/slick-theme.css" />
<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="js/flycan.js"></script>
<script src="js/slick.js"></script>
<script src="js/oneSlide.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.10/vue.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js"></script>

</head>


<body class="shopBody">
<!-------------------頁首---------------------------------->
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
                        <a href="shopcart.html">
                            <img src="images/icon_shopcar.png" alt="icon_shopcar">
                        </a>
                        <a href="member_html/member.html">
                            <img src="images/icon_login.png" alt="icon_login">
                        </a>
                    </div>
            </div>
        </header>

<section class="shopBlock1">
    <div class="containerpa shopStep1">
<!-------商城標題--------------------->
    <h1>購物商城</h1>
<!-------產品種類選按鈕--------------------->
<div class="shopBird">
    <img src="images/shopImg/bird1.png" alt="" id="shopBird1">
    <img src="images/shopImg/bird2.png" alt="" id="shopBird2">
</div>

</div>
</section>


<!-- 商城開始 -->]



                    <!-- 投票前三名從資料庫撈 -->
                        <?php
                        if( $imgs->rowCount() == 0 ){
                            $imgName=['Top1','top2','top3'];
                            foreach ($imgName as $i => $value) {
                        ?>
                        <div class="item">
                            <div class="shopPic">
                                <img class="shop_animal_bg" src="img/member/user0_amlbg.png" alt="">
                            </div>
                            <p><?=$value?></p>
                        </div>

                        <?php
                            }
                        }else{ 
                            $imgRow=$imgs->fetchAll(PDO::FETCH_ASSOC);
                            $imgName=['Top1','top2','top3'];
                            foreach ($imgName as $i => $value) {
                        ?>
                        <div class="shopItem">
                            <div class="shopPic">
                                <img class="shop_animal_bg" src=<?=$imgRow[$i]['amlbg_img'] ?> alt="">
                            </div>
                            <p><?=$value?></p>
                        </div>
                        <?php
                            }
                        }
                        ?>

<div class="wrapper wrapperShopA">
    <section class="container containerShop">
        <!-- 768以下選擇圖案區:輪播套件 -->
        <div class="shopLeftSmallA">

            <div>
                <span>選擇圖案</span>
                <div class="shopDesignSmall">
                    <p>10月比賽優勝者</p>
                    <div class="shopOneSlider">
                        <div>
                            <div class="shopShows" id="SMALL">
                                <img src="images/shopImg/top1.jpg" id="SS1" onclick="shopSrcChange1()">
                            </div>
                            <span>第一名</span>
                        </div>
                        <div>
                            <div class="shopShows" id="SMALL">
                                <img src="images/shopImg/top2.jpg"  id="SS2" onclick="shopSrcChange2()">
                            </div>
                            <span>第二名</span>
                        </div>
                        <div>
                            <div class="shopShows" id="SMALL">
                                <img src="images/shopImg/top3.jpg"  id="SS3" onclick="shopSrcChange3()">
                            </div>
                            <span>第三名</span>
                        </div>
                    </div>

                </div>
            </div>


        </div>
<!--------------->




<!-- 768以上選擇圖案區 -->
<div class="shopLeftSide" id="shopLeftSide">
    <p>選擇圖案</p>
        <div class="shopDesign">
            <p>10月比賽優勝者</p>
                <ul>
                    <li>
                        <div class="shopPic shopPic1" id="SMALL">
                            <img src="images/shopImg/top1.jpg" id="SS1" onclick="shopSrcChange1()">
                        </div>
                        <span>第一名</span>
                    </li>
                    <li>
                        <div class="shopPic shopPic2" id="SMALL">
                            <img src="images/shopImg/top2.jpg" id="SS2" onclick="shopSrcChange2()">
                        </div>
                        <span>第二名</span>
                    </li>
                    <li>
                        <div class="shopPic shopPic3" id="SMALL">
                            <img src="images/shopImg/top3.jpg" id="SS3" onclick="shopSrcChange3()">
                        </div>
                        <span>第三名</span>
                    </li>
                </ul>

        </div>

</div><!-- .shopLeft結束div -->




<!--------------------------------右側商品欄----------------------------------------->
<div class="shopRightSide" id="shopRightSide">
    <div class="shopCupShow" id="shopCupShow">
        <div class="shopImg" id="shopCon">
                   <ul class="shopOn">
            <div id="app"> 

        <p>
            <keep-alive>
                <component :is="content"></component>
            </keep-alive>
        </p>        

                <span class="shopAllBtn">
                    <button @click="content='lessons'" id="white" onclick="shopCupColorChange1()" ></button>
                    <button @click="content='apply'" id="red" onclick="shopCupColorChange2()"></button>
                    <button @click="content='temp'"id="blue" onclick="shopCupColorChange3()"></button>
                </span>
            </div>
<script>
        Vue.component('apply',{  
            template: `

                    <div class="shopItemPrice1">
                    <img src="images/shopImg/shopNewCup1104-1.png" id="shopItemBottom" alt="">
                    <p>NT.550</p>
                    </div>   
          
            `,
        });
        Vue.component('lessons',{  
            template: `


                    <div class="shopItemPrice2">
                    <img src="images/shopImg/shopNewCup1104-2.png" id="shopItemBottom" alt="">
                           <p>NT.450</p>
                       </div>      
            `,
        });
        Vue.component('temp',{  
            template: `

                <div class="shopItemPrice3">
                    <img src="images/shopImg/shopNewCup1104-3.png" id="shopItemBottom" alt="">
                            <p>NT.650</p>
                </div> 
               
            `,
        });
        new Vue({
            el: '#app',
            data: {
                content: 'lessons',
            },
        });
</script>
                    
                    </ul>
<!-----------------------衣服區-------------------------------->
                    
                    <ul>
                        <div id="app1"> 
                            <p>
                                <keep-alive>
                                    <component :is="content"></component>
                                </keep-alive>
                            </p>      

                            <span class="shopAllBtn1">
                                <button @click="content='lessons1'" id="white" onclick="shopTColorChange1()"></button>
                                <button @click="content='apply1'" id="red" onclick="shopTColorChange2()"></button>
                                <button @click="content='temp1'"id="blue" onclick="shopTColorChange3()"></button>
                            </span>  
                        </div>


<script>
        Vue.component('apply1',{  
            template: `
                    <div class="shopItemPrice4">
                    <img src="images/shopImg/shopNewShirt1104-1.png" id="shopItemBottom" alt="">
                           <p>NT.550</p>
                       </div>        
          
            `,
        });
        Vue.component('lessons1',{  
            template: `


                    <div class="shopItemPrice5">
                    <img src="images/shopImg/shopNewShirt1104-2.png" id="shopItemBottom" alt="">
                           <p>NT.450</p>
                       </div> 
            
            `,
        });
        Vue.component('temp1',{  
            template: `

                 <div class="shopItemPrice6">
                    <img src="images/shopImg/shopNewShirt1104-3.png" id="shopItemBottom" alt="">
                            <p>NT.650</p>
                </div> 
               
            `,
        });
        new Vue({
            el: '#app1',
            data: {
                content: 'lessons1',
            },
        });
</script>

                    </ul>
    

<!--------------------------------產品圖案顯示----------------------------- -->
<div class="shopCustomerProduct">
    <img src="images/shopImg/top1.jpg" width="150" height="100" id="BIG">
</div>

    </div><!--end--->
</div><!--end--->
<!---------------------------------- 產品選擇按鈕----------------------------- -->
 <h4 id="shopTitle">
    <div class="shopSelectProduct">
        <div class="leafButton">
            <span class="shopOn" onclick="shopTypeChange1()">馬克杯</span>
        </div>
        <div class="leafButton">
            <span onclick="shopTypeChange2()">T-shirt</span>
        </div>
    </div>
</h4>
<!---------------------------------- 購物按鈕----------------------------- --> 
<span class="whiteButton shopMadeButton">加入購物車</span>

</div><!-- .shopRight結束div -->
<div class="clearfix"></div>
</section>

<!------------購物商城-第三區塊---------------->
        <section class="shopMountain">
            <div class="wrapper wrapperShop2"></div>
        </section><!------------第三區塊結束------------------>   

	</div>
</section><!------------全部區塊結束----------->  

<!---------------footer-------------------->
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

<!-----控制產品選擇按鈕的JS---------->

<script type="text/javascript">
window.onload=function () {
	var oTitle = document.getElementById('shopTitle');
	var aSpan = oTitle.getElementsByTagName('span');
	var oCon = document.getElementById('shopCon');
	var aUl = oCon.getElementsByTagName('ul');
	var i = 0;
	
	for(i=0; i<aSpan.length; i++) {
		var index = 0;
		aSpan[i].index = aUl[i].index = i;
		
		aSpan[i].onclick = function () {
			for(i=0; i<aSpan.length; i++) {
				aSpan[i].className = '';
				aUl[i].className = '';
			}
			
			this.className = 'shopOn';
			aUl[this.index].className = 'shopOn';
		};
	}
};
</script>

 <script src="js/animationShop.js"></script>

</body>
</html>