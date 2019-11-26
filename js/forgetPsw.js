var form1=new Vue({
    data:{
        email:'',
        errMsg:'',
    },
    methods:{
        clear(e){
            this.email='',
            this.errMsg=''
        },
        test() {
            let email = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z]+$/;
            if (email.test(this.email)) {
                this.errMsg = '';
            } else {
                this.errMsg = 'email格式錯誤';
            }
        },
        submitEmail(e){
            if (this.email == '' || this.errMsg != '' && this.email != ''){
                alertWrap("請輸入正確資料");
            }else{
                fetch(`php/login/forgetPsw.php?email=${this.email}`).then(response => response.text()).then(result => {
                    if (result.indexOf("emailError") != -1) {
                        alertWrap("無此信箱,請重新輸入");
                        this.email = '';
                    } else if (result.indexOf("success") == -1){
                        this.email = '';
                        alertWrap("系統錯誤");
                    }else {
                        alertWrap("已成功寄出信件");
                        this.email = '';
                        document.getElementById('loginforget').style.display = "none";
                        document.getElementById('login').style.display = "block";
                    }
                    
                    console.log(result);
                });
            }

        }
    }
});
form1.$mount("#loginforget");