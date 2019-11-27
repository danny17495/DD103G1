window.addEventListener("load", function () {
    let header = document.querySelector('header');
     header.classList.add('clearHeaderStyle');
    /* 點開漢堡清單變白色 */
    document.getElementById('headerCheck').onclick = function () {
        let headerStyle = document.querySelector('.headerStyle');
        headerStyle.classList.toggle('changeWhiteColor');
    };
    var controller = new ScrollMagic.Controller();

    var scene = new ScrollMagic.Scene({
        triggerElement: '.tripper_01',
        offset:100
    }).setClassToggle('header', 'white').addTo(controller);

    var scene2 = new ScrollMagic.Scene({
        triggerElement: '.indexReserve',
    }).setClassToggle('.tree', 'treeGrow').addTo(controller);

    //首頁景點介紹圖的樹長出來
    var scene3 = new ScrollMagic.Scene({
        triggerElement: '.indexSpotTree_start',
        //triggerHook: 0
    }).setClassToggle('.indexSpotTree', 'treeGrow').addTo(controller);

    //首頁明信片打開
    var postscene1 = new ScrollMagic.Scene({
        triggerElement: '.postDIY',
        reverse:false,
    }).setClassToggle('.indexPost_trs1', 'trs1Down').addTo(controller);
    
    var postscene2 = new ScrollMagic.Scene({
        triggerElement: '.postDIY',
        reverse:false,
    }).setClassToggle('.indexPost_trs2', 'trs2UP').addTo(controller);
    
    var postscene3 = new ScrollMagic.Scene({
        triggerElement: '.postDIY',
        reverse:false,
    }).setClassToggle('.indexPost_trs3', 'trs3UP').addTo(controller);

    var postsgirl = new ScrollMagic.Scene({
        triggerElement: '.postDIY',
        reverse:false,
    }).setClassToggle('.postGirl', 'postGirlShow').addTo(controller);


    //z-index
     var postsOuter = new ScrollMagic.Scene({
        triggerElement: '.postBGC_3',
        reverse:false,
    }).setClassToggle('.indexPost_trsOuter', 'trsOuterHidden').addTo(controller);

        
});
