/*一. 撈取LocalStorage確認放入購物車的資料*/
var addPostcardString = localStorage.getItem('addPostcard:');    // var itemString = storage['addItemList'];
var postcardArr, postcardNum = 0;  //postcardNum加入購物車幾個明信片
if(addPostcardString != null){
    postcardArr = addPostcardString.substr(0,addPostcardString.length-2).split(', ');
    postcardNum = postcardArr.length;  //加入購物車幾個明信片
}
// console.log(postcardArr);     //(2) ["1", "3"]
// console.log(postcardNum);

var addShopItemString = localStorage.getItem('addShopItem:');    // var itemString = storage['addItemList'];
var shopItemArr, shopItemNum = 0;  //shopItemNum加入購物車幾個商城商品
if(addShopItemString != null){
    shopItemArr = addShopItemString.substr(0,addShopItemString.length-2).split(', ');
    shopItemNum = shopItemArr.length;  //加入購物車幾個
}


/*三.for折扣卷初始設定*/
//使用折扣卷前的未加運費金額
var PriceTotalDiscountBefore = 0;
//紀錄前次使用折扣卷
var couponSelect = document.getElementById("chooseCoupon");
var index = couponSelect.selectedIndex;    //選中
var chooseCouponValue = couponSelect.options[index].value;    //選中的值  
chooseCouponValue = parseInt(chooseCouponValue);
var chooseCouponValueNow = 0;
// console.log("外部變數紀錄的預設折扣值", chooseCouponValue);


/*二. 動態生成, 還是會生成兩種結構*/
function shopcartInitPage2_1(){

    //1.如果有買明信片就產生結構.newRow, `cartRow cartRow${i}`
    if(postcardNum >= 1 && postcardArr[0] != [""]){
        for(var key in postcardArr){
            // console.log(key);
            // console.log(postcardArr[key]);

            //處理照片資料及整列id命名
            var picName = postcardArr[key];
            var itemId = `pc${picName}`;
            itemImage = `images/postcardClient/${picName}.jpg`;

            //數量及小計
            var itemStorage = `明信片(編號, 商品數量, 商品小計)編號${picName}`
            var itemString = localStorage.getItem(itemStorage);
            console.log(itemString);
			var itemStringArr = itemString.substr(0,itemString.length-2).split(', ');
			// console.log(itemStringArr[0]);  //編號
			// console.log(itemStringArr[1]);  //數量
			// console.log(itemStringArr[2]);  //小計
			var itemNum = itemStringArr[1];
			var itemTotal = itemStringArr[2];

            createPostcardListPage2(itemId, itemImage, itemNum, itemTotal);

        }
    }

    //2.如果有買商城商品就產生結構.newRow(資料不同於明信片商品), `cartRow cartRow${j}`
    if(shopItemNum >= 1 && shopItemArr[0] != [""]){
        for(var key in shopItemArr){
            // console.log(key);
            // console.log(shopItemArr[key]);

            // 處理照片資料及整列id命名
            var picName = shopItemArr[key];
            var itemId = `si${picName}`;
            itemImage = `images/shopcart/shopItemClient/${picName}.png`;

            // 商城商品價格有3種
            var itemPrice;
            if(picName==1 || picName==2 || picName==3 || picName==10 || picName==11 || picName==12){
                itemPrice = 450;
            }else if(picName==4 || picName==5 || picName==6 || picName==13 || picName==14 || picName==15){
                itemPrice = 550;
            }else{
                itemPrice = 650;
            }

            // 商城商品名稱有2種
            var itemName;
            if(picName < 10){
                itemName = "客製化馬克杯";
            }else{
                itemName = "客製化T-shirt";
            }


            //數量及小計
            var itemStorage = `商城商品(編號, 商品數量, 商品小計)編號${picName}`
            var itemString = localStorage.getItem(itemStorage);
            // console.log(itemString);
			var itemStringArr = itemString.substr(0,itemString.length-2).split(', ');
			// console.log(itemStringArr[0]);  //編號
			// console.log(itemStringArr[1]);  //數量
			// console.log(itemStringArr[2]);  //小計
			var itemNum = itemStringArr[1];
			var itemTotal = itemStringArr[2];

            createShopItemListPage2(itemId, itemImage, itemPrice, itemNum, itemTotal, itemName);
        }
    }

    //生成折扣卷
    cartMemCoupon();
}


