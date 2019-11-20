// var userData;
function $id(id) {
    return document.getElementById(id);
};
function logout(){
   alert('click');
    sessionStorage.clear();
    let xhr = new XMLHttpRequest();
    xhr.open("Get", "php/login/logout.php", true);
    xhr.send(null);
    return false;
}
function sendData(){
    let userId = $id("user-id").value;
    let userPsw = $id("user-psw").value;
    if (userId == '' || userPsw==''){
        alertWrap("請輸入帳號密碼");
    }else{
        let xhr=new XMLHttpRequest();
        xhr.onload=function(){
            let loginResult=xhr.responseText;
            if (loginResult.indexOf('systemError')!=-1){
                alertWrap("系統錯誤");
            } else if (loginResult.indexOf('loginError') != -1){
                alertWrap("帳號密碼錯誤");
            }else{
                userData = JSON.parse(loginResult)[0];
                for (var i in userData) {
                    sessionStorage.setItem(i, userData[i]);
                }
                sessionStorage.setItem('password', "");//不顯示
                sessionStorage.setItem('visa', "");//不顯示
                //console.log(userData.name);
                $id("login").style.display = "none";
                $id("headerMemName").innerHTML = `${userData.name}<a id="logout" href="javascript:;">登出</a>`;
                $id("logout").onclick=logout;
            }
            
        }
        xhr.open("post", "php/login/login.php", true);
        xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");
        xhr.send(`user_id=${userId}&user_psw=${userPsw}`);
    }
}
function openLoginData(){ //登入 註冊 盒子
    let login=$id("login");
    let loginforget = $id("loginforget");
    let loginRegister = $id("loginRegister");
    let linkLoginForget = $id("linkLoginForget");
    let loginClose = document.querySelectorAll(".game_close");
    let linkLoginRegister = document.querySelector('.LoginForm-signup-now');
    let LoginBtnL = document.querySelectorAll('.LoginBtnL');
    let LoginBtnCenter = document.querySelector('.LoginBtnCenter');
    login.style.display="block";
    linkLoginForget.addEventListener("click",function(){
        login.style.display = "none";
        loginforget.style.display="block";
    });
    linkLoginRegister.addEventListener('click',function(){
        login.style.display = "none";
        loginRegister.style.display = "block";
    });
    LoginBtnL.forEach(dom => {
        dom.addEventListener('click', function (e) {
            e.preventDefault();
            loginforget.style.display = "none";
            loginRegister.style.display="none";
            login.style.display = "block";
        });
    });
    loginClose.forEach(function(dom) {
        dom.addEventListener('click', function () {
            login.style.display="none";
            loginforget.style.display = "none";
            loginRegister.style.display = "none";
        });
    });
    LoginBtnCenter.addEventListener('click',sendData);
}
function judgeLogin(){
    fetch("php/login/loginJudge.php").then(loginJudge => loginJudge.text()).then(loginJudge => {
        if (loginJudge != "not login") {   //已登入
            $id("headerMemName").innerHTML = `${sessionStorage.name}<a id="logout" href="javascript:;">登出</a>`;
            $id("logout").onclick = logout;
        } else {
            // $id("headerMemName").innerHTML='';    //尚未登入
            $id('memberInfo').onclick = function () {
                openLoginData();
                return false;
            }
        }
    })
}
window.addEventListener('load',function(){
    judgeLogin();
});
openLoginData();