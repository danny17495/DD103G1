console.log('start');

//鳥移動(TWEENMAX))
var T1 = new TimelineMax({
    repeat: -1,
});
var T2 = new TimelineMax({
    repeat: -1,
});



T1.to('#welcomebird1', .1,{
    y:0,
    x:0,
}).to('#welcomebird1', 15,{
    y:0,
    x:-900,
    opacity:0,
})

T2.to('#welcomebird2', 12,{
    y:0,
    x:900,
    opacity:0,

}).to('#welcomebird2', 15,{
    y:0,
    x:-900,
    opacity:0,
})


