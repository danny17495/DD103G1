/*第一支程式: 切換步驟窗格
	.postRight操作畫面裡的上一步和下一步按鈕, 10個窗格總共8顆
	點擊時需要(1)切換postRight  (2)切換步驟的黃底postStepYellow*/

//建立html連結:按鈕
let pDIYBtn1 = document.getElementById("postDIYBtn_1_Next");
let pDIYBtn2 = document.getElementById("postDIYBtn_2_Back");
let pDIYBtn3 = document.getElementById("postDIYBtn_3_Next");
let pDIYBtn4 = document.getElementById("postDIYBtn_4_Back");
let pDIYBtn5 = document.getElementById("postDIYBtn_5_Next");
let pDIYBtn6 = document.getElementById("postDIYBtn_6_Back");
let pDIYBtn7 = document.getElementById("postDIYBtn_7_Next");
let pDIYBtn8 = document.getElementById("postDIYBtn_8_Back");
//console.log(postDIYBtn_1_Next);


//建立html連結:操作視窗div.postRight
let pr1 = document.getElementById("postRight_1");
let pr2 = document.getElementById("postRight_2");
let pr3 = document.getElementById("postRight_3");
let pr4 = document.getElementById("postRight_4");
let pr5 = document.getElementById("postRight_5");

//建立html連結:步驟黃底
let postStepYellow1 = document.getElementById("postStepYellow1");
let postStepYellow2 = document.getElementById("postStepYellow2");
let postStepYellow3 = document.getElementById("postStepYellow3");
let postStepYellow4 = document.getElementById("postStepYellow4");
let postStepYellow5 = document.getElementById("postStepYellow5");
let postStepYellowB1 = document.getElementById("postStepYellowBig1");
let postStepYellowB2 = document.getElementById("postStepYellowBig2");
let postStepYellowB3 = document.getElementById("postStepYellowBig3");
let postStepYellowB4 = document.getElementById("postStepYellowBig4");
let postStepYellowB5 = document.getElementById("postStepYellowBig5");



function toPR1(){
	pr1.style.display = "block";			
	pr2.style.display = "none";			
	pr3.style.display = "none";			
	pr4.style.display = "none";			
	pr5.style.display = "none";		

	postStepYellow1.classList.add("postStepYellowHere");
	postStepYellow2.classList.remove("postStepYellowHere");
	postStepYellow3.classList.remove("postStepYellowHere");
	postStepYellow4.classList.remove("postStepYellowHere");
	postStepYellow5.classList.remove("postStepYellowHere");

	postStepYellowB1.classList.add("postStepYellowHere");
	postStepYellowB2.classList.remove("postStepYellowHere");
	postStepYellowB3.classList.remove("postStepYellowHere");
	postStepYellowB4.classList.remove("postStepYellowHere");
	postStepYellowB5.classList.remove("postStepYellowHere");
}

function toPR2(){
	pr1.style.display = "none";			
	pr2.style.display = "block";			
	pr3.style.display = "none";			
	pr4.style.display = "none";			
	pr5.style.display = "none";		

	postStepYellow1.classList.remove("postStepYellowHere");
	postStepYellow2.classList.add("postStepYellowHere");
	postStepYellow3.classList.remove("postStepYellowHere");
	postStepYellow4.classList.remove("postStepYellowHere");
	postStepYellow5.classList.remove("postStepYellowHere");

	postStepYellowB1.classList.remove("postStepYellowHere");
	postStepYellowB2.classList.add("postStepYellowHere");
	postStepYellowB3.classList.remove("postStepYellowHere");
	postStepYellowB4.classList.remove("postStepYellowHere");
	postStepYellowB5.classList.remove("postStepYellowHere");
}

function toPR3(){
	pr1.style.display = "none";			
	pr2.style.display = "none";			
	pr3.style.display = "block";			
	pr4.style.display = "none";			
	pr5.style.display = "none";

	postStepYellow1.classList.remove("postStepYellowHere");
	postStepYellow2.classList.remove("postStepYellowHere");
	postStepYellow3.classList.add("postStepYellowHere");
	postStepYellow4.classList.remove("postStepYellowHere");
	postStepYellow5.classList.remove("postStepYellowHere");	

	postStepYellowB1.classList.remove("postStepYellowHere");
	postStepYellowB2.classList.remove("postStepYellowHere");
	postStepYellowB3.classList.add("postStepYellowHere");
	postStepYellowB4.classList.remove("postStepYellowHere");
	postStepYellowB5.classList.remove("postStepYellowHere");
}

