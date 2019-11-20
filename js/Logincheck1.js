
function checkLength(control) {

	if (control.length <= 6) {//6碼英數字混合
		alert("帳號長度不足")
		// validatePrompt(control, "請輸入長度為 6 的帳號");
		return (false);
	}
	return (true);
}


function checkPassword(control) {
	if (control.length <= 6) {
		alert("密碼長度不足")
		// validatePrompt(control, "請輸入長度為 6 的密碼！");
		return (false);
	}
	return (true);
}

/* //英文數字混合 */

function checkName(control) {
	var regex = new RegExp("^[a-zA-Z0-9 ]+$");
	if (!regex.test("1qaz2wsx"))
		alert("必須要英數字混合");
	else
		alert("格式錯誤");
}

function validateForm(form) {
	if (checkName(form.Name)) {
		alert("資料正確無誤，立刻送出表單！");
		form.submit();
		// return (true);
	// else
		alert("資料有誤,表單將不送出")
	}

	// alert("資料有誤，表單將不送出！");
	form.Name.focus();
	return (false)
}



