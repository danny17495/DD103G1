
var count=0;

//遊戲開始，變更背景明度、出現尋找物品
function gameStart(){
	document.getElementById("GameWrap").style.backgroundImage="url(./images/game/game1_start_bg.png)";
	document.getElementById("game_playbtn").style.display="none";
	document.getElementById("suggestionBar").style.display="block";
	document.getElementById("game1").style.display="block";
}

//找到芋圓
function Tarofound(){
	document.getElementById("taro_in_game1").src="./images/game/taro_chosen.png";
	document.getElementById("taroText").style.color="#888888";
	count+=1;
	if(count==3){
		document.getElementById("game_coupon_wrap").style.display="block";
		document.getElementById("GameWrap").style.backgroundImage="url(./images/game/game1_bg.png)";
		document.getElementById("suggestionBar").style.display="none";
	}
}
//找到草仔粿
function grassricefound(){
	document.getElementById("grassrice_in_game1").src="./images/game/grassrice_chosen.png";
	document.getElementById("grassriceText").style.color="#888888";
	count+=1;
	if(count==3){
		document.getElementById("game_coupon_wrap").style.display="block";
		document.getElementById("GameWrap").style.backgroundImage="url(./images/game/game1_bg.png)";
		document.getElementById("suggestionBar").style.display="none";
	}
}
//找到肉圓
function meatballfound(){
	document.getElementById("meatball_in_game1").src="./images/game/meatball_chosen.png";
	document.getElementById("meatballText").style.color="#888888";
	count+=1;
	if(count==3){
		document.getElementById("game_coupon_wrap").style.display="block";
		document.getElementById("GameWrap").style.backgroundImage="url(./images/game/game1_bg.png)";
		document.getElementById("suggestionBar").style.display="none";
	}
	
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
}

//優惠券提示
function getSuggestion(){
	var taro= document.getElementById("taro_in_game1");
	if(taro.src.match('chosen')){
		console.log("taro");
	}
}


function init(){
	document.getElementById("game_playbtn").onclick = gameStart;
	document.getElementById("taro_in_game1").onclick = Tarofound;
	document.getElementById("grassrice_in_game1").onclick = grassricefound;
	document.getElementById("meatball_in_game1").onclick = meatballfound;
	document.getElementById("game_close").onclick = gameClose;	
	document.getElementById("game_suggestion").onclick = getSuggestion;	
}

window.onload=init;