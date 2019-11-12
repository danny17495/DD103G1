
var count=0;
var num=Math.floor((Math.random()*2))+1;

//遊戲開始，變更背景明度、出現尋找物品
function gameStart(){
	console.log(num);
	if(num==1){
		document.getElementById("GameWrap").style.backgroundImage="url(./images/game/game1_start_bg.png)";
		document.getElementById("game1").style.display="block";
	}else{
		document.getElementById("GameWrap").style.backgroundImage="url(./images/game/game2_start_bg.png)";
		document.getElementById("game2").style.display="block";
	}
	
	document.getElementById("game_playbtn").style.display="none";
	document.getElementById("suggestionBar").style.display="block";
	
}

//找到芋圓
function Tarofound(){
	document.getElementById("taro_in_game1").src="./images/game/taro_chosen.png";
	document.getElementById("taroText").style.color="#888888";
	document.getElementById("taro_in_game1_after").style.display="none";
	count+=1;
	if(count==3){
		setTimeout(allfound, 400);
	}
}
//找到草仔粿
function grassricefound(){
	document.getElementById("grassrice_in_game1").src="./images/game/grassrice_chosen.png";
	document.getElementById("grassriceText").style.color="#888888";
	document.getElementById("grassrice_in_game1_after").style.display="none";
	count+=1;
	if(count==3){
		setTimeout(allfound, 400);
	}
}
//找到肉圓
function meatballfound(){
	document.getElementById("meatball_in_game1").src="./images/game/meatball_chosen.png";
	document.getElementById("meatballText").style.color="#888888";
	document.getElementById("meatball_in_game1_after").style.display="none";
	count+=1;
	if(count==3){
		setTimeout(allfound, 400);
	}
	}
//三個都找到後顯示優惠券
function allfound(){
	document.getElementById("game_coupon_wrap").style.display="block";
	document.getElementById("GameWrap").style.backgroundImage="url(./images/game/game1_bg.png)";
	document.getElementById("suggestionBar").style.display="none";
	document.getElementById("game_getCoupon").style.display="block";
}
//關閉遊戲優惠券
function gameClose(){
	document.getElementById("game_coupon_wrap").style.display="none";
	document.getElementById("game_playbtn").style.display="block";
	document.getElementById("suggestionBar").style.display="none";
	document.getElementById("GameWrap").style.backgroundImage="url(./images/game/game1_bg.png)";
	document.getElementById("taro_in_game1").style.display="none";
	document.getElementById("grassrice_in_game1").style.display="none";
	document.getElementById("meatball_in_game1").style.display="none";
	window.location.reload();
}

//優惠券提示
function getSuggestion(){
	var taro= document.getElementById("taro_in_game1");
	var grassrice= document.getElementById("grassrice_in_game1");
	//芋圓提示
	if(!(taro.src.match('chosen'))){
		console.log("taro");
		document.getElementById("taro_suggestion").style.display="block";	
	}
	//草仔粿提示
	if(!(grassrice.src.match('chosen'))&&taro.src.match('chosen')){
		console.log("grassrice");
		document.getElementById("grassrice_suggestion").style.display="block";	
	}
	//肉圓提示
	if(!(meatball.src.match('chosen'))&&taro.src.match('chosen')&&grassrice.src.match('chosen')){
		console.log("meatball");
		document.getElementById("meatball_suggestion").style.display="block";	
	}
}
//關閉芋圓優惠券提示
function closeTaroSuggestion(){
	document.getElementById("taro_suggestion").style.display="none";
	document.getElementById("taro_in_game1_after").style.display="block";
}
//關閉草仔粿優惠券提示
function closeGrassriceSuggestion(){
	document.getElementById("grassrice_suggestion").style.display="none";
	document.getElementById("grassrice_in_game1_after").style.display="block";
}
//關閉肉圓優惠券提示
function closeMeatballSuggestion(){
	document.getElementById("meatball_suggestion").style.display="none";
	document.getElementById("meatball_in_game1_after").style.display="block";
}

//領取優惠券
function getCoupon(){
	document.getElementById("game_getCoupon").style.display="none";

	document.getElementById("game_coupon_wrap").style.display="none";
	document.getElementById("game_playbtn").style.display="block";
	document.getElementById("suggestionBar").style.display="none";
	document.getElementById("GameWrap").style.backgroundImage="url(./images/game/game1_bg.png)";
	document.getElementById("taro_in_game1").style.display="none";
	document.getElementById("grassrice_in_game1").style.display="none";
	document.getElementById("meatball_in_game1").style.display="none";
	window.location.reload();
}

function init(){
	//遊戲開始
	document.getElementById("game_playbtn").onclick = gameStart;

	//找到物件
	document.getElementById("taro_in_game1").onclick = Tarofound;
	document.getElementById("grassrice_in_game1").onclick = grassricefound;
	document.getElementById("meatball_in_game1").onclick = meatballfound;

	//關閉優惠券視窗
	document.getElementById("game_close").onclick = gameClose;	

	//提示按鈕
	document.getElementById("game_suggestion").onclick = getSuggestion;

	//關閉芋圓提示	
	document.getElementById("taro_suggestion").onclick = closeTaroSuggestion;

	//關閉草仔粿提示	
	document.getElementById("grassrice_suggestion").onclick = closeGrassriceSuggestion;

	//關閉肉圓提示	
	document.getElementById("meatball_suggestion").onclick = closeMeatballSuggestion;

	//領取優惠券
	document.getElementById("game_getCoupon").onclick = getCoupon;
}

window.onload=init;