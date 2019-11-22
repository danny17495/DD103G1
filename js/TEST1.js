function showMessage() {
    function showAllproduct(jsonStr) {
        var newsdata = JSON.parse(jsonStr);
        // console.log(newsdata.length);
        let allprodHTML = "";
        let newsCard = document.querySelector('.newsBoxAll');
        // console.log(newsCard);
  
        //新聞卡片
        for (var i = 0; i < newsdata.length; i++) {
        
            allprodHTML += `
            <div class="newsitem">
            <div class="newsPic">
            
              <img src="images/${newsdata[i].image}" alt="">
            </div>
            <div class="newsText">
              <div class="newsTOP" id="app" onclick="showDiscuss()">
                <h2>${newsdata[i].newsTitle}</h2>
                <h3>剩餘時間: <span>${newsdata[i].newsDeadline}-${newsdata[i].newsMsgDate}</span> </h3>
              </div>
              <p onclick="showDiscuss()">${newsdata[i].newsContent}</p>
              <div class="newsBtnAll">
                <div class="newsBtn">
                  <button><i class="fa fa-thumbs-o-up" aria-hidden="true"></i><SPan>${newsdata[i].newsUP}</SPan></button>
                  <button><i class="fa fa-thumbs-o-down" aria-hidden="true"></i><SPan>${newsdata[i].newsDown}</SPan></button>
                  <button id="msgBTN"><i class="fa fa-comments" aria-hidden="true"></i><SPan>${newsdata[i].pointRaise}</SPan></button>
                </div>
                <button class="report">檢舉</button>
              </div>
            </div>   
          </div>
        `;
        };
        newsCard.innerHTML = allprodHTML;
    } //產生新聞End
    var xhr = new XMLHttpRequest();
    xhr.onload = function () {
        if (xhr.status == 200) {
            showAllproduct(xhr.responseText);
        } else {
            alert(xhr.status);
        }
    }
  
    xhr.open("get", "ShowNews.php", true);
    xhr.send(null);
  }
  showNews();



  //*** */
  function showNewsMSG() {
    function showAllmsg(jsonStr) {
        var newsMSG = JSON.parse(jsonStr);
      
        let newsMsgHTML = "";
        let msgCard = document.querySelector('.messageWrap');
        // console.log(newsCard);
  
        //新聞留言
        for (var i = 0; i < newsMSG.length; i++) {
        
         newsMsgHTML += `
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
        `;
        };
        msgCard.innerHTML = newsMsgHTML;
    } //留言End
  }
  showNewsMSG();