/*二-1. 明信片商品動態生成*/
var i=1;
var postcardTotal1 = 0;
function createPostcardListPage2(itemId, itemImage, itemNum, itemTotal){
    // console.log(itemImage);

    //#bornItemList1 > .cartOrderRow, 產生一列cartOrderRow並且命名
    var newDiv = document.createElement('div');
    var innerDiv = document.createElement('div');            

    var newRow = document.getElementById('bornItemList1').appendChild(newDiv);            
    newRow.className = `cartOrderRow cartOrderRow${i} cartRowOrderPost cartRowOrderPost${itemId}`;

    //1.生成圖片結構
    var newDivPic = document.createElement('div');
    newRow.appendChild(newDivPic);
    newDivPic.className = `cartRowPic`;
    //RWD伸縮盒
    var newDivPicPostcard = document.createElement('div');
    newDivPic.appendChild(newDivPicPostcard);
    newDivPicPostcard.className = `cartPicPostcard`;
    //圖片本人
    var newImgPicPostcard = document.createElement('img');
    newDivPicPostcard.appendChild(newImgPicPostcard);
    newImgPicPostcard.src = itemImage;
  

    //2.生成文字結構
    var cartRowDetail = document.createElement('div');
    newRow.appendChild(cartRowDetail);
    cartRowDetail.className = `cartRowDetail`;
        //2-1.名稱
        var cartRowDetailName = document.createElement('div');
        cartRowDetail.appendChild(cartRowDetailName);
        cartRowDetailName.className = `cartRowDetailName`;
        //RWD小畫面出現的文字
        var cartRowSmallSizeApear1 = document.createElement('span');
        cartRowDetailName.appendChild(cartRowSmallSizeApear1);
        cartRowSmallSizeApear1.className = `cartRowSmallSizeApear`;
        cartRowSmallSizeApear1.innerText = '名稱：';
        //文字
        var cartRowSpan1 = document.createElement('span');
        cartRowDetailName.appendChild(cartRowSpan1);
        cartRowSpan1.innerText = '客製化明信片';

        //2-2.單價
        var cartRowDetailPrice = document.createElement('div');
        cartRowDetail.appendChild(cartRowDetailPrice);
        cartRowDetailPrice.className = `cartRowDetailPrice`;
        //RWD小畫面出現的文字
        var cartRowSmallSizeApear2 = document.createElement('span');
        cartRowDetailPrice.appendChild(cartRowSmallSizeApear2);
        cartRowSmallSizeApear2.className = `cartRowSmallSizeApear`;
        cartRowSmallSizeApear2.innerText = '單價：';
        //文字
        var cartRowSpan2 = document.createElement('span');
        cartRowDetailPrice.appendChild(cartRowSpan2);
        cartRowSpan2.innerText = 'NT$60';

        //2-3.數量
        var cartRowDetailNum = document.createElement('div');
        cartRowDetail.appendChild(cartRowDetailNum);
        cartRowDetailNum.className = `cartRowDetailNum`;
        //RWD小畫面出現的文字
        var cartRowSmallSizeApear3 = document.createElement('span');
        cartRowDetailNum.appendChild(cartRowSmallSizeApear3);
        cartRowSmallSizeApear3.className = `cartRowSmallSizeApear`;
        cartRowSmallSizeApear3.innerText = '數量：';
        //文字
        var cartRowSpan3 = document.createElement('span');
        cartRowDetailNum.appendChild(cartRowSpan3);
        cartRowSpan3.innerText = `${itemNum}`;

        //2-4.小計
        var cartRowDetailSubtotal = document.createElement('div');
        cartRowDetail.appendChild(cartRowDetailSubtotal);
        cartRowDetailSubtotal.className = `cartRowDetailSubtotal`;
        //RWD小畫面出現的文字
        var cartRowSmallSizeApear4 = document.createElement('span');
        cartRowDetailSubtotal.appendChild(cartRowSmallSizeApear4);
        cartRowSmallSizeApear4.className = `cartRowSmallSizeApear`;
        cartRowSmallSizeApear4.innerText = '小計：';
        //文字
        var cartRowSpan4 = document.createElement('span');
        cartRowDetailSubtotal.appendChild(cartRowSpan4);
        cartRowSpan4.innerText = `NT$${itemTotal}`;   //`NT$${itemNum*60}`
        cartRowSpan4.id = `cartItemTotal${itemId}`;


    //3.清除浮動div
    var clearfix = document.createElement('div');
    newRow.appendChild(clearfix);
    clearfix.className = `clearfix`;


    /*初始價格*/
    postcardTotal1 += parseInt(itemTotal);
    var cartPriceTotal1 = document.getElementById('cartTotal');
    cartPriceTotal1.innerText = `NT$${postcardTotal1}`;
    var cartPriceTotal2 = document.getElementById('cartTotalFinal');
    cartPriceTotal2.innerText = `NT$${postcardTotal1+120}`;

    i++;


}



