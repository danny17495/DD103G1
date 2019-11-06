window.addEventListener("load",function(){
  let header = document.querySelector('header');
  header.classList.add('clearHeaderStyle');
    /* 點開漢堡清單變白色 */
  document.getElementById('headerCheck').onclick=function(){
      let headerStyle = document.querySelector('.headerStyle');
      headerStyle.classList.toggle('changeWhiteColor');
  }
  /*scroll header變白色*/
  function changeWhite(){
      //console.log(window.scrollY);
    if (window.scrollY>300){
      header.classList.remove('clearHeaderStyle');
    }else{
      header.classList.add('clearHeaderStyle');
    }
  }
  function debounce(func, wait = 5, immediate = true) {
    var timeout;
    return function () {
      var context = this,
        args = arguments;
      var later = function () {
        timeout = null;
        if (!immediate) func.apply(context, args);  //不立即執行則是隔waitms後執行
      };
      var callNow = immediate && !timeout;
      clearTimeout(timeout);
      timeout = setTimeout(later, wait);
      if (callNow) func.apply(context, args);  //立即執行後再隔5ms
    };
  }
  window.addEventListener('scroll',debounce(changeWhite));

});