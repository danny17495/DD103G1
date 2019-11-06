//one item
$(document).ready(function(){
  $('.shopOneSlider').slick({
    dots: false,      //顯示輪播圖片會顯示圓圈
    speed: 300,
    slidesToShow: 1,    //輪播顯示個數
    autoplay: true, //自動播放
    // responsive:[
    //  {
    //    breakpoint: 600,
    //    settings: {
    //    slidesToShow: 1,
    //    slidesToScroll: 1,
    //    }

    //  },
    //  {
    //    breakpoint: 500,
    //    settings: {
    //    slidesToShow: 1,
    //    slidesToScroll: 1,
    //    }
    //  },      
    // ]       
  });
});