function toPR4(){
	pr1.style.display = "none";			
	pr2.style.display = "none";			
	pr3.style.display = "none";			
	pr4.style.display = "block";			
	pr5.style.display = "none";	

	postStepYellow1.classList.remove("postStepYellowHere");
	postStepYellow2.classList.remove("postStepYellowHere");
	postStepYellow3.classList.remove("postStepYellowHere");
	postStepYellow4.classList.add("postStepYellowHere");
	postStepYellow5.classList.remove("postStepYellowHere");

	postStepYellowB1.classList.remove("postStepYellowHere");
	postStepYellowB2.classList.remove("postStepYellowHere");
	postStepYellowB3.classList.remove("postStepYellowHere");
	postStepYellowB4.classList.add("postStepYellowHere");
	postStepYellowB5.classList.remove("postStepYellowHere");			
}

function toPR5(){
	pr1.style.display = "none";			
	pr2.style.display = "none";			
	pr3.style.display = "none";			
	pr4.style.display = "none";			
	pr5.style.display = "block";			

	postStepYellow1.classList.remove("postStepYellowHere");
	postStepYellow2.classList.remove("postStepYellowHere");
	postStepYellow3.classList.remove("postStepYellowHere");
	postStepYellow4.classList.remove("postStepYellowHere");
	postStepYellow5.classList.add("postStepYellowHere");

	postStepYellowB1.classList.remove("postStepYellowHere");
	postStepYellowB2.classList.remove("postStepYellowHere");
	postStepYellowB3.classList.remove("postStepYellowHere");
	postStepYellowB4.classList.remove("postStepYellowHere");
	postStepYellowB5.classList.add("postStepYellowHere");
}



function postcardInit(){

	pDIYBtn1.addEventListener("click", toPR2, false);	//at postRight_1

	pDIYBtn2.addEventListener("click", toPR1, false);	//at postRight_2
	pDIYBtn3.addEventListener("click", toPR3, false);	//at postRight_2

	pDIYBtn4.addEventListener("click", toPR2, false);	//at postRight_3
	pDIYBtn5.addEventListener("click", toPR4, false);	//at postRight_3

	pDIYBtn6.addEventListener("click", toPR3, false);	//at postRight_4
	pDIYBtn7.addEventListener("click", toPR5, false);	//at postRight_4

	pDIYBtn8.addEventListener("click", toPR4, false);	//at postRight_5

}

window.addEventListener("load", postcardInit, false);





/*======================================================================*/
/*第二支程式: 操作畫面步驟一(換背景)*/

//建立html連結:背景圖
let aapostBGC_1 = document.getElementById("aapostBGC_1");
let aapostBGC_2 = document.getElementById("aapostBGC_2");
let aapostBGC_3 = document.getElementById("aapostBGC_3");
let aauploadBGC = document.getElementById("aauploadBGC");
// console.log(aapostBGC_1);


//建立html連結:demo畫面, 第三支程式裡有用postcardCanvas抓一個Fabric.js的畫布
let canvas2 = document.getElementById("postcardCanvas");

//背景1
function aaPostcardChangeBGI_1(){
	canvas2.style.backgroundImage = "url(images/postcard/pBgiPic_1.jpg)";

	aapostBGC_1.classList.add("aapostBGC_1_Selected");
	aapostBGC_2.classList.remove("aapostBGC_2_Selected");
	aapostBGC_3.classList.remove("aapostBGC_3_Selected");
	aauploadBGC.classList.remove("aauploadBGC_Selected");
}

//背景2
function aaPostcardChangeBGI_2(){
	canvas2.style.backgroundImage = "url(images/postcard/pBgiPic_2.jpg)";

	aapostBGC_1.classList.remove("aapostBGC_1_Selected");
	aapostBGC_2.classList.add("aapostBGC_2_Selected");
	aapostBGC_3.classList.remove("aapostBGC_3_Selected");
	aauploadBGC.classList.remove("aauploadBGC_Selected");
}

//背景3
function aaPostcardChangeBGI_3(){
	canvas2.style.backgroundImage = "url(images/postcard/pBgiPic_3.jpg)";

	aapostBGC_1.classList.remove("aapostBGC_1_Selected");
	aapostBGC_2.classList.remove("aapostBGC_2_Selected");
	aapostBGC_3.classList.add("aapostBGC_3_Selected");
	aauploadBGC.classList.remove("aauploadBGC_Selected");
}

//上傳窗格
function aaPostcardChangeuploadBGI(){
	// canvas2.style.backgroundImage = "url(images/postcard/pBgiPic_1.jpg)";

	aapostBGC_1.classList.remove("aapostBGC_1_Selected");
	aapostBGC_2.classList.remove("aapostBGC_2_Selected");
	aapostBGC_3.classList.remove("aapostBGC_3_Selected");
	aauploadBGC.classList.add("aauploadBGC_Selected");
}

