console.log('start');
//alert(0);

// $(".messageNo1 .messageBoard img").attr("src","images/postcard/postDemo_1.jpg")



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



//留言
function message_xml(e){
    //alert(1);
    console.log(e);
    message_item=competition();
    message_item.open("GET","php/competition/message.php?competNo="+e,true);
    message_item.onreadystatechange = message_php;
    message_item.send(null);
}

function message_php(){
    //alert(2);
    if(message_item.readyState==4  && message_item.status==200){
        let message_arr= JSON.parse(message_item.responseText);
        message_btn(message_arr); 
}}

//按鈕類-----------------
// function activity_button(){
    
    $('.messageBtn').click(function(){
        //alert(3);
    let e =$(this).find("input")[0].value;
    console.log($(this).find("input")[0]); 
    $('.messageWrapInput input:eq(0)').val(e).attr({name:'competNo',id:'msgBtnNo'})
    console.log(e); 
    message_xml(e)
     
});
//關留言板
$('.closeBtn').click(function(){
    //alert(4);
    $('.message').hide();
    $('.message_itme').remove();
    $(`#inputText`)[0].value="";
});    

//留言按鈕
$('#msgBtn').click(function(){
    //alert(5);
    console.log(); 
    msg_value(); 
 })

// }




//按鈕函示-------------------
 
function message_btn(e){
    //alert(6);
    message_arr=e;
    $('.messageBtn').addClass(function(){
        $('.message').slideDown(50);
    })
    
    
  for (let i = 0; i < message_arr.length; i++) {
  $("#messageContent").append($("#messageWrap").clone(true).attr({id:'message_itme'+i,class:'message_itme messageWrap'}));
  $(`#message_itme${i}  .megsageMemName p:eq(0)`).text(message_arr[i]['memId']);
  $(`#message_itme${i}  .megsageMemName p:eq(1)`).text(message_arr[i]['msgDate']);
  $(`#message_itme${i}  .messageBox p:eq(0)`).text(message_arr[i]['msgContent']);
  let $input=(`<input type="hidden" name="msgNo"></input>`)
  $(`#message_itme${i}  .messageBtn span:eq(0)`).attr('id','messageBtn'+(i)).append($input);
  $(`#message_itme${i}   input`)[0].value=message_arr[i]['msgNo']
}}


function msg_value() {
    //alert(7);
//     if (!sessionStorage['memNo']) {
   
//      $id('login_gary').style.display = 'block';
//      return ;
// } 
if ($(`#inputText`).val()==0)
{  //alert("請輸入文字");
    return ;
}

// console.log( sessionStorage['memNo']);

msg_xml=competition();
msg_xml.onreadystatechange=
function(){
    //alert(8);
    if (msg_xml.readyState==4 && msg_xml.status==200){
      console.log(msg_xml.responseText);
    }
};
// console.log( sessionStorage['user_no']);
    let msg_arr= $('.messageWrapInput').serializeArray();
    console.log(msg_arr);
    msg_xml.open("GET","php/competition/msg.php?competNo="+msg_arr[0]["value"]+"&msg="+msg_arr[1]["value"]+"&user="+sessionStorage['memId'],true);
    msg_xml.send();
 $('.message_itme').remove();
 setTimeout(() => {
     msg_revalue()
 }, 100);

}

function msg_revalue(){
    //alert(9);
 let e =$(`#msgBtnNo`).val();
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
// //alert(canvas.height);

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