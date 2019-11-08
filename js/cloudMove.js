
$(document).ready(function(){

      var ul =$('.cloudAnimation');

      setInterval(cloudMove1,0.1);

      function cloudMove1(){
          $('.cloudAnimation li:first img').animate({
          left:'-1920px',}, 4000,'linear',cloneCloud).hide().animate({
          left:'0',}, 1,'linear').show();
        }
      function cloneCloud(){
          setInterval(cloudMove2,0.1);
        }

      function cloudMove2(){
          $('.cloudAnimation li:eq(2) img').animate({
          left:'-1920px',}, 5000,'linear').hide().animate({
          left:'0',}, 1,'linear').show();
        }
  });