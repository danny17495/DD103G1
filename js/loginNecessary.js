function validateForm() {
  var name = document.getElementById('name').value;
  var password = document.getElementById('password').value;
  var passwordcheck = document.getElementById('passwordcheck').value;
  var Email = document.getElementById('email').value;

  if (name == null || name == "") {
    alert("姓名必須要寫");
    return false;

  } else if (password == null || password == "") {
    alert("密碼必須要寫");
    return false;

  } else if (passwordcheck == null || passwordcheck == "") {
    alert("密碼確認必須要寫");
    return false;

  } else if (Email == null || Email == "") {
    alert("EMAIL 必須填寫");
    return false;
    
  } else {
    alert("註冊成功");
    form.submit();
  }
}