/*二-2. 商城商品動態生成*/
var j= postcardNum+1;
function createShopItemListPage2(itemId, itemImage, itemPrice, itemNum, itemTotal, itemName){
    console.log(itemImage);
    console.log(itemPrice);

    //#bornItemList1 > .cartRowShop, 產生一列cartRowShop並且命名
    var newDiv = document.createElement('div');
    var innerDiv = document.createElement('div');            

    var newRow = document.getElementById('bornItemList2').appendChild(newDiv);            
    newRow.className = `cartOrderRow cartOrderRow${j} cartOrderRowShop cartOrderRowShop${itemId}`;

    //1.生成圖片結構
    var newDivPic = document.createElement('div');
    newRow.appendChild(newDivPic);
    newDivPic.className = `cartRowPic`;
    //RWD伸縮盒
    var newDivPicPostcard = document.createElement('div');
    newDivPic.appendChild(newDivPicPostcard);
    newDivPicPostcard.className = `cartPicShopItem`;
    //圖片本人
    var newImgPicPostcard = document.createElement('img');
    newDivPicPostcard.appendChild(newImgPicPostcard);
    newImgPicPostcard.src = itemImage;
  
    //2.生成文字結構
    var cartRowDetail = document.createElement('div');
    newRow.appendChild(cartRowDetail);
    cartRowDetail.className = `cartRowDetail`;
        //2-1.名稱
        var cartRowDetailName = document.createElement('div');
        cartRowDetail.appendChild(cartRowDetailName);
        cartRowDetailName.className = `cartRowDetailName`;
        //RWD小畫面出現的文字
        var cartRowSmallSizeApear1 = document.createElement('span');
        cartRowDetailName.appendChild(cartRowSmallSizeApear1);
        cartRowSmallSizeApear1.className = `cartRowSmallSizeApear`;
        cartRowSmallSizeApear1.innerText = '名稱：';
        //文字
        var cartRowSpan1 = document.createElement('span');
        cartRowDetailName.appendChild(cartRowSpan1);
        cartRowSpan1.innerText = itemName;

        //2-2.單價
        var cartRowDetailPrice = document.createElement('div');
        cartRowDetail.appendChild(cartRowDetailPrice);
        cartRowDetailPrice.className = `cartRowDetailPrice`;
        //RWD小畫面出現的文字
        var cartRowSmallSizeApear2 = document.createElement('span');
        cartRowDetailPrice.appendChild(cartRowSmallSizeApear2);
        cartRowSmallSizeApear2.className = `cartRowSmallSizeApear`;
        cartRowSmallSizeApear2.innerText = '單價：';
        //文字
        var cartRowSpan2 = document.createElement('span');
        cartRowDetailPrice.appendChild(cartRowSpan2);
        cartRowSpan2.innerText = `NT$${itemPrice}`;

        //2-3.數量
        var cartRowDetailNum = document.createElement('div');
        cartRowDetail.appendChild(cartRowDetailNum);
        cartRowDetailNum.className = `cartRowDetailNum`;
        //RWD小畫面出現的文字
        var cartRowSmallSizeApear3 = document.createElement('span');
        cartRowDetailNum.appendChild(cartRowSmallSizeApear3);
        cartRowSmallSizeApear3.className = `cartRowSmallSizeApear`;
        cartRowSmallSizeApear3.innerText = '數量：';
        //文字
        var cartRowSpan3 = document.createElement('span');
        cartRowDetailNum.appendChild(cartRowSpan3);
    	cartRowSpan3.innerText = `${itemNum}`;

        //2-4.小計
        var cartRowDetailSubtotal = document.createElement('div');
        cartRowDetail.appendChild(cartRowDetailSubtotal);
        cartRowDetailSubtotal.className = `cartRowDetailSubtotal`;
        //RWD小畫面出現的文字
        var cartRowSmallSizeApear4 = document.createElement('span');
        cartRowDetailSubtotal.appendChild(cartRowSmallSizeApear4);
        cartRowSmallSizeApear4.className = `cartRowSmallSizeApear`;
        cartRowSmallSizeApear4.innerText = '小計：';
        //文字
        var cartRowSpan4 = document.createElement('span');
        cartRowDetailSubtotal.appendChild(cartRowSpan4);
        cartRowSpan4.innerText = `NT$${itemTotal}`;
        cartRowSpan4.id = `cartItemTotal${itemId}`;

    //4.清除浮動div
    var clearfix = document.createElement('div');
    newRow.appendChild(clearfix);
    clearfix.className = `clearfix`;

    /*初始價格*/
    var cartPriceTotal1 = document.getElementById('cartTotal');
    //處理字串取數字轉成數字做計算
    var oldTotal1 = cartPriceTotal1.innerText;
    var oldTotalMath1 = oldTotal1.replace('NT$', '')
    //按一次總計+商品價格itemPrice
    console.log(chooseCouponValue )
    cartPriceTotal1.innerText = 'NT$' + (parseInt(oldTotalMath1) + parseInt(itemTotal) - chooseCouponValue );

    var cartPriceTotal2 = document.getElementById('cartTotalFinal');
    cartPriceTotal2.innerText = 'NT$' + (parseInt(oldTotalMath1) + parseInt(itemTotal) - chooseCouponValue + 120);

    PriceTotalDiscountBefore = (parseInt(oldTotalMath1) + parseInt(itemTotal));

    j++;
}