function postcardInit2(){
	aapostBGC_1.addEventListener("click", aaPostcardChangeBGI_1, false);
	aapostBGC_2.addEventListener("click", aaPostcardChangeBGI_2, false);
	aapostBGC_3.addEventListener("click", aaPostcardChangeBGI_3, false);
	aauploadBGC.addEventListener("click", aaPostcardChangeuploadBGI, false);
}

window.addEventListener("load", postcardInit2, false);




/*======================================================================*/
/*第三支程式: canvas--客製主畫面+ Fabric.js*/
/*======三-1.基礎:html建立連結======*/
//html建立連結抓canvas
let postcardCanvas = new fabric.Canvas('postcardCanvas',{

	isDrawingMode: false, // 設置成 true 一秒變身小畫家
	hoverCursor: 'progress', // 移動時鼠標顯示
	freeDrawingCursor: 'all-scroll', // 畫畫模式時鼠標模式

});


/*======三-2.使canvas畫布可以跟隨RWD======*/
/*==三-2-(1).無條件先做一次==*/
console.log("hi^_^2");
//抓父層RWD之後的大小去設定畫布大小
var postFather = document.getElementById("postWhiteBack");
var postcardCanvasW = postFather.offsetWidth - 20;
var postcardCanvasH = (postFather.offsetWidth - 20) * 350 / 530;
// console.log(postcardCanvasW);
// console.log(postcardCanvasH);

postcardCanvas.setWidth( postcardCanvasW );
postcardCanvas.setHeight( postcardCanvasH );
// postcardCanvas.calcOffset();  //三小??

postcardCanvas.setHeight( postcardCanvasH );



/*==三-2-(2).視窗risize時就重新偵測==*/
function postcardInit3(){
	console.log("hi^_^1");
	var postFather = document.getElementById("postWhiteBack");
	var postcardCanvasW = postFather.offsetWidth - 20;
	var postcardCanvasH = (postFather.offsetWidth - 20) * 350 / 530;

	postcardCanvas.setWidth( postcardCanvasW );
	postcardCanvas.setHeight( postcardCanvasH );

}

window.addEventListener("resize", postcardInit3, false);


/*======三-3.插入貼圖(步驟二跟四)======*/
/*設定全部物件控制的樣式*/
fabric.Object.prototype.set({
	  transparentCorners: false,
	  borderColor: 'rgb(156, 20, 24)', // 邊框顏色
	  cornerColor: 'rgb(156, 20, 24)', // 控制點填滿色
	  cornerSize: 10, // 控制點大小
	  cornerStrokeColor: 'white', // 控制點邊框色
	  padding: 10,
	  borderDashArray: [5, 5],
	  cornerStyle: 'circle',
})



//建立html連結:按鈕
let postDecoFood_1 = document.getElementById("postDecoFood_1");
let postDecoFood_2 = document.getElementById("postDecoFood_2");
let postDecoFood_3 = document.getElementById("postDecoFood_3");
let postDecoMark_1 = document.getElementById("postDecoMark_1");
let postDecoMark_2 = document.getElementById("postDecoMark_2");


function newFood_1(){
	fabric.Image.fromURL('images/postcard/postDeco-1.png', (img) => {
	  	const oImg = img.set({
		      left: 20,
		      top: 20,
		      width: 125,
		      height: 142,
	  	})
	  	postcardCanvas.add(oImg) // 加進canvas
	})
}


function newFood_2(){
	fabric.Image.fromURL('images/postcard/postDeco-2.png', (img) => {
	  const oImg = img.set({
	      left: 120,
	      top: 60,
	      width: 174,
	      height: 115,
	  })
	  postcardCanvas.add(oImg) // 加進canvas
	})


}

function newFood_3(){
	fabric.Image.fromURL('images/postcard/postDeco-3.png', (img) => {
	  const oImg = img.set({
	      left: 120,
	      top: 60,
	      width: 174,
	      height: 115,
	  })
	  postcardCanvas.add(oImg) // 加進canvas
	})

}

function newMark_1(){
	fabric.Image.fromURL('images/postcard/postDeco-rect-1.png', (img) => {
	  const oImg = img.set({
	      left: 60,
	      top: 60,
	      width: 150,
	      height: 150,
	  })
	  postcardCanvas.add(oImg) // 加進canvas
	})
}

function newMark_2(){
	fabric.Image.fromURL('images/postcard/postDeco-rect-2.png', (img) => {
	  const oImg = img.set({
	      left: 60,
	      top: 60,
	      width: 150,
	      height: 150,
	  })
	  postcardCanvas.add(oImg) // 加進canvas
	})

}

