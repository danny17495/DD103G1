
// $(function(){
//     var $memberTabPanel = $('#memberTab-panel') ,
//         $memberTabs = $memberTabPanel.find('.memberTab') ,
//         $memberTab = $memberTabs.find('a') ,
//         $memberTabContent = $memberTabPanel.find('.memberTab-content') ,
//         $memberTabContent = $memberTabContent.find('> span');
    
//     $memberTab.eq(0).addClass('active');
//     $memberTabContent.eq(0).show();
    
    
//     $memberTab.on('click',function(){
//         var $memberTabIndex = $(this).index();
//         $(this).addClass('active').siblings().removeClass('active');
//         $memberTabcontent.eq($memberTabIndex).show().siblings().hide();
//     });
// });


$(function(){
    var $tabPanel = $('#memberTab-panel') ,
        $tabs = $tabPanel.find('.memberTabs') ,
        $tab = $tabs.find('a') ,
        $tabContent = $tabPanel.find('.memberTab-content') ,
        $content = $tabContent.find('> span');
    $tab.eq(0).addClass('active');
    $content.hide();
    $content.eq(0).show();
    
    
    $tab.on('click',function(){
        var $tabIndex = $(this).index();
        $(this).addClass('active').siblings().removeClass('active');
        $content.eq($tabIndex).show().siblings().hide();
    });
});