window.addEventListener("load", shopcartInitPage2_1, false);



/*三.server取會員折扣卷資料*/
/*三-1.AJAX請求server取折扣卷資料*/
var holdingCouponString;
function cartMemCoupon(){
    var memNo = sessionStorage.getItem('memNo');
	document.getElementById("hidden_data").value = memNo;
            
	var formData1 = new FormData(document.getElementById("form1"));

	var xhr = new XMLHttpRequest();
	xhr.onload = function(){
	  if( xhr.status == 200){
		if(xhr.responseText == "error"){
		  	alert("Error");
		}else{
		  	// console.log(xhr.responseText);
			holdingCouponString = xhr.responseText;  //["5","10"] 是一個字串而已QQ 
			// var aa = typeof(holdingCoupon);
			// console.log(aa);

			//三-1-1.處理字串取得折扣卷金額=========================================
            if(holdingCouponString != null || holdingCouponString != [""]){
                console.log(holdingCouponString);
                var holdingCoupon = holdingCouponString.replace('["', '');
                holdingCoupon = holdingCoupon.replace(']', ',"');
                var holdingCoupon = holdingCoupon.substr(0,holdingCoupon.length-4).split('","');
                console.log(holdingCoupon);  //成功變成陣列
            }

			//三-1-2.持有張數
			holdingCouponNum = holdingCoupon.length;

			//三-1-3.按照持有張數生成下拉選項
		    if(holdingCouponNum >= 1 && holdingCoupon[0] != [""]){
                //如果有折扣卷移除無折扣卷的選項並且將selected壓在較大的面額上
                var chooseCoupon = document.getElementById("chooseCoupon");
                var couponValueZero = document.getElementById("CouponValueZero");     
                chooseCoupon.removeChild(couponValueZero);
		        for(var key in holdingCoupon){
		        	// 折扣卷面額
					var holdingCouponValue = holdingCoupon[`${key}`];
                    // console.log("1.使用者所持有的折扣卷面額", holdingCouponValue);
		        	createCouponInit(holdingCouponValue);
		        }

            console.log("5.外部變數紀錄的預設折扣值chooseCouponValue", chooseCouponValue);                
            /*初始價格*/
            var cartPriceTotal1 = document.getElementById('cartTotal');
            //處理字串取數字轉成數字做計算
            var oldTotal1 = cartPriceTotal1.innerText;
            var oldTotalMath1 = oldTotal1.replace('NT$', '')
            cartPriceTotal1.innerText = 'NT$' + (parseInt(oldTotalMath1));

            var cartPriceTotal2 = document.getElementById('cartTotalFinal');
            cartPriceTotal2.innerText = 'NT$' + (parseInt(oldTotalMath1) - chooseCouponValue + 120);

            document.getElementById("cartDiscount").innerText = `-NT$${chooseCouponValue}`;

            PriceTotalDiscountBefore = (parseInt(oldTotalMath1) - chooseCouponValue); 
		    }
		}
	  }else{
			alert(xhr.status)
	  }
	}
	xhr.open('POST', 'cartCoupon.php', true);
	// xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xhr.send(formData1);
}

