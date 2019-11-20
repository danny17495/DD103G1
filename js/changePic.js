let shopPic=document.querySelectorAll('.shopPic');
let changeSrc = document.getElementById('changeSrc');
let shopDemoS = document.querySelectorAll('.shopDemoS');
let cupColor = document.querySelectorAll('.cupColor');
let changeCupStyle = document.getElementById('changeCupStyle');
let colorChoose = ['blue','red','strips'];
//放入圖片
shopPic.forEach(function(dom,index){
    dom.addEventListener('click',function(){
        changeSrc.innerHTML =`<img src="images/image_abby/postDemo_${index+1}.jpg">`
    });
});
shopDemoS.forEach(function (dom, index) {
    dom.addEventListener('click', function () {
        changeSrc.innerHTML = `<img src="images/image_abby/postDemo_${index + 1}.jpg">`
    });
});

cupColor.forEach(function (dom, index) {
    dom.addEventListener('click', function () {
        document.querySelector('.cupColor.active').classList.remove('active');
        this.classList.add('active');
        changeCupStyle.src = `images/${colorChoose[index]}cup.png`;
    });
});