let memberInfoClick = false;
function $id(id) {
    return document.getElementById(id);
};
function logout(){
    sessionStorage.clear();
    let xhr = new XMLHttpRequest();
    xhr.open("Get", "php/login/logout.php", true);
    xhr.send(null);
    $id("headerMemName").innerHTML='';
    // $id('memberInfo').onclick = function (e) {
    //     memberInfoClick = false;
    //     e.preventDefault();
    //     openLoginData();
    // }
    if (window.location.href.indexOf("member.php") != -1) {
        window.location.href = "index.html"
    }
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
            console.log(loginResult);
            if (loginResult.indexOf('systemError')!=-1){
                alertWrap("系統錯誤");
            } else if (loginResult.indexOf('loginError') != -1){
                alertWrap("帳號密碼錯誤");
            }else{
                userData = JSON.parse(loginResult)[0];
                console.log(userData);
                if (userData.memLoginStatus=='0') {
                    alertWrap("您的帳號已被停權")
                } else {
                    for (var i in userData) {
                        sessionStorage.setItem(i, userData[i]);
                    }
                    sessionStorage.setItem('memPassword', "");//不顯示
                    sessionStorage.setItem('memVisa', "");//不顯示
                    //console.log(userData.name);
                    $id("login").style.display = "none";
                    $id("headerMemName").innerHTML = `${userData.memName}<a id="logout" href="javascript:;">登出</a>`;
                    $id("logout").onclick=logout;
                    if (memberInfoClick){ //判定原先有無按會員頁按鈕
                        window.location.href = "member.php";
                        memberInfoClick=false;
                    }
            }
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
    $id("user-id").value = '';
    $id("user-psw").value = '';
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
            $id("user-id").value = '';
            $id("user-psw").value = '';
        });
    });
    loginClose.forEach(function(dom,index) {
        dom.addEventListener('click', function () {
            login.style.display="none";
            loginforget.style.display = "none";
            loginRegister.style.display = "none";
            // $id("user-id").value = '';
            // $id("user-psw").value = '';
        });
    });
    LoginBtnCenter.addEventListener('click',sendData);
}

function judgeLogin(){
    fetch("php/login/loginJudge.php").then(loginJudge => loginJudge.text().then(loginJudge => {
        if (loginJudge != "not login") {   //已登入
            $id("headerMemName").innerHTML = `${sessionStorage.memName}<a id="logout" href="javascript:;">登出</a>`;
            $id("logout").onclick = logout;
        }
    }));
}
window.addEventListener('load',function(){
    judgeLogin();

    $id('memberInfo').onclick = function (e) {
        if (!sessionStorage['memNo']) { //未登入
           // alert('未登入');
            memberInfoClick = true;
            e.preventDefault();
            openLoginData();
        }else{
           // alert('已登入');
            window.location.href = "member.php";
        }
    }

});