/*三-2.按照陣列資料處理動態生成折扣卷*/
function createCouponInit(holdingCouponValue){
	// console.log("2.產生新的折扣卷面額", holdingCouponValue);
	var chooseCoupon = document.getElementById("chooseCoupon");
    var newOption = document.createElement('option');

    chooseCoupon.appendChild(newOption);
    newOption.value = `${holdingCouponValue}`;
    newOption.innerText = `NT$${holdingCouponValue}`;

    //將selected壓在較大的面額上
    if(holdingCouponValue > chooseCouponValue){
        chooseCouponValue = parseInt(holdingCouponValue);
        console.log("3.外部變數紀錄的預設折扣值chooseCouponValue", chooseCouponValue);
        newOption.setAttribute("selected","true");
    }

}


/*三-3.按照選取折扣卷產生折扣到金額總計計算*/
function shopcartInitPage2_2(){
    var couponSelect = document.getElementById("chooseCoupon");
    couponSelect.addEventListener("click", useCoupon, false);
}

//紀錄折扣值
function useCoupon(){
    var couponSelect = document.getElementById("chooseCoupon");
    var index = couponSelect.selectedIndex;    //選中
    chooseCouponValueNow = couponSelect.options[index].value;    //選中的值
    chooseCouponValueNow = parseInt(chooseCouponValueNow);

    console.log("使用者前次選擇的折扣金額", chooseCouponValue);
    console.log("使用者目前選擇的折扣金額", chooseCouponValueNow);

    if(chooseCouponValueNow != chooseCouponValue){
        console.log("6666.外部變數紀錄的預設折扣值chooseCouponValue", chooseCouponValue);                
        /*初始價格*/
        var cartPriceTotal2 = document.getElementById('cartTotalFinal');
        var oldTotal2 = cartPriceTotal2.innerText;
        var oldTotalMath2 = oldTotal2.replace('NT$', '')
        cartPriceTotal2.innerText = 'NT$' + (parseInt(oldTotalMath2) + chooseCouponValue - chooseCouponValueNow);

        document.getElementById("cartDiscount").innerText = `-NT$${chooseCouponValueNow}`;
        chooseCouponValue = chooseCouponValueNow;
    }
}

window.addEventListener("load", shopcartInitPage2_2, false);





