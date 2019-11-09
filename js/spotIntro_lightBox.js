//trip2
function showTrip2Box1(){
	document.getElementById("Trip2_lightBox01").style.display="block";
}
function showTrip2Box2(){
	document.getElementById("Trip2_lightBox02").style.display="block";
}
function showTrip2Box3(){
	document.getElementById("Trip2_lightBox03").style.display="block";
}
function closeTrip2Box1(){
	document.getElementById("Trip2_lightBox01").style.display="none";
}
function closeTrip2Box2(){
	document.getElementById("Trip2_lightBox02").style.display="none";
}
function closeTrip2Box3(){
	document.getElementById("Trip2_lightBox03").style.display="none";
}
//trip3
function showTrip3Box1(){
	document.getElementById("Trip3_lightBox01").style.display="block";
}
function showTrip3Box2(){
	document.getElementById("Trip3_lightBox02").style.display="block";
}
function closeTrip3Box1(){
	document.getElementById("Trip3_lightBox01").style.display="none";
}
function closeTrip3Box2(){
	document.getElementById("Trip3_lightBox02").style.display="none";
}


function init(){
//trip2
	document.getElementById("Trip2_BTN01").onclick= showTrip2Box1;
	document.getElementById("Trip2_BTN02").onclick= showTrip2Box2;
	document.getElementById("Trip2_BTN03").onclick= showTrip2Box3;
	document.getElementById("Trip2_lightBoxBTN01").onclick= closeTrip2Box1;
	document.getElementById("Trip2_lightBoxBTN02").onclick= closeTrip2Box2;
	document.getElementById("Trip2_lightBoxBTN03").onclick= closeTrip2Box3;
//trip3
	document.getElementById("Trip3_BTN01").onclick= showTrip3Box1;
	document.getElementById("Trip3_BTN02").onclick= showTrip3Box2;
	document.getElementById("Trip3_BTN03").onclick= showTrip2Box3;
	document.getElementById("Trip3_lightBoxBTN01").onclick= closeTrip3Box1;
	document.getElementById("Trip3_lightBoxBTN02").onclick= closeTrip3Box2;
}

window.onload=init;