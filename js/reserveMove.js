let reYuJourney = document.querySelector('.reYuJourney');
let catFeet = document.querySelectorAll('.catFeet');
let indexReContent = document.querySelector('.indexReContent');
let waitGirl = document.querySelector('.waitGirl');
function showFeet(){
    return new Promise(function (resolve, reject) {
        setTimeout(function () {
            resolve('我是傳下去的值');
        }, 500);
    });
}

function scrollFeet(){
    //console.log('aa');
    if (window.scrollY > reYuJourney.offsetTop + indexReContent.offsetTop) {
        showFeet().then(function (value) {
            catFeet[3].style.opacity = 1;
            return showFeet();
        }).then(function (value) {
            catFeet[2].style.opacity = 1;
            return showFeet();
        }).then(function (value) {
            catFeet[1].style.opacity = 1;
            return showFeet();
        }).then(function (value) {
            catFeet[0].style.opacity = 1;
            return showFeet();
        }).then(function (value) {
            catFeet[6].style.opacity = 1;
            return showFeet();
        }).then(function (value) {
            catFeet[5].style.opacity = 1;
            return showFeet();
        }).then(function (value) {
            catFeet[4].style.opacity = 1;
        });
        window.removeEventListener('scroll', scrollFeet);
    }
}
window.addEventListener("scroll", scrollFeet);
function removePeople() {
    waitGirl.classList.add('disappear');
    setTimeout(addPeople, 10000);
}
function addPeople() {
    waitGirl.classList.remove('disappear');
    setTimeout(removePeople, 10000);
} 
setTimeout(removePeople, 5000);

