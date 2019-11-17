
$(document).ready(function(){
//雲朵橫向移動
      var ul =$('.cloudAnimation');

      setInterval(cloudMove1,0.1);
      setInterval(cloudMove2,0.1);
      setInterval(cloudMove3,0.1);


      function cloudMove1(){
          $('#moveCloud1').animate({
          left:'-1920px',}, 4000,'linear').hide().animate({
          left:'0',}, 1,'linear').show();
        }

      function cloudMove2(){
          $('#moveCloud2').animate({
          left:'-1920px',}, 5000,'linear').hide().animate({
          left:'0',}, 1,'linear').show();
        }

      function cloudMove3(){
          $('#moveCloud3').animate({
          left:'-1920px',}, 10000,'linear').hide().animate({
          left:'0',}, 1,'linear').show();
        }


//景點介紹切換
      $('#indexSpotBtn1').click(function(){
       $('#indexSpot_02').hide();
       $('#indexSpot_03').hide();
       $('#indexSpot_01').show();
       $('#indexSpot_pic02').hide();
       $('#indexSpot_pic03').hide();
       $('#indexSpot_pic01').show();
      });

      $('#indexSpotBtn2').click(function(){
       $('#indexSpot_01').hide();
       $('#indexSpot_03').hide();
       $('#indexSpot_02').show();
       $('#indexSpot_pic01').hide();
       $('#indexSpot_pic03').hide();
       $('#indexSpot_pic02').show();
      });

      $('#indexSpotBtn3').click(function(){
       $('#indexSpot_01').hide();
       $('#indexSpot_02').hide();
       $('#indexSpot_03').show();
       $('#indexSpot_pic01').hide();
       $('#indexSpot_pic02').hide();
       $('#indexSpot_pic03').show();
      });


//明信片背景切換
      $('#indexPostOption01').click(function(){
       $('#indexPostBG0').hide();
       $('#indexPostBG2').hide();
       $('#indexPostBG3').hide();
       $('#indexPostBG1').show();
       $('.postBGC_1').css('border',
        '3px solid #e99313');
       $('.postBGC_3').css('border',
        '');
       $('.postBGC_2').css('border',
        '');
      }); 
     
      $('#indexPostOption02').click(function(){
       $('#indexPostBG0').hide();
       $('#indexPostBG1').hide();
       $('#indexPostBG3').hide();
       $('#indexPostBG2').show();
       $('.postBGC_2').css('border',
        '3px solid #e99313');
       $('.postBGC_1').css('border',
        '');
       $('.postBGC_3').css('border',
        '');
      }); 

      $('#indexPostOption03').click(function(){
       $('#indexPostBG0').hide();
       $('#indexPostBG1').hide();
       $('#indexPostBG2').hide();
       $('#indexPostBG3').show();
       $('.postBGC_3').css('border',
        '3px solid #e99313');
       $('.postBGC_1').css('border',
        '');
       $('.postBGC_2').css('border',
        '');
      });  
  });