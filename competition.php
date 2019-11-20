<?php
$errMsg = "";
try{
    require_once("php/connect.php");
    session_start();

    $sql_msg_member = 
    "select message.msgContent,message.msgDate,member.memId
    from `message`,`member`
    where message.memNo=member.memNo 
    order by message.msgDate desc";
    $msgMember = $pdo->prepare($sql_msg_member);
    $msgMember ->execute();

    $sql_msg_member2 = 
    "select message.msgContent,message.msgDate,member.memId
    from `message`,`member`
    where message.memNo=member.memNo order by message.msgDate desc limit 2 ";
    $msgMember2 = $pdo->prepare($sql_msg_member2);
    $msgMember2 ->execute();

    $sql_msg_member3 = 
    "select message.msgContent,message.msgDate,member.memId
    from `message`,`member`
    where message.memNo=member.memNo limit 2";
    $msgMember3 = $pdo->prepare($sql_msg_member3);
    $msgMember3 ->execute();

    $sql_msg_member4 = 
    "select message.msgContent,message.msgDate,member.memId
    from `message`,`member`
    where message.memNo=member.memNo limit 2";
    $msgMember4 = $pdo->prepare($sql_msg_member4);
    $msgMember4 ->execute();

    $sql_member_vote = 
    "select member.memId,member.postcardPic,competition.vote,competition.memId,postcard.postcardPic
    from `member`, `competition`, `postcard`
    where member.memId=competition.memId and member.postcardPic=postcard.postcardPic and YEAR(startDate) = 2019 
    order by competition.vote desc";

    // $sql_member_vote = 
    // "select member.memId,member.postcardPic,competition.vote,competition.memId,postcard.postcardPic,message.msgContent
    // from `member`, `competition`, `postcard` ,`message`
    // where member.memId=competition.memId and member.postcardPic=postcard.postcardPic and YEAR(startDate) = 2019 
    // order by competition.vote desc";

    $memberVote = $pdo->prepare($sql_member_vote);
    $memberVote ->execute();

    $item = "select count(*) from competition";
$result = $pdo->query($item);
$result ->bindColumn(1,$totalRecord);
$result->fetch();

$recPerPage = 6;

$totalPage = ceil($totalRecord/$recPerPage);

if(isset($_GET["startDate"])==false)
$startDate=1;
else
$startDate=$_GET["startDate"];

$start = ($startDate-1) * $recPerPage;
$items = "select * from competition order by startDate limit $start,$recPerPage";
$competition = $pdo->query($items);





} catch (PDOException $e) {
    $errMsg = $errMsg . "錯誤訊息: " . $e->getMessage() . "<br>";
    $errMsg .= "錯誤行號: " . $e->getLine() . "<br>";
}
?>

 <!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/competition.css">
    <link rel="stylesheet" href="css/common.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
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
                    <a href="login tabs/login.html">
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

                <?php
                    while($msgMemberRow = $msgMember -> fetch(PDO::FETCH_ASSOC)){
                ?>

                <div class="messageWrap" id="messageWrap">

                    <!-- 會員圖片 -->

                     <figure class="mem_pic" id="bg_pic">
                    </figure>

                    <!-- 會員留言資料 -->

                    <div id="memText" class="memText">
                        <div class="megsageMemName">
                            <p id="messageMemId">
                                <?=$msgMemberRow["memId"]?>
                            </p>
                            <p class="messageDate" id="messageDate">
                                <?=$msgMemberRow["msgDate"]?>
                            </p> 
                        </div>
                        <div class="messageBox">
                            <p class="messageText" id="messageText">
                                <?=$msgMemberRow["msgContent"]?>
                            </p>  
                        </div> 

                    <!-- 會員檢舉 -->

                        <div class="messageBtn">
                            <span class="btnCloudb">檢舉</span>
                        </div>
                    </div>
                </div>

                <?php
                    }
                ?>  

            </div>

            <!-- 留言輸入區塊 -->

            <form class="messageWrapInput" method="POST" action="memComprtitionMessage.php">
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
                    <h2>十月份比賽</h2>
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
                            <span id="memId">
                                <?=$memberVoteRow["memId"]?>
                            </span>
                        </span>
                        <span>得票數:<span><?=$memberVoteRow["vote"]?>票</span></span>
                    </div>
                    <div class="competitionPost">
                        <img src="images/postcard/<?=$memberVoteRow["postcardPic"]?>.jpg" alt="">
                    </div>
            <?php
            }
            ?>
            <?php
                while($msgMemberRow2 = $msgMember2 -> fetch(PDO::FETCH_ASSOC)){
                    
            ?>
                    <div class="competitionText">
                        <div class="textContent"><?=$msgMemberRow2["msgContent"]?></div>
                    </div>
            <?php
                }
            ?>
                    <div class="competitionButton">
                        <span href="#"  class="whiteButton voteBtn">
                            <img src="images/indexSpot/voteIcon.png" alt="">
                            投票
                            <input type="hidden" name="competNo2" value="25">
                        </span>
                        <span href="#"  class="whiteButton messageBtn">
                            <img src="images/indexSpot/messIcon.png" alt="">
                            留言
                            <input type="hidden" name="competNo3" value="25">
                        </span>
                    </div>
                </div>
            </div>


            <?php
                for($i=0;$i<1;$i++){  
                $memberVoteRow = $memberVote -> fetch(PDO::FETCH_ASSOC)
            ?> 

            <div class="clearfix"></div>

            <!-- 第二、三名天燈 -->
            <div class="messageNo2 row">
                <div class="messageBoard">
                    <div class="competitionVoteTitle">
                        <input type="hidden"  name="competNo">
                        <span>第二名
                            <span id="memId">
                                <?=$memberVoteRow["memId"]?>
                            </span>
                        </span>
                        <span>得票數:<span><?=$memberVoteRow["vote"]?>票</span></span>
                    </div>
                    <div class="competitionPost">
                        <img src="images/postcard/<?=$memberVoteRow["postcardPic"]?>.jpg" alt="">
                    </div>
                    <?php
                        }
                    ?>
                   <?php
                        while($msgMemberRow3 = $msgMember3 -> fetch(PDO::FETCH_ASSOC)){
                            
                    ?>


                    <div class="competitionText">
                        <div class="textContent"><?=$msgMemberRow3["msgContent"]?></div>
                    </div>

                    <?php
                        }
                    ?>
                    <div class="competitionButton">
                        <span href="#"  class="whiteButton voteBtn">
                            <img src="images/indexSpot/voteIcon.png" alt="">
                            投票
                            <input type="hidden" name="competNo2" value="25">
                        </span>
                        <span href="#"  class="whiteButton messageBtn">
                            <img src="images/indexSpot/messIcon.png" alt="">
                            留言
                            <input type="hidden" name="competNo3" value="25">
                        </span>
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
                            <span id="memId">
                                <?=$memberVoteRow["memId"]?>
                            </span>
                        </span>
                        <span>得票數:<span><?=$memberVoteRow["vote"]?>票</span></span>

                    </div>
                    <div class="competitionPost">
                        <img src="images/postcard/<?=$memberVoteRow["postcardPic"]?>.jpg" alt="">
                    </div>
                    <?php
                        }
                    ?>

                    <?php
                        while($msgMemberRow4 = $msgMember4 -> fetch(PDO::FETCH_ASSOC)){
                            
                    ?>


                    <div class="competitionText">
                        <div class="textContent"><?=$msgMemberRow4["msgContent"]?></div>
                    </div>

                    <?php
                        }
                    ?>

                    <div class="competitionButton">
                        <span href="#"  class="whiteButton voteBtn">
                            <img src="images/indexSpot/voteIcon.png" alt="">
                            投票
                            <input type="hidden" name="competNo2" value="25">
                        </span>
                        <span href="#"  class="whiteButton messageBtn">
                            <img src="images/indexSpot/messIcon.png" alt="">
                            留言
                            <input type="hidden" name="competNo3" value="25">
                        </span>
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

        <div class="containerpa">
            <div class="row">
                <div class="skylightBanner ">
                    <img src="images/competition/skylight4.png" id="skylight4" alt="">
                    <h2>其他作品</h2>
                </div>

                <!-- 篩選按鈕 -->
                
                <div class="chooseButton">
                    <div class="whiteButton">
                        <span href="#">熱門作品</span>
                    </div>
                    <div class="whiteButton">
                        <span href="#">最新作品</span>
                    </div>
                    <div class="whiteButton">                    
                        <span href="#">最夯作品</span>
                    </div>
                </div>



                <div class="messageOtherBoard" id="fly1">
                <?php
                    while( $memberVoteRow = $memberVote -> fetch(PDO::FETCH_ASSOC)){

                    ?>
                    <div class="smallMessage">
                    <img src="images/postcard/<?=$memberVoteRow["postcardPic"]?>.jpg" alt="">
                        <div class="smallMessageButton">                       
                            <div class="competitionVoteTitle">
                                <input type="hidden"  name="competNo">
                                <span><span id="memId"><?=$memberVoteRow["memId"]?></span></span>
                                <span><span id="vote0"><?=$memberVoteRow["vote"]?>票</span></span>
                            </div>

                            <div class="competitionButton">
                                <span href="#"  class="whiteButton voteBtn">
                                    <img src="images/indexSpot/voteIcon.png" alt="">
                                    投票
                                    <input type="hidden" name="competNo2" value="25">
                                </span>
                                <span href="#"  class="whiteButton messageBtn">
                                    <img src="images/indexSpot/messIcon.png" alt="">
                                    留言
                                    <input type="hidden" name="competNo3" value="25">
                                </span>
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
                        
                        3.前三名會在商城販售持續一個月
                    </p>
                        
                </div>
                <div class="competitionGo">
                    <div class="Bus">
                        <img src="images/busStop.png" alt="">
                    </div>
                    
                    <div class="whiteButton">
                        <span>我要加入會員</span>
                    </div>
                    <div class="whiteButton">
                        <span>我要客製明信片</span>
                    </div>
                    <div class="whiteButton">
                        <span>我要去購物商城</span>
                    </div>
                </div>                
            </div>
        </div> 
    </section>
    <div style="display:compact;text-align:center;margin:auto;">
       <?php
       echo "<a href='?startDate=1' onclick='return false'>第一頁</a>&nbsp";
       for($i=1;$i<= $totalPage;$i++){
           if($i==$startDate)
            echo "<a href='?startDate=$i' style='color:deepPink' onclick='return false'>",$i,"</a>&nbsp&nbsp";
           else
            echo "<a href='?startDate=$i'onclick='return false'>",$i,"</a>&nbsp&nbsp";
       }
       echo "<a href='?startDate=$totalPage' onclick='return false' javascript:'void(0)'>最後一頁</a>&nbsp";
       ?>
    </div>


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

    <script src="js/animation.js"></script>

</body>
</html>