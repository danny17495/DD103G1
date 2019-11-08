window.addEventListener("load", function () {
    createCode();
});
let produceCode = document.getElementById('produceCode');
//alert 關閉
function alertWrap(title) {
    let alertWindow = document.querySelector('.alertWindow');
    let alertContent = document.querySelector('.alertContent');
    let alertClose = document.querySelector('.alertClose');
    let yesButton = document.querySelector('.yesButton');
    alertWindow.style.display = 'flex';
    alertContent.innerHTML = title;
    alertClose.addEventListener('click', function () {
        alertWindow.style.display = "none";
        return false;
    });
    yesButton.addEventListener('click', function () {
        alertWindow.style.display = "none";
        enterCode.value = '';
        enterCode.focus();
    });
}
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
    } else {
        alert('success');
    }
}