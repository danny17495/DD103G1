//鳥移動(TWEENMAX))
var T1 = new TimelineMax({
    repeat: -1,
});
var T2 = new TimelineMax({
    repeat: -1,
});



T1.to('#shopBird1', .1,{
    y:0,
    x:0,
}).to('#shopBird1', 15,{
    y:0,
    x:-900,
    opacity:0,
})

T2.to('#shopBird2', 12,{
    y:0,
    x:900,
    opacity:0,

}).to('#shopBird2', 15,{
    y:0,
    x:-900,
    opacity:0,
})


