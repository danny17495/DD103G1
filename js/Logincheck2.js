
<script>
        function validateForm(){
            var x=document.forms["myForm"]["email"].value;
            var atpos=x.indexOf("@");
            var dotpos=x.lastIndexOf(".");
            if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length){
                alert("不是一个有效的 e-mail 地址");
                return false;
            }
        }
                function validateForm(LoginForm){
                    if (!checkEmail(LoginForm.Loginemail.value)){
                        alert("Email 資料有誤，表單將不送出！");
                        return(false);	
                    }
                    alert("資料正確無誤，立刻送出表單！");
                    form.submit();
                    return(true);
                }
                
                function checkEmail(email){
                    index = email.indexOf ('@', 0);		// 尋找 @ 的位置，0 代表開始尋找的起始位置
                    if (email.length==0) {
                        alert("請輸入電子郵件地址！");
                        return (false);
                    } else if (index==-1) {
                        alert("錯誤：必須包含「@」。");
                        return (false);
                    } else if (index==0) {
                        alert("錯誤：「@」之前不可為空字串。");
                        return (false);
                    } else if (index==email.length-1) {
                        alert("錯誤：「@」之後不可為空字串。");
                        return (false);
                    } else
                        return (true);
                }
        </script>