function postcardInit4(){
	console.log("hi^_^3");
	postDecoFood_1.addEventListener("click", newFood_1, false);
	postDecoFood_2.addEventListener("click", newFood_2, false);
	postDecoFood_3.addEventListener("click", newFood_3, false);
	postDecoMark_1.addEventListener("click", newMark_1, false);
	postDecoMark_2.addEventListener("click", newMark_2, false);
}

window.addEventListener("load", postcardInit4, false);




// if(postcardCanvas.getActiveObject()){
// 	postcardCanvas.remove(postcardCanvas.getActiveObject());	
// }

// mouse:dblclick
// 點擊事件
// let colorToggle = false
postcardCanvas.on('mouse:dblclick', e => {
  console.log(e)
  const active = e.target
  if (active) {
    // active.set({ fill: colorToggle ? 'red' : 'blue' })
    // colorToggle = !colorToggle
    postcardCanvas.remove(active);
    postcardCanvas.renderAll();
  }
})



/*======三-4.寫文字(步驟三)======*/
/*三-4-1.點擊顏色更換*/
//建立html連結:註冊顏色按鈕
var postcardTextColor1 = document.getElementById("postcardTextColor1");
var postcardTextColor2 = document.getElementById("postcardTextColor2");
var postcardTextColor3 = document.getElementById("postcardTextColor3");
var postcardTextColor4 = document.getElementById("postcardTextColor4");

/*切換顏色*/
function postcardTextColorChoose_1(){
	postcardTextColor1.classList.add("postcardTextColorSelected");
	postcardTextColor2.classList.remove("postcardTextColorSelected");
	postcardTextColor3.classList.remove("postcardTextColorSelected");
	postcardTextColor4.classList.remove("postcardTextColorSelected");
}

function postcardTextColorChoose_2(){
	postcardTextColor1.classList.remove("postcardTextColorSelected");
	postcardTextColor2.classList.add("postcardTextColorSelected");
	postcardTextColor3.classList.remove("postcardTextColorSelected");
	postcardTextColor4.classList.remove("postcardTextColorSelected");
}

function postcardTextColorChoose_3(){
	postcardTextColor1.classList.remove("postcardTextColorSelected");
	postcardTextColor2.classList.remove("postcardTextColorSelected");
	postcardTextColor3.classList.add("postcardTextColorSelected");
	postcardTextColor4.classList.remove("postcardTextColorSelected");
}

function postcardTextColorChoose_4(){
	postcardTextColor1.classList.remove("postcardTextColorSelected");
	postcardTextColor2.classList.remove("postcardTextColorSelected");
	postcardTextColor3.classList.remove("postcardTextColorSelected");
	postcardTextColor4.classList.add("postcardTextColorSelected");
}




$("html").hasClass("no-js")



/*三-4-2.按下按鈕會生字*/
//建立html連結:按鈕
var newTextBtn = document.getElementById("newTextBtn");

function newText(){
	console.log("hi^_^4, 輸入文字函式newText");

	//建立html連結:抓取文字盒內容(注意抓input值的要寫在函式裡面, 通常打完才會按按鈕抓取文字)
	var postcardText = document.getElementById("postcardText");
	var realText = postcardText.value;

	//fabric文字
	const Text_1 = new fabric.Text(realText, {
		left: 40,
		top: 120,
	  	fill: 'white',
	  	fontSize: 40,
	  	fontFamily: '微軟正黑體',
	})
	postcardCanvas.add(Text_1);
}

function postcardInit5(){
	newTextBtn.addEventListener("click", newText, false);
	postcardTextColor1.addEventListener("click", postcardTextColorChoose_1, false);
	postcardTextColor2.addEventListener("click", postcardTextColorChoose_2, false);
	postcardTextColor3.addEventListener("click", postcardTextColorChoose_3, false);
	postcardTextColor4.addEventListener("click", postcardTextColorChoose_4, false);
}

window.addEventListener("load", postcardInit5, false);







// const iText111 = new fabric.IText('雙擊我編輯', {
//   left: 0,
//   top: 120,
//   fill: 'white',
//   fontSize: 40,
// })
// postcardCanvas.add(iText111);

// const iText = new fabric.IText('雙擊我編輯', {
//   left: 0,
//   top: 120,
//   fill: 'white',
//   fontSize: 40,
//   fontFamily: '微軟正黑體',
// })
// postcardCanvas.add(iText);

// var aa='Hello';
// // var bb='white'; //顏色不能帶變數,用if判斷寫

// const text = new fabric.Text(aa, {
//   left: 0,
//   top: 80,
//   fill: 'rgb(178, 100, 102)',
// })
// postcardCanvas.add(text)


// var itext = new fabric.IText('This is a IText object', {
// 	left: 100,
// 	top: 150,
// 	fill: '#D81B60',
// 	strokeWidth: 2,
// 	stroke: "#880E4F",
// });





