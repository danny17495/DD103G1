
form3 = new Vue({
    data: {
        journeys: ['尋幽訪古', '漫遊山城', '船遊秘境'],
        selectJourney:'尋幽訪古',
        selectPeople:'1',
        randomNum: '',
        inputCode:''
    },
    methods: {
        createCode() {
            this.randomNum='';
            let ranArray = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
            let ranLength = 4;
            for (let i = 0; i < ranLength; i++) {
                this.randomNum += ranArray[Math.floor(Math.random() * ranArray.length)];
            }
        },
        queryDate(){
            cantReDate = [];
            let xhr = new XMLHttpRequest();
            xhr.onload = function () {
                let revResult = xhr.responseText;
                //console.log(revResult);
                let fullDate = document.querySelectorAll('.fullDate');
                fullDate.forEach(dom => {
                    dom.classList.remove('fullDate');
                    dom.classList.add('yesDate');
                });
                if (revResult.indexOf('allpass') == -1) {
                    revData = JSON.parse(revResult);
                    for (var i = 0; i < revData.length;i++) {
                        let revDataSplit=revData[i].reserveDate.split('-');
                            cantReDate.push({
                                year: revDataSplit[0],
                                month: revDataSplit[1],
                                date: revDataSplit[2]
                            });
                        unclickedDate();
                    }
                }

            }
            xhr.open("post", "php/reserveDate/queryPeople.php", true);
            xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");
            xhr.send(`journey=${this.selectJourney}&people=${this.selectPeople}`);
        },
        submitRev(){
            if (!sessionStorage['memNo']) { 
                memberInfoClick = false;
                openLoginData();
                return;
            }else if (reComfirmDate.innerText == "!!!還未選擇日期!!!") {
                alertWrap("未選擇日期");
            }else if (this.inputCode.length <= 0) {
                alertWrap("請輸入驗證碼");
            } else if (this.inputCode !== this.randomNum) {
                alertWrap("驗證碼輸入錯誤");
                this.inputCode = '';
            }else{
                let sendData = {
                    "memNo": sessionStorage['memNo'],
                    "reserveDate": reComfirmDate.innerText,
                    "reserveRoute": this.selectJourney,
                    "reserveNum": this.selectPeople
                };
                jsonData = JSON.stringify(sendData);
                let xhr = new XMLHttpRequest();
                xhr.onload = function () {
                    if (xhr.status == 200) {
                        alertWrap("預約成功");
                        reComfirmDate.innerText = "!!!還未選擇日期!!!";
                        month=orMonth;
                        year=orYear;
                        getDate();
                }
            }
                this.selectJourney = "尋幽訪古";
                this.selectPeople = "1";
                this.inputCode = "";
                xhr.open("post", "php/reserveDate/revDate.php", true);
                xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");
                xhr.send(`data=${jsonData}`);
            }
        }
    },
    mounted: function () {
        this.createCode();
        this.queryDate();
    },

});
form3.$mount("#revform")