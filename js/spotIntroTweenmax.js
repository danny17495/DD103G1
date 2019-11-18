window.addEventListener("load", function () {
   
    var controller = new ScrollMagic.Controller();

    var scene = new ScrollMagic.Scene({
        triggerElement: '.tripper_01',
        // duration: document.body.offsetHeigh,
        // triggerHook: 0,
        offset:550
    }).setClassToggle('.spotIntroTree', 'treeGrow').addTo(controller);

});
