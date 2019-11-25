console.log('start');

function $id(e){
return document.getElementById(e);
}
//--------------------------------------------




//PHP 導入-------------------------------------

//瀏覽器判斷

function competition(){
    if(window.ActiveXObject){
        xmlHttp= new ActiveXObject('Microsoft.XMLHTTP');
    }else if(window.XMLHttpRequest) {
        xmlHttp= new XMLHttpRequest();
    }
    return xmlHttp;
}
//JOIN

function  join_xml(){
    join_item=competition();
    join_item.open("GET","php/competition/join.php?memNo="+sessionStorage.memNo,true);
    join_item.onreadystatechange = join_php;
    join_item.send(null);  
}
function join_php(){
    console.log(1);
    if(join_item.readyState==4  && join_item.status==200){
        var join_arr= JSON.parse(join_item.responseText);
        console.log(join_arr);
        if (join_arr=="error") {
            alert("參加過了喔");
        }else{
             alertWrap("參加成功");
        }}};


        function vote(voteNo){

            // console.log(voteNo);
            let e = voteNo;
            
            $.ajax({
                "type": "GET",
                "dataType": "text",
                "url": "php/competition/vote.php",
                "data":	{
                    "competNo": e
                },		
                "cache": false,
                "success": function (data) {	
                    // 同步更新票數
                    $(".vote"+voteNo).text(data+"票");
                    // (message_arr); 
                },
                "error":function(data){
                    // console.log(data);
                }
            
            });
        }        





//檢舉


function report(){
     if (!sessionStorage['memNo']) {
         $id('login').style.display = 'block';
         return ;
        //  alert(1);
    } 
    let m= $('.messageBtn').find("input").val();
    // let m= document.getElementsByClassName("btnCloudb").value
       console.log(m);
    let u =sessionStorage['memNo'];
    //    let r = prompt("為什麼你檢舉他了呢", "");
        // alertWrap("為什麼")
        alertWrap(`<p style="color:#ddd">檢舉原因?</p><input type="text" id="report_msg" value="" style="width:80%;"><br><br><a " class="yesButton whiteButton report_true">確認</a>`);
    let r;
        document.getElementsByClassName('report_true')[0].addEventListener('click',send_report);
        

        function send_report(){
            r= document.getElementById("report_msg").value;
            console.log(r);
            // 假如r不等於空字串再送出資料庫 else alert 請再次輸入
            if (r != "") {
                $("#hmsg").hide();
                report_xml(u,m,r);
                alertWrap(`確實收到你的檢舉了`);
               

            }
        }
    
};

function  report_xml(u,m,r){
    report_item=competition();
    report_item.open("GET","php/competition/report.php?memNo="+u+"&msgNo="+m+"&report_reason="+r,true);
    report_item.onreadystatechange = report_php;
    report_item.send(null);
}
function report_php(){
    if(report_item.readyState==4  && report_item.status==200){
        let report_arr= JSON.parse(report_item.responseText);
      console.log(report_arr);
       
}}

//投票
$(".voteBtn").click(function(){
    let voteNo = $(this).data('vote');
    // alert(voteNo);
    vote(voteNo);
});

function vote(voteNo){

    // console.log(voteNo);
    let e = voteNo;
    
    $.ajax({
        "type": "GET",
        "dataType": "text",
        "url": "php/competition/vote.php",
        "data":	{
            "competNo": e
        },		
        "cache": false,
        "success": function (data) {	
            // 同步更新票數
            $(".vote"+voteNo).text(data+"票");
            // (message_arr); 
        },
        "error":function(data){
            // console.log(data);
        }
    
    });
}




//留言
function message_xml(e){
    console.log(e);
    $.ajax({
        "type": "GET",
        "dataType": "json",
        "url": "php/competition/message.php",
        "data":	{
            "competNo": e
        },		
        "cache": false,
        "success": function (message_arr) {	
            message_btn(message_arr);


        },
        "error":function(data){
            console.log(data);
        }
    });
}

function msg_xml(e){
    let i = window.sessionStorage.memNo;
    console.log(e);
    console.log($('#inputText').val());
    $.ajax({
        "type": "GET",
        "dataType": "json",
        "url": "php/competition/msg.php",
        "data":	{
            "competNo": e,
            "memNo":i,
            "msg": $('#inputText').val()
        },	
        "cache": false,
        "success": function (data) {	
            message_btn(e);
        },
        "error":function(data){
            console.log(data);
        }
    });
}


//按鈕類-----------------
//參加比賽
$("#join").click(function() {
    join();
 });

//留言    
    $('.messageBtn').click(function(){
    let e =$(this).find("input")[0].value;
    console.log(e); 
    $('.messageWrapInput input:eq(0)').val(e).attr({name:'competNo',id:'msgBtnNo'});
    message_xml(e)
    
     
});
//關留言板
$('.closeBtn').click(function(){
    $('.message').hide();
    $('.message_itme').remove();
    $(`#inputText`)[0].value="";
});    

//留言按鈕
$('#msgBtn').click(function(){
    msg_value(); 
 })







//按鈕函示-------------------

