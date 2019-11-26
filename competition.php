<?php
$errMsg = "";
try{
    require_once("php/connect.php");
    session_start();

    $sql_msg_member = 
    "select message.msgContent,message.msgDate,member.memName
    from `message`,`member`
    where message.memNo=member.memNo 
    order by message.msgDate desc";
    $msgMember = $pdo->prepare($sql_msg_member);
    $msgMember ->execute();

    $sql_msg_member2 = 
    "select message.msgContent,message.msgDate,member.memName
    from `message`,`member`
    where message.memNo=member.memNo and message.competNo=1 order by message.msgDate desc limit 2 ";
    $msgMember2 = $pdo->prepare($sql_msg_member2);
    $msgMember2 ->execute();

    $sql_msg_member3 = 
    "select message.msgContent,message.msgDate,member.memName
    from `message`,`member`
    where message.memNo=member.memNo and message.competNo=2 order by message.msgDate desc limit 2 ";
    $msgMember3 = $pdo->prepare($sql_msg_member3);
    $msgMember3 ->execute();

    $sql_msg_member4 = 
    "select message.msgContent,message.msgDate,member.memName
    from `message`,`member`
    where message.memNo=member.memNo and message.competNo=3 order by message.msgDate desc limit 2";
    $msgMember4 = $pdo->prepare($sql_msg_member4);
    $msgMember4 ->execute();

    $sql_member_vote = 
    "select member.memName,competition.vote,competition.memNo,postcard.postcardPic
    from `member`, `competition`, `postcard`
    where member.memNo=competition.memNo and member.memNo=postcard.memNo and YEAR(startDate) = 2019 
    order by competition.vote desc";

    $memberVote = $pdo->prepare($sql_member_vote);
    $memberVote ->execute();


} catch (PDOException $e) {
    $errMsg = $errMsg . "錯誤訊息: " . $e->getMessage() . "<br>";
    $errMsg .= "錯誤行號: " . $e->getLine() . "<br>";
}
?>

 <!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/competition.css">
    <link rel="stylesheet" href="css/common.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
    <script src="js/vue-2.6.10.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.10/vue.min.js"></script> -->
    <title>Competition</title>
</head>
<body>

<?php
    if( $errMsg != ""){
        echo "<center>$errMsg</center>";
        exit();
    }
