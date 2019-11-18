function validateForm(form){
	if (checkCreditCardNumber(form.cardNumber)){
		alert("資料正確無誤，立刻送出表單！");
		form.submit();
		return(true);
	}
	alert("資料有誤，表單將不送出！");
	form.cardNumber.focus();
	return(false);
}
function checkName(control) {
	if (control.value.length !== 5) {
		validatePrompt(control, "請輸入長度為 5 的帳號");
		return (false);
	}
	return (true);
}

function checkPassword(control) {
	if (control.value.length != 5) {
		validatePrompt(control, "請輸入長度為 5 的密碼！");
		return (false);
	}
	return (true);
}

