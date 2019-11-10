console.log('start');

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
var x = canvas.width = 2400;
var y = canvas.height = 937;
// alert(canvas.height);

var img = new Image();
img.src = "../images/competition/star.png";
var num = 100;
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
    ctx.fillStyle = "#385BA7";
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

// 控制留言板開關

$('.messageBtn').click(function(){
    $('.message').show();
});

$('.closeBtn').click(function(){
    $('.message').hide();
});

new Vue({
    el: '#vote',
    data: {
        message:'',
        num: 0,
    }

})

new Vue({
    el: '#vote2',
    data: {
        message:'',
        num: 0,
    }

})

new Vue({
    el: '#vote3',
    data: {
        message:'',
        num: 0,
    }

})