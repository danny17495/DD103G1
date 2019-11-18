window.addEventListener("load", function () {
    createCode();
});
let produceCode = document.getElementById('produceCode');

//創驗證碼
function createCode() {
    let randomNum = '';
    let ranArray = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
    let ranLength = 4;
    for (let i = 0; i < ranLength; i++) {
        randomNum += ranArray[Math.floor(Math.random() * ranArray.length)];
    }
    produceCode.innerText = randomNum;
}
//檢查送出驗證碼
function validateCode() {
    let enterCode = document.getElementById('enterCode');
    //console.log(enterCodeValue, produceCode.innerText);
    if (enterCode.value.length <= 0) {
        alertWrap("請輸入驗證碼");

    } else if (enterCode.value !== produceCode.innerText) {
        alertWrap("驗證碼輸入錯誤");
        enterCode.value = '';
        enterCode.focus();
    } else {
        alert('success');
    }
}