/*四.AJAX存入訂單到資料庫*/
function orderCheck(){
    //2.收件姓名
    var shippingName = document.getElementById('shippingName').value;
    //3.收件手機
    var shippingPhone = document.getElementById('shippingPhone').value;
    //4.收件地址
    var shippingAddress = document.getElementById('shippingAddress').value;
    //5.信用卡帳號
    var cardNumber = document.getElementById('cardNumber').value;
    //6.信用卡有效期限
    var cardDateline = document.getElementById('cardDateline').value;
    //7.信用卡安全碼
    var cardSafenumber = document.getElementById('cardSafenumber').value;

    // console.log(shippingName);
    if(shippingName == ""){
        alert("請輸入收件姓名！");
    }else if(shippingPhone == ""){
        alert("請輸入收件手機號碼！");
    }else if(shippingAddress == ""){
        alert("請輸入收件地址！");
    }else if(cardNumber == ""){
        alert("請輸入信用卡帳號！");
    }else if(cardDateline == ""){
        alert("請輸入信用卡有效期限！");
    }else if(cardSafenumber == ""){
        alert("請輸入信用卡安全碼！");
    }else{
        //存入orderdetails的資料=========================================================
        //1.如果有買明信片就存cartPost陣列
        var cartPost = [], jsonStr =0;
        if(postcardNum >= 1 && postcardArr[0] != [""]){
            for(var key in postcardArr){
                console.log("11/22測試",key);

                //處理字串得到編號及數量及小計
                var itemId = postcardArr[key];

                var itemStorage = `明信片(編號, 商品數量, 商品小計)編號${itemId}`
                var itemString = localStorage.getItem(itemStorage);;
                var itemStringArr = itemString.substr(0,itemString.length-2).split(', ');

                var prodItem = {};
                prodItem.productType = '明信片';  //1.商品類別
                prodItem.orderItemNo = itemStringArr[0];  //2.商品編號
                prodItem.orderItemName = '客製化明信片';  //3.商品名稱
                prodItem.orderPrice = 60;  //4.商品價格
                prodItem.orderItemNum = itemStringArr[1];//5.商品數量
                prodItem.orderItemTotal = itemStringArr[2];  //6.單項商品小計
                prodItem.orderItemPic = `${itemId}.jpg`;  //7.商品圖片檔名
                // console.log("11/22測試", prodItem.orderItemTotal); 

                cartPost[key] = prodItem;
                // console.log("11/22測試", cartPost[key]);

            }
            jsonStr = JSON.stringify(cartPost);

            // console.log(typeof jsonStr);
        }

        //2.如果有買商城商品就存cartShop陣列
        var cartShop = [], jsonStr2=0;
        if(shopItemNum >= 1 && shopItemArr[0] != [""]){
            for(var key in shopItemArr){
                //處理字串得到編號及數量及小計
                var itemId = shopItemArr[key];

                var itemStorage = `商城商品(編號, 商品數量, 商品小計)編號${itemId}`
                var itemString = localStorage.getItem(itemStorage);
                var itemStringArr = itemString.substr(0,itemString.length-2).split(', ');

                // 商城商品價格有3種
                var itemPrice;
                if(itemId==1 || itemId==2 || itemId==3 || itemId==10 || itemId==11 || itemId==12){
                    itemPrice = 450;
                }else if(itemId==4 || itemId==5 || itemId==6 || itemId==13 || itemId==14 || itemId==15){
                    itemPrice = 550;
                }else{
                    itemPrice = 650;
                }

                // 商城商品名稱有2種
                var itemName;
                if(itemId < 10){
                    itemName = "客製化馬克杯";
                }else{
                    itemName = "客製化T-shirt";
                }

                var prodItem = {};
                prodItem.productType = '商城商品';  //1.商品類別
                prodItem.orderItemNo = itemStringArr[0];  //2.商品編號
                prodItem.orderItemName = itemName;  //3.商品名稱
                prodItem.orderPrice = itemPrice;  //4.商品價格
                prodItem.orderItemNum = itemStringArr[1];//5.商品數量
                prodItem.orderItemTotal = itemStringArr[2];  //6.單項商品小計
                prodItem.orderItemPic = `${itemId}.png`;  //7.商品圖片檔名
                // console.log("11/22測試", prodItem.orderItemTotal); 

                cartShop[key] = prodItem;
                // console.log("11/22測試", cartShop[key]);
                
            }
            jsonStr2 = JSON.stringify(cartShop);          
        }


        //存入orderform的資料=========================================================
        //1.總價
        var totalPrice = document.getElementById('cartTotalFinal').innerText;
        totalPrice = totalPrice.replace('NT$', '')
        totalPrice = parseInt(totalPrice);

        //9.會員編號
        var memNo = sessionStorage.getItem('memNo');

        // console.log(totalPrice)
        document.getElementById('hidden_data2').value = totalPrice;  //totalPrice
        document.getElementById('hidden_data3').value = shippingName;  //shippingName
        document.getElementById('hidden_data4').value = shippingPhone;  //shippingPhone
        document.getElementById('hidden_data5').value = shippingAddress;  //shippingAddress
        document.getElementById('hidden_data6').value = cardNumber;  //cardNumber
        document.getElementById('hidden_data7').value = cardDateline;  //cardDateline
        document.getElementById('hidden_data8').value = cardSafenumber;  //cardSafenumber
        document.getElementById('hidden_data9').value = memNo;  
        document.getElementById('hidden_cart').value = jsonStr;
        document.getElementById('hidden_cart2').value = jsonStr2;
        console.log("前台處js紀錄的memNo",memNo);
        orderSave();
    }
}

function orderSave(){
    var formData2 = new FormData(document.getElementById("form2"));

    var xhr = new XMLHttpRequest();
    xhr.onload = function(){
        if( xhr.status == 200){
            if(xhr.responseText == "error"){
                alert("Error");
            }else{
                console.log("------------");
                console.log(xhr.responseText);
                // alert(xhr.responseText);           
                alert("訂單成立");           
                var saveResult = xhr.responseText;
                if(xhr.responseText){
                    console.log("2");
                    localStorage.clear();
                    window.location.href = "home.html";
                }
            }
        }else{
            alert(xhr.status)
        }
    }

    xhr.open('POST', 'orderSave.php', true);
    xhr.send(formData2);
}


function shopcartInitPage2_3(){
    var sendOrder = document.getElementById('sendOrder');
    sendOrder.addEventListener("click", orderCheck, false);
}

window.addEventListener("load", shopcartInitPage2_3, false);






