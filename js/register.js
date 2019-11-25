var form=new Vue({
    data:{
        memId:'',
        idMsg:'',
        memPassword:'',
        pswMsg:'',
        pswConfirm:'',
        memEmail:'',
        emailMsg:'',
        hasError:false,
        memName:''
    },
    methods:{
        clear(){
            this.memId='',
            this.memPassword='',
            this.pswConfirm='',
            this.memEmail='',
            this.memName='',
            this.idMsg='',
            this.pswMsg='',
            this.emailMsg=''
        },
        testId(){
            if (/[\u4e00-\u9fa5]/.test(this.memId)){ //測試出中文字
                this.idMsg="不得輸入中文";
                this.hasError=true;
            } else if (this.memId.length < 4){
                this.idMsg = "輸入最少4個字元";
                this.hasError = true;
            }else{
                fetch(`php/login/register.php?id=${this.memId}`).then(res => res.text()).then(result => {
                    if (result.indexOf("error") != -1){
                        this.idMsg = "帳號已被使用";
                        this.hasError = true;
                    }else{
                        this.idMsg = "";
                        this.hasError = false;
                    }
                    
                });
            }
        },
        testPsw(){
            if (/^[A-Za-z]+.*[0-9]+.*/.test(this.memPassword)) { 
                this.pswMsg ="";
                this.hasError = false;
            }else{
                this.pswMsg = "英文開頭且包含數字";
                this.hasError = true;
            }
        },
        testEmail(){
            let email=/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z]+$/; 
            if(email.test(this.memEmail)){
                this.emailMsg='';
                this.hasError = false;
            }else{
                this.emailMsg = 'email格式錯誤';
                this.hasError = true;
            }
        },
        submit(e){
            let err = 0;
            for (i in this.$data) {
                if (this.$data[i] === "" && i.indexOf("Msg")==-1 || this.$data[i] == true) {
                    err++;
                    console.log(this.$data[i]);
                }
            }

            if (err>0){
                alertWrap("請輸入正確資料");
                alert(err);
            }else{
                console.log('success');
                let data={
                    "memName": this.memName,
                    "memId":this.memId,
                    "memPassword": this.memPassword,
                    "memEmail": this.memEmail,
                };
                jsonData = JSON.stringify(data);
                let xhr = new XMLHttpRequest();
                xhr.onload = function () {
                    if (xhr.status == 200) {
                        console.log(xhr.responseText);
                        let userData = JSON.parse(xhr.responseText);
                        for (i in userData) {
                            sessionStorage.setItem(i, userData[i]);
                        }
                        sessionStorage.setItem('memPassword', "");//不顯示
                        sessionStorage.setItem('memVisa', "");//不顯示
                        $id("login").style.display = "none";
                        $id("headerMemName").innerHTML = `${userData.memName}<a id="logout" href="javascript:;">登出</a>`;
                        $id("logout").onclick = logout;
                        if (memberInfoClick) { //判定原先有無按會員頁按鈕
                            document.location.href = "member.php";
                            memberInfoClick = false;
                        }

                    } else {
                        alertWrap(xhr.statusText);
                    }
                }
                xhr.open("post", "php/login/register.php", true);
                xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");
                xhr.send(`data=${jsonData}`);
               // alert("註冊成功");
            }
        }

    },
    computed: {
        pswConfirmMsg() {
            if (this.pswConfirm != this.memPassword && this.pswConfirm.length > 0) {
                this.hasError = true;
                return '與密碼不符';
            }
            else {
                this.hasError = false;
                return '';

            }
        },
    },
});
form.$mount("#loginRegister");