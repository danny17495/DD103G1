
$(document).ready(function(){

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
     
  });