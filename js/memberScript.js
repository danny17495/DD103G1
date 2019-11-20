
$(function(){
    var $tabPanel = $('#memberTab-panel') ,
        $tabs = $tabPanel.find('.memberTabs') ,
        $tab = $tabs.find('a') ,
        $tabContent = $tabPanel.find('.memberTab-content') ,
        $content = $tabContent.find('> span'); //用span控制頁面
        $tab.eq(0).addClass('active');

        $content.hide(); //隱藏全部
        $content.eq(0).show(); //秀第一頁
    
        $tab.on('click',function(){ //點擊換頁
        var $tabIndex = $(this).index();
        $(this).addClass('active').siblings().removeClass('active');
        $content.eq($tabIndex).show().siblings().hide();
    });
});