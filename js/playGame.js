//控制game1 or game2
var count=0;
var num=Math.floor((Math.random()*2))+1;

//判斷螢幕大小
var screenWidth= screen.width;

//遊戲開始，變更背景明度、出現尋找物品
function gameStart(){
	console.log(num);
	if(num==1){
		document.getElementById("GameWrap").style.backgroundImage="url(./images/game/game1_start_bg.png)";
		document.getElementById("game1").style.display="block";
	}else{
		document.getElementById("GameWrap").style.backgroundImage="url(./images/game/game2_start_bg.jpg)";
		document.getElementById("game2").style.display="block";
	}
	
	if(screenWidth<768 && num==1){
		document.getElementById("GameWrap").style.backgroundImage="url(./images/game/game1_start_bg_mobile.png)";
	}else if(screenWidth<768 && num==2){
		document.getElementById("GameWrap").style.backgroundImage="url(./images/game/game2_start_bg_mobile.jpg)";
	}
	document.getElementById("game_playbtn").style.display="none";
	document.getElementById("suggestionBar").style.display="block";
	
}

//找到芋圓
function Tarofound(){
	console.log(num);
	if(num==1){
		document.getElementById("taro_in_game1").src="./images/game/taro_chosen.png";
		document.getElementById("taro_in_game1_after").style.display="none";
		document.getElementById("taro_in_game1").style.pointerEvents="none";
	}else{
		document.getElementById("taro_in_game2").src="./images/game/taro_chosen.png";
		document.getElementById("taro_in_game2_after").style.display="none";
		document.getElementById("taro_in_game2").style.pointerEvents="none";
	}
	document.getElementById("taroText").style.color="#888888";
	count+=1;
	if(count==3){
		setTimeout(allfound, 400);
	}
}
//找到草仔粿
function grassricefound(){
	if(num==1){
		document.getElementById("grassrice_in_game1").src="./images/game/grassrice_chosen.png";
		document.getElementById("grassrice_in_game1_after").style.display="none";
		document.getElementById("grassrice_in_game1").style.pointerEvents="none";
	}else{
		document.getElementById("grassrice_in_game2").src="./images/game/grassrice_chosen.png";
		document.getElementById("grassrice_in_game2_after").style.display="none";
		document.getElementById("grassrice_in_game2").style.pointerEvents="none";
	}

	document.getElementById("grassriceText").style.color="#888888";
	count+=1;
	if(count==3){
		setTimeout(allfound, 400);
	}
}
//找到肉圓
function meatballfound(){
	if(num==1){
		document.getElementById("meatball_in_game1").src="./images/game/meatball_chosen.png";
		document.getElementById("meatball_in_game1_after").style.display="none";
		document.getElementById("meatball_in_game1").style.pointerEvents="none";
	}else{
		document.getElementById("meatball_in_game2").src="./images/game/meatball_chosen.png";
		document.getElementById("meatball_in_game2_after").style.display="none";
		document.getElementById("meatball_in_game2").style.pointerEvents="none";
	}
	
	document.getElementById("meatballText").style.color="#888888";
	count+=1;
	if(count==3){
		setTimeout(allfound, 400);
	}
	}
//三個都找到後顯示優惠券
function allfound(){
	//隨機顯示面額
	var coupArr=["./images/game/coupon_5.jpg","./images/game/coupon_10.jpg"];
	var n=Math.floor((Math.random()*2));
	// console.log(n);

	document.getElementById("game_coupon").src=coupArr[n];
	if(n==0){
                document.getElementById("game_form5").style.display="block";
                document.getElementById("game_form10").style.display="none";
                document.getElementById("game_getCoupon").style.display="block";
                console.log("hi");
             }else if(n==1){
             	document.getElementById("game_form5").style.display="none";
             	document.getElementById("game_form10").style.display="block";
             	document.getElementById("game_getCoupon2").style.display="block";
             }; 
	document.getElementById("game_coupon_wrap").style.display="block";
	document.getElementById("GameWrap").style.backgroundImage="url(./images/game/game1_bg.png)";
	document.getElementById("suggestionBar").style.display="none";
	document.getElementById("game1").style.display="none";
	document.getElementById("game2").style.display="none";

	  
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
	if(num==1){
		var taro= document.getElementById("taro_in_game1");
		var grassrice= document.getElementById("grassrice_in_game1");
	}else{
		var taro= document.getElementById("taro_in_game2");
		var grassrice= document.getElementById("grassrice_in_game2");
	}

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
	if(num==1){
		document.getElementById("taro_in_game1_after").style.display="block";
	}else{
		document.getElementById("taro_in_game2_after").style.display="block";
	}
	document.getElementById("taro_suggestion").style.display="none";	
}

//關閉草仔粿優惠券提示
function closeGrassriceSuggestion(){
	if(num==1){
		document.getElementById("grassrice_in_game1_after").style.display="block";
	}else{
		document.getElementById("grassrice_in_game2_after").style.display="block";
	}
	document.getElementById("grassrice_suggestion").style.display="none";
}

//關閉肉圓優惠券提示
function closeMeatballSuggestion(){
	if(num==1){
		document.getElementById("meatball_in_game1_after").style.display="block";
	}else{
		document.getElementById("meatball_in_game2_after").style.display="block";
	}
	document.getElementById("meatball_suggestion").style.display="none";
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
	document.getElementById("taro_in_game2").onclick = Tarofound;
	document.getElementById("grassrice_in_game2").onclick = grassricefound;
	document.getElementById("meatball_in_game2").onclick = meatballfound;

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

    //當螢幕小於768時
	console.log(screenWidth);
	if(screenWidth<768){

	}
}

window.onload=init;