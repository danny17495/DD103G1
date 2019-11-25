let shopPic=document.querySelectorAll('.shopPic');
let changeSrc = document.getElementById('changeSrc');
let shopDemoS = document.querySelectorAll('.shopDemoS');
let cupColor = document.querySelectorAll('.cupColor');
let changeCupStyle = document.getElementById('changeCupStyle');
let cupPrice = document.querySelector('.cupPrice');
let colorChoose = ['blue','red','strips'];
let price=[450,550,650];
let indexVoBtnDIV = document.querySelectorAll('.indexVoBtn >div');
// let vote = document.querySelectorAll('.vote');
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
        cupPrice.innerText=`${price[index]}元`;

    });
});
indexVoBtnDIV.forEach(function (dom, index) {
    dom.addEventListener('click', function () {
        window.location.href = 'competition.php'

    });
})
