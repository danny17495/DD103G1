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
        // duration: document.body.offsetHeigh,
        // triggerHook: 0,
        offset:100
    }).setClassToggle('header', 'white').addIndicators().addTo(controller);

    var scene2 = new ScrollMagic.Scene({
        triggerElement: '.indexReserve',
        //triggerHook: 0
    }).setClassToggle('.tree', 'treeGrow').addIndicators().addTo(controller);

});