function join(){
    // 先判斷sessionStorage有沒有會員登入資料，有才往下做轉圖檔工作
    if (sessionStorage['memName']){
                join_xml();
        }else{
   //尚未登入
               $id('login').style.display = 'block';
    }
};


 
function message_btn(e){
    message_arr=e;
    $('.messageBtn').addClass(function(){
        $('.message').slideDown(50);
    })
    console.log(message_arr);
    console.log(message_arr.length);
    
$("#messageContent").empty();
let add = '';
for (let i = 0; i < message_arr.length; i++) {

add += '<div class="message_itme messageWrap" id="message_itme'+i+'">';
add += '<div id="memText" class="memText">';
add += '<div class="megsageMemName">';
add += '<p id="messageMemName">'+message_arr[i]['memName']+'</p>';
add += '<p class="messageDate" id="messageDate">'+message_arr[i]['msgDate']+'</p>';
add += '</div><div class="messageBox">';
add += '<p class="messageText" id="messageText">'+message_arr[i]['msgContent']+'</p>';
add += `</div><div class="messageBtn"><span class="btnCloudb" value=${i} onclick="report()">檢舉</span></div>`;
add += `<input type="hidden" value="${i}" id="reportBtn"></input> `;
add += '</div></div>';
}
$("#messageContent").append(add);


}




function msg_value() {
    if (!sessionStorage['memNo']) {
   
     $id('login').style.display = 'block';
     return ;
} 
if ($(`#inputText`).val()==0)
{  
    alert("請輸入文字");

    return ;
}

let e =$(`#msgBtnNo`).val();
    msg_xml(e);
    console.log(e);
    setTimeout(() => {
        msg_revalue()
    }, 100);
}

function msg_revalue(){
 let e =$(`#msgBtnNo`).val();
//  let e =1;
message_xml(e);
} 



//天燈漂浮(TWEENMAX))
var T1 = new TimelineMax({
    repeat: -1,
});
var T2 = new TimelineMax({
    repeat: -1,
});
var T3 = new TimelineMax({
    repeat: -1,
});
var T4 = new TimelineMax({
    repeat: -1,
});
var T5 = new TimelineMax({
    repeat: -1,
});
var T6 = new TimelineMax({
    repeat: -1,
});
var T7 = new TimelineMax({
    repeat: -1,
});


T1.to('#skylight1', .1,{
    y:0,
    x:0,
}).to('#skylight1', 5,{
    y:-400,
    x:100,
    opacity:0,
})

T2.to('#skylight2', 8,{
    y:-500,
    x:-20,
    opacity:0,
})

T3.to('#skylight3', .1,{
    y:0,
    x:0,
}).to('#skylight3', 6,{
    y:-500,
    x:100,
    opacity:0,
})

T4.to('#skylight4', 3,{
    y:-50,
}).to('#skylight4', 3,{
    y:0,
});

T5.to('#fly1', 3,{
    y:15,
}).to('#fly1', 3,{
    y:0,
})

T6.to('#fly2', 3,{
    y:15,
}).to('#fly2', 3,{
    y:0,
})

T7.to('#skylight5', 3,{
    y:-50,
}).to('#skylight5', 3,{
    y:0,
})


//星星閃爍+移動(HTML5{CANVAS})

var canvas = document.getElementById("can");
var ctx = canvas.getContext("2d");
// var x = canvas.width = window.innerWidth;
// var y = canvas.height = window.innerHeight;
// 這樣寫如果進來的時候是小畫面，拉大時畫布會爆掉，所以一開始就給他最大畫面這樣縮放就不會壞掉。*要注意如果畫面寬大於1920還是會壞掉
var x = canvas.width = 2560;
var y = canvas.height = 1875;
// ////alert(canvas.height);

var img = new Image();
img.src = "./images/competition/star.png";
var num = 500;
var arrStar = [];


function Star(){
    this.x;
    this.y;
    this.start;
    this.xsp;
    this.ysp;
}

Star.prototype.init = function(){
    this.x = Math.floor(Math.random()*x);
    this.y = Math.floor(Math.random()*y);
    this.start = Math.floor(Math.random()*6);
    this.xsp = Math.random()*0.5-0.25;
    this.ysp = Math.random()*0.5-0.25;


}

Star.prototype.draw = function(){
    this.start++;
    if(this.start > 6){
        this.start = 0;
    }
    this.x += this.xsp;
    this.y += this.ysp;
    if(this.x > x||this.y > y||this.x < 0||this.y < 0){
        this.init();
    }

   ctx.drawImage(img,this.start*7,0,7,7,this.x,this.y,7,7);
}


window.onload = function(){
    ctx.drawImage(document.getElementById("can"), this.x, this.y);
    init();
    setInterval(loop,100);
}
function init(){
    for(var i=0; i<num; i++){
        arrStar[i] = new Star();
        arrStar[i].init();}    

}

function draw(){
    for(var j=0; j<num; j++){
        arrStar[j].draw();
    }
}

function drawRect(){
    ctx.fillStyle = "rgba(55, 88, 162,.5)"
    ctx.fillRect(0,0,x,y);
    
}

function loop(){
    drawRect();
    draw();
}

// resize 
$(window).resize(resizeCanvas);

function resizeCanvas() {

    $("#can").attr("width", $(window).get(0).innerWidth);

    $("#can").attr("height", $(window).get(0).innerHeight);

    ctx.fillRect(0, 0, can.width, can.height)
};

resizeCanvas();