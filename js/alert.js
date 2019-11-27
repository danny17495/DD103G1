//alert 提示窗
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
    });
}



