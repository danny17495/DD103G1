let date = new Date();
let year = date.getFullYear();
let month = date.getMonth() + 1;
let today = date.getDate();
let calendarYear = document.getElementById('calendarYear');
let calendarMonth = document.getElementById('calendarMonth');


function getDate() {
    let dayofweek = new Date(year, month - 1, 1).getDay();//判斷第一天是星期幾
    let perMonth = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
    if (year % 4 == 0 && year % 100 != 0 || year % 400 == 0) {
        perMonth[1] = 29;//閏年
    }
    calendarYear.innerHTML = year;
    calendarMonth.innerHTML = month < 10 ? `0${month}` : month;
    //放每月日期
    let str = "";
    let calendarBodys = document.querySelectorAll('.calendarBody');
    let row = Math.ceil((dayofweek + perMonth[month - 1]) / 7);
    for (let i = 0; i < row; i++) { //建表格
        str += `<ul>`;
        for (let j = 0; j < 7; j++) {
            str += `<li class="disabledDate"></li>`;
        }
        str += `</ul>`;
    }
    calendarBodys[1].innerHTML = str;
    let liDates = document.querySelectorAll('.disabledDate'); //放資料
    for (let i = 0; i < perMonth[month - 1]; i++) {
        liDates[dayofweek + i].innerText = i + 1;
        if (i == dayofweek + today - 1 && month == date.getMonth() + 1) {
            liDates[i].classList.remove('disabledDate');
            liDates[i].classList.add('today');
        }
    }

}
let caLeftArrow = document.querySelector('.caLeftArrow');
let caRightArrow = document.querySelector('.caRightArrow');
caLeftArrow.addEventListener('click', function (e) {
    month--;
    if (month <= 0) {
        month = 12;
        year--;
    }
    getDate();

});
caRightArrow.addEventListener('click', function () {//2019 12 2020 2
    month++;
    if (month >= 13) {

        month = 1;
        year++;
    }
    getDate();
});

window.addEventListener('load', getDate);