?>

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
									<a href="competition.php" class="nowpage">投票比賽</a>
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
    

    <!-- canvas 星空畫布 -->

    <div class="can">
        <canvas id="can"></canvas> 
    </div>

    <!-- 流星特效 -->

    <div class="starShoot">
        <span class="star"></span>
        <span class="star blue"></span>
    </div>

    <!-- 留言板 -->

    <section class="message" id="message">
        <div class="messageContainer">

               <!-- 留言板開頭 -->

            <div class="messageTitle">
                <h3>留言板</h3> 
                <img src="images/competition/X.png" alt="close" class="closeBtn">
            </div>
            
            <!-- 留言區 -->

            <div id="messageContent" class="messageContent">

                <!-- PHP 抓取資料 -->


            <!-- 留言輸入區塊 -->
            </div>
            <form class="messageWrapInput">
                <input type="hidden" id="msgBtnNo">
                <input type="text" id="inputText" name="msg" placeholder="最多輸入10字數" maxlength="10">
                <div class="messageInputBtn">
                    <input type="button" id="msgBtn" value="留言" class="btnCloudb">
                </div>
            </form> 
        </div>
    </section>


    <section class="competitionMessageBoard">

        <!-- 投票頁開頭 -->

        <div id="containerpa floatBoard">
            <div class="skylightBanner">
                    <h1>投票比賽</h1>
                    <h2>2019年11月</h2>
            </div>

            <!-- 天燈 -->
            <img src="images/competition/skyLight1.png" id="skylight1" alt="">
            <img src="images/competition/skyLight3.png" id="skylight3" alt="">
            <img src="images/competition/skyLight2.png" id="skylight2" alt="">

            <?php
                for($i=0;$i<1;$i++){
              $memberVoteRow = $memberVote -> fetch(PDO::FETCH_ASSOC)
            ?> 

            <!-- 第一名明信片 -->
            <div class="messageNo1">
                <div class="messageBoard">
                    <div class="competitionVoteTitle">
                        <input type="hidden"  name="competNo">
                        <span>第一名
                            <span id="memName">
                                <?=$memberVoteRow["memName"]?>
                            </span>
                        </span>
                        <span>得票數:<span class="vote1"><?=$memberVoteRow["vote"]?>票</span></span>
                    </div>
                    <div class="competitionPost">
                        <img src="images/postcardClient/<?=$memberVoteRow["postcardPic"]?>" alt="">
                    </div>
            <?php
            }
            ?>
            <?php
                while($msgMemberRow2 = $msgMember2 -> fetch(PDO::FETCH_ASSOC)){
                    
            ?>
                    <div class="competitionText">
                        <div class="textContent" id="msg1"><?=$msgMemberRow2["msgContent"]?></div>
                    </div>
            <?php
                }
            ?>
                    <div class="competitionButton indexVoBtn">
                        <div href="#" class="indexVoBtn voteBtn" data-vote="1">
                        <i class="fa fa-hand-o-down fa-2x voteIcon" aria-hidden="true"></i>
                        <p>投票</p>
                            <input type="hidden" name="competNo2" value="">
                        </div>
                        <div href="#"  class="indexVoBtn messageBtn">
                        <i class="fa fa-commenting-o messIcon fa-2x" aria-hidden="true"></i>
                        <p>留言</p>
                            <input type="hidden" name="competNo3" value="1">
                        </span>
                    </div>
                </div>
            </div>


            <?php
                for($i=0;$i<1;$i++){  
                $memberVoteRow = $memberVote -> fetch(PDO::FETCH_ASSOC)
            ?> 

            <div class="clearfix"></div>
            </div>
            <!-- 第二、三名天燈 -->
            <div class="messageNo2 row">
                <div class="messageBoard">
                    <div class="competitionVoteTitle">
                        <input type="hidden"  name="competNo">
                        <span>第二名
                            <span id="memName">
                                <?=$memberVoteRow["memName"]?>
                            </span>
                        </span>
                        <span>得票數:<span class="vote2"><?=$memberVoteRow["vote"]?>票</span></span>
                    </div>
                    <div class="competitionPost competitionPost2">
                    <img src="images/postcardClient/<?=$memberVoteRow["postcardPic"]?>" alt="">
                    </div>
                    <?php
                        }
                    ?>
                   <?php
                        while($msgMemberRow3 = $msgMember3 -> fetch(PDO::FETCH_ASSOC)){
                            
                    ?>


                    <div class="competitionText" id="cText">
                        <div class="textContent" id="msg2"><?=$msgMemberRow3["msgContent"]?></div>
                    </div>

                    <?php
                        }
                    ?>
                    <div class="competitionButton indexVoBtn">
                        <div href="#" class="indexVoBtn voteBtn" data-vote="2">
                        <i class="fa fa-hand-o-down fa-2x voteIcon" aria-hidden="true"></i>
                            <p>投票</p>
                            <input type="hidden" name="competNo2" value="">
                        </div>
                        <div href="#"  class="indexVoBtn messageBtn">
                        <i class="fa fa-commenting-o messIcon fa-2x" aria-hidden="true"></i>
                            <p>留言</p>
                            <input type="hidden" name="competNo3" value="2">
                        </div>
                    </div>
                </div>
                <?php
                for($i=0;$i<1;$i++){  
                    $memberVoteRow = $memberVote -> fetch(PDO::FETCH_ASSOC)
                ?> 

                <div class="messageBoard" id="under">
                    <div class="competitionVoteTitle">
                        <input type="hidden"  name="competNo">
                        <span>第三名
                            <span id="memName">
                                <?=$memberVoteRow["memName"]?>
                            </span>
                        </span>
                        <span>得票數:<span class="vote3"><?=$memberVoteRow["vote"]?>票</span></span>

                    </div>
                    <div class="competitionPost competitionPost3">
                    <img src="images/postcardClient/<?=$memberVoteRow["postcardPic"]?>" alt="">
                    </div>
                    <?php
                        }
                    ?>

                    <?php
                        while($msgMemberRow4 = $msgMember4 -> fetch(PDO::FETCH_ASSOC)){
                            
                    ?>


                    <div class="competitionText">
                        <div class="textContent" id="msg3"><?=$msgMemberRow4["msgContent"]?></div>
                    </div>

                    <?php
                        }
                    ?>

                    <div class="competitionButton indexVoBtn">
                        <div href="#" class="indexVoBtn voteBtn" data-vote="3">
                        <i class="fa fa-hand-o-down fa-2x voteIcon" aria-hidden="true"></i>
                            <p>投票</p>
                            <input type="hidden" name="competNo2" value="">
                        </div>
                        <div href="#"  class="indexVoBtn messageBtn">
                        <i class="fa fa-commenting-o messIcon fa-2x" aria-hidden="true"></i>
                            <p>留言</p>
                            <input type="hidden" name="competNo3" value="3">
                    </div>
                    </div>
                </div>
            </div>
       

        <div class="clearfix"></div>
    </section>

    <!-- 其他作品 -->

    <section class="competitionOther">

        <!-- 流星動畫 -->
        <div class="starShoot">
            <span class="star"></span>
            <span class="star blue"></span>
        </div>

        <div class="containerpa otherBord">
            <div class="row">
                <div class="skylightBanner ">
                    <img src="images/competition/skylight4.png" id="skylight4" alt="">
                    <h2>其他作品</h2>
                </div>

                <div class="messageOtherBoard">
                <?php
                    
                        for($i=4;$i<=$memberVote->rowCount();$i++){
                            $memberVoteRow = $memberVote -> fetch(PDO::FETCH_ASSOC)
                            

                ?>
                <div class="smallMessage">
                    <img src="images/postcardClient/<?=$memberVoteRow["postcardPic"]?>" alt="">
                    <div class="smallMessageButton">                       
                        <div class="competitionVoteTitle1">
                            <input type="hidden"  name="competNo">
                            <span><span id="memName"><?=$memberVoteRow["memName"]?></span></span>
                            <span><span class="vote<?php echo $i?>"><?=$memberVoteRow["vote"]?>票</span></span>
                        </div>

                        <div class="competitionButton indexVoBtn">
                            <div href="#" class="indexVoBtn voteBtn" data-vote="<?php echo $i?>">
                                <i class="fa fa-hand-o-down fa-2x voteIcon" aria-hidden="true"></i>
                                <p>投票</p>
                                <input type="hidden" name="competNo2" value="">
                            </div>
                            <div href="#"  class="indexVoBtn messageBtn">
                                <i class="fa fa-commenting-o messIcon fa-2x" aria-hidden="true"></i>
                                <p>留言</p>
                                <input type="hidden" name="competNo3" value="<?php echo $i?>">
                            </div>
                        </div>
                    </div>
                </div>
                    
                    <?php
                    }
                    ?>
                                  
                    
    </section>

    


    <!-- 比賽說明 -->

    <section class="competitionDescription">
        <div class="containerpa">
            <div class="skylightBanner">
                <img src="images/competition/skylight4.png" id="skylight5" alt="">
                <h2>比賽說明</h2>
            </div>
            <div class="bigChoseButton">
                <div class="competitionDescriptionSpan">
                    <p>
                        參賽條件:<br>

                        1.必須加入會員 <br>
                        
                        2.每日更新票數/每月更新名次<br>
                        
                        3.會員可同時製作多張明信片，但是只有當月製作的第一張可以參加比賽。
                    </p>
                        
                </div>
                <div class="competitionGo">
                    <div class="Bus">
                        <a href="reserve.html#submit"><img src="images/spotintro/busStop.png" alt=""></a>
                    </div>
                    
                    <div class="whiteButton" id="join">
                        <a href="#"><p>參加比賽</p></a>
                    </div>
                    <div class="whiteButton">
                        <a href="postcard.html"><p>客製明信片</p></a>
                    </div>
                    <div class="whiteButton">
                        <a href="shop.html"><p>購物商城</p></a>
                    </div>
                </div>                
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
            <div class="alertContent">我是內容</div>
            <div class="closeWrap">
                <div class="yesButton whiteButton">確定</div>
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

    <script src="js/login.js"></script>
    <script src="js/alert.js"></script>
    <script src="js/register.js"></script>
    <script src="js/forgetPsw.js"></script>
    <script src="js/reserveDate.js"></script>
    <script src="js/animation.js"></script>
    <script>

    let join= document.getElementById('join'); 
        join.addEventListener('click',function(){ 
             if (!sessionStorage['memNo']) { 
                     memberInfoClick = false;
                   //  e.preventDefault();
                     openLoginData();
            }
        });
</script>

</body>
</html>