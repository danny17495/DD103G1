<script>
//宣告變數

var nameobj;
var nameMsg;
var passwordobj;
var passwordMsg;
var repasswordobj;
var confirmMsg;
var emailobj;
var eamilMsg;


//獲取頁面的物件
window.onload = function(){
nameobj = document.getElementById("name");
nameMsg = document.getElementById("nameMsg");
passwordobj = document.getElementById("password");
passwordMsg = document.getElementById("passwordMsg");
repasswordobj = document.getElementById("repassword");
confirmMsg = document.getElementById("confirmMsg");
emailobj = document.getElementById("email");
emailMsg = document.getElementById("emailMsg");


};

//判斷表單引數
function checkForm(){
var form = document.register;
if(checkUserName(form.username.value,"nameMsg")
&&checkPassword(form.password.value,"passwordMsg")
&&checkRePassword(form.repassword.value,"confirmMsg")
&&checkEmail(form.email.value,"emailMsg"){
alert("恭喜,註冊成功!");
form.submit();
}



</script>