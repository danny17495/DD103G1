let date = new Date();
let month = date.getMonth() + 1;
let orMonth=month;
let year = date.getFullYear();
let orYear=year;
let today = date.getDate();
let calendarYear = document.getElementById('calendarYear');
let calendarMonth = document.getElementById('calendarMonth');
let reComfirmDate = document.querySelector('.reComfirmDate');
let dayofweek; 
let yesDate;
let cantReDate = [];
function getDate() {
   
    let perMonth = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
    if (year % 4 == 0 && year % 100 != 0 || year % 400 == 0) {
        perMonth[1] = 29;//閏年
    }
    calendarYear.innerHTML = year;
    calendarMonth.innerHTML = month < 10 ? `0${month}` : month;
    //放每月日期
    let str = "";
    let calendarBodys = document.querySelectorAll('.calendarBody');
    dayofweek=new Date(year, month - 1, 1).getDay();//判斷第一天是星期幾
    let row = Math.ceil((dayofweek + perMonth[month - 1]) / 7);
    for (let i = 0; i < row; i++) { //建表格
        str += `<ul>`;
        for (let j = 0; j < 7; j++) {
            str += `<li></li>`;
        }
        str += `</ul>`;
    }
    calendarBodys[1].innerHTML = str;
    let liDates = document.querySelectorAll('#calendarCon li'); //放資料disabledDate
    for (let i = 0; i < perMonth[month - 1]; i++) {  
        liDates[dayofweek + i].innerText = i + 1;
        liDates[dayofweek + i].classList.add('yesDate');
        if (i == dayofweek + today - 1 && month == date.getMonth() + 1) { //今天日期
            liDates[i].classList.remove('yesDate');
            liDates[i].classList.add('today');
        } else if (i < dayofweek + today - 1 && month == date.getMonth() + 1) { //今天日期以前
            liDates[i].classList.remove('yesDate');
            liDates[i].classList.add('disabledDate');
        }
    }
  
    unclickedDate();

    fullDate = document.querySelectorAll('.fullDate')
    yesDate = document.querySelectorAll('.yesDate');
    fullDate.forEach(function (dom) {
        dom.addEventListener('click', function () {
            alertWrap("此天已滿額");
        });
    });
    yesDate.forEach(function (dom) {
        dom.addEventListener('click', function () {
            for (var i = 0; i < yesDate.length; i++) {
                if (yesDate[i].classList.contains('active')) {
                    yesDate[i].classList.remove('active');
                }
            }
            this.classList.add('active');
            reComfirmDate.innerHTML=`${year}/${month}/${dom.innerText}`
        });
    });

}
function unclickedDate(){
    let calendarConli = document.querySelectorAll('#calendarCon li');
    for (let i = 0; i < cantReDate.length;i++){
        if (cantReDate[i].year == year && cantReDate[i].month == month){
            let index=parseInt(cantReDate[i].date) + dayofweek-1;
            calendarConli[index].classList.remove('yesDate');
            calendarConli[index].classList.add('fullDate');
        }
    }
}
let caLeftArrow = document.querySelector('.caLeftArrow');
let caRightArrow = document.querySelector('.caRightArrow');

caLeftArrow.addEventListener('click', function (e) {
  
    if(month==orMonth&&year==orYear){
        return false;
    }else{
      
        month--;
        if (month == orMonth && year == orYear) {
            caLeftArrow.classList.add('disabled');
        }
        if (month <= 0) {
            month = 12;
            year--;
        }
        getDate();
        console.log(yesDate);
    }


});
caRightArrow.addEventListener('click', function (e) {//2019 12 2020 2
    caLeftArrow.classList.remove('disabled');

    month++;
    if (month >= 13) {

        month = 1;
        year++;
    }
    getDate();
});


window.addEventListener('load', function(){
    getDate();
});