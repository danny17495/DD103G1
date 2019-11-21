/*一. 撈取LocalStorage確認放入購物車的資料*/
var addPostcardString = localStorage.getItem('addPostcard:');    // var itemString = storage['addItemList'];
var postcardArr = addPostcardString.substr(0,addPostcardString.length-2).split(', ');
// console.log(postcardArr);     //(2) ["1", "3"]
var postcardNum = postcardArr.length;  //加入購物車幾個明信片
// console.log(postcardNum);

var addShopItemString = localStorage.getItem('addShopItem:');    // var itemString = storage['addItemList'];
var shopItemArr = addShopItemString.substr(0,addShopItemString.length-2).split(', ');
console.log(shopItemArr);     //(3) ["2", "18", "15"]
var shopItemNum = shopItemArr.length;  //加入購物車幾個商城商品
console.log(shopItemNum);



/*二. 動態生成*/
function shopcartInit1(){

    //1.如果有買明信片就產生結構.newRow, `cartRow cartRow${i}`
    if(postcardNum >= 1 && postcardArr[0] != [""]){
        for(var key in postcardArr){
            // console.log(key);
            // console.log(postcardArr[key]);

            //處理照片資料及整列id命名
            var picName = postcardArr[key];
            var itemId = `pc${picName}`;
            itemImage = `images/postcardClient/${picName}.jpg`;

            createPostcardList(itemId, itemImage);

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

            createShopItemList(itemId, itemImage, itemPrice, itemName);
        }
    }    
}


/*二-1. 明信片商品動態生成*/
var i=1;
var postcardTotal1 = 0;
function createPostcardList(itemId, itemImage){
    // console.log(itemImage);

    //#bornItemList1 > .cartRow, 產生一列cartRow並且命名
    var newDiv = document.createElement('div');
    var innerDiv = document.createElement('div');            

    var newRow = document.getElementById('bornItemList1').appendChild(newDiv);            
    newRow.className = `cartRow cartRow${i} cartRowPost cartRowPost${itemId}`;

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
        //+-區
        var cartRowSpan3 = document.createElement('span');
        cartRowDetailNum.appendChild(cartRowSpan3);
            //-
            var cartRowDetailBtn1 = document.createElement('button');
            cartRowSpan3.appendChild(cartRowDetailBtn1);
            cartRowDetailBtn1.innerText = '-';
            cartRowDetailBtn1.id = `cartInputMinus${itemId}`;
            cartRowDetailBtn1.addEventListener("click", minus, false);
            //數量input窗格
            var cartRowDetailInput = document.createElement('input');
            cartRowSpan3.appendChild(cartRowDetailInput);
            cartRowDetailInput.type = 'text';
            cartRowDetailInput.value = '1';
            var itemNum = cartRowDetailInput.value;
            cartRowDetailInput.id = `cartInput${itemId}`;
            cartRowDetailInput.addEventListener("click", rememberOldNum, false);
            cartRowDetailInput.addEventListener("change", valueChange, false);
            //+
            var cartRowDetailBtn2 = document.createElement('button');
            cartRowSpan3.appendChild(cartRowDetailBtn2);
            cartRowDetailBtn2.innerText = '+';
            cartRowDetailBtn2.id = `cartInputPlus${itemId}`;
            cartRowDetailBtn2.addEventListener("click", plus, false);

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
        cartRowSpan4.innerText = `NT$${itemNum*60}`;
        cartRowSpan4.id = `cartItemTotal${itemId}`;


    //3.生成垃圾桶結構
    var cartRowTrash = document.createElement('div');
    newRow.appendChild(cartRowTrash);
    cartRowTrash.className = `cartRowTrash`;
    //RWD伸縮盒
    var cartRowTrashPic = document.createElement('div');
    cartRowTrash.appendChild(cartRowTrashPic);
    cartRowTrashPic.className = `cartRowTrashPic`;
    //圖片本人
    var newImgTrash = document.createElement('img');
    cartRowTrashPic.appendChild(newImgTrash);
    newImgTrash.src = "images/shopcart/trash.png";
    newImgTrash.addEventListener("click", deleteItem, false);
    newImgTrash.id= itemId;
    //4.清除浮動div
    var clearfix = document.createElement('div');
    newRow.appendChild(clearfix);
    clearfix.className = `clearfix`;


    /*初始價格*/

    postcardTotal1 += 60;
    var cartPriceTotal1 = document.getElementById('cartPriceTotal1');
    cartPriceTotal1.innerText = `NT$${postcardTotal1}`;
    var cartPriceTotal2 = document.getElementById('cartPriceTotal2');
    cartPriceTotal2.innerText = `NT$${postcardTotal1+120}`;

    i++;

}



/*二-2. 商城商品動態生成*/
var j= postcardNum+1;
function createShopItemList(itemId, itemImage, itemPrice, itemName){
    console.log(itemImage);
    console.log(itemPrice);

    //#bornItemList1 > .cartRowShop, 產生一列cartRowShop並且命名
    var newDiv = document.createElement('div');
    var innerDiv = document.createElement('div');            

    var newRow = document.getElementById('bornItemList2').appendChild(newDiv);            
    newRow.className = `cartRow cartRow${j} cartRowShop cartRowShop${itemId}`;

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
        //+-區
        var cartRowSpan3 = document.createElement('span');
        cartRowDetailNum.appendChild(cartRowSpan3);
            //-
            var cartRowDetailBtn1 = document.createElement('button');
            cartRowSpan3.appendChild(cartRowDetailBtn1);
            cartRowDetailBtn1.innerText = '-';
            cartRowDetailBtn1.id = `cartInputMinus${itemId}`;
            cartRowDetailBtn1.addEventListener("click", minusSI, false);
            //數量input窗格
            var cartRowDetailInput = document.createElement('input');
            cartRowSpan3.appendChild(cartRowDetailInput);
            cartRowDetailInput.type = 'text';
            cartRowDetailInput.value = '1';
            var itemNum = cartRowDetailInput.value;
            cartRowDetailInput.id = `cartInput${itemId}`;
            cartRowDetailInput.addEventListener("click", rememberOldNumSI, false);
            cartRowDetailInput.addEventListener("change", valueChangeSI, false);
            //+
            var cartRowDetailBtn2 = document.createElement('button');
            cartRowSpan3.appendChild(cartRowDetailBtn2);
            cartRowDetailBtn2.innerText = '+';
            cartRowDetailBtn2.id = `cartInputPlus${itemId}`;
            cartRowDetailBtn2.addEventListener("click", plusSI, false);

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
        cartRowSpan4.innerText = `NT$${itemPrice}`;
        cartRowSpan4.id = `cartItemTotal${itemId}`;

    //3.生成垃圾桶結構
    var cartRowTrash = document.createElement('div');
    newRow.appendChild(cartRowTrash);
    cartRowTrash.className = `cartRowTrash`;
    //RWD伸縮盒
    var cartRowTrashPic = document.createElement('div');
    cartRowTrash.appendChild(cartRowTrashPic);
    cartRowTrashPic.className = `cartRowTrashPic`;
    //圖片本人
    var newImgTrash = document.createElement('img');
    cartRowTrashPic.appendChild(newImgTrash);
    newImgTrash.src = "images/shopcart/trash.png";
    newImgTrash.addEventListener("click", deleteItemSI, false);
    newImgTrash.id= itemId;
    //4.清除浮動div
    var clearfix = document.createElement('div');
    newRow.appendChild(clearfix);
    clearfix.className = `clearfix`;

    /*初始價格*/
    var cartPriceTotal1 = document.getElementById('cartPriceTotal1');
    //處理字串取數字轉成數字做計算
    var oldTotal1 = cartPriceTotal1.innerText;
    var oldTotalMath1 = oldTotal1.replace('NT$', '')
    //按一次總計+商品價格itemPrice
    cartPriceTotal1.innerText = 'NT$' + (parseInt(oldTotalMath1) + itemPrice);

    var cartPriceTotal2 = document.getElementById('cartPriceTotal2');
    cartPriceTotal2.innerText = 'NT$' + (parseInt(oldTotalMath1) + itemPrice + 120);

    j++;
}


/*三-1. 明信片改變數量*/
function plus(){
    var itemId = this.getAttribute('id');

    var itemIdString = `${itemId}`;
    var key = itemIdString.replace('cartInputPluspc', '')
    // console.log(key);

    /*三-1.修改數量+1 ===================================================================*/
    var cartItemNum = this.parentNode.children[1].value;

    this.parentNode.children[1].value = parseInt(cartItemNum) + 1;    
    console.log(`編號${key}商品異動後的商品數量:`,  parseInt(cartItemNum) + 1);

    /*三-2.修改這列cartRow小計 ===========================================================*/
    var cartItemTotal = this.parentNode.parentNode.parentNode.children[3].children[1].innerText;
    var cartItemTotalMath = cartItemTotal.replace('NT$', '');
    // console.log(cartItemTotalMath);
    this.parentNode.parentNode.parentNode.children[3].children[1].innerText = 'NT$' + (parseInt(cartItemTotalMath) + 60);

    /*三-3.修改下方總計 ==================================================================*/
    var cartPriceTotal1 = document.getElementById('cartPriceTotal1');
    var oldTotal1 = cartPriceTotal1.innerText;
    
    var oldTotalMath1 = oldTotal1.replace('NT$', '')
    //按一次總計+60
    cartPriceTotal1.innerText = 'NT$' + (parseInt(oldTotalMath1) + 60);

    var cartPriceTotal2 = document.getElementById('cartPriceTotal2');
    cartPriceTotal2.innerText = 'NT$' + (parseInt(oldTotalMath1) + 60 + 120);

}

function minus(){
    var itemId = this.getAttribute('id');

    var itemIdString = `${itemId}`;
    var key = itemIdString.replace('cartInputMinuspc', '')
    // console.log(key);

    /*三-1.修改數量-1 ===================================================================*/
    var cartItemNum = this.parentNode.children[1].value;
    //小於1就不讓你減了, 與直接輸入<1邏輯不同
    if(parseInt(cartItemNum) <= 1){
        alert("親愛的會員, 商品數量不得小於1, 感恩")
    }else{
        this.parentNode.children[1].value = parseInt(cartItemNum) - 1;    
        console.log(`編號${key}商品異動後的商品數量:`,  parseInt(cartItemNum) - 1);

        /*三-2.修改這列cartRow小計 ===========================================================*/
        var cartItemTotal = this.parentNode.parentNode.parentNode.children[3].children[1].innerText;
        var cartItemTotalMath = cartItemTotal.replace('NT$', '');
        // console.log(cartItemTotalMath);
        this.parentNode.parentNode.parentNode.children[3].children[1].innerText = 'NT$' + (parseInt(cartItemTotalMath) - 60);

        /*三-3.修改下方總計 ==================================================================*/
        var cartPriceTotal1 = document.getElementById('cartPriceTotal1');
        var oldTotal1 = cartPriceTotal1.innerText;
        
        var oldTotalMath1 = oldTotal1.replace('NT$', '')
        //按一次總計-60
        cartPriceTotal1.innerText = 'NT$' + (parseInt(oldTotalMath1) - 60);

        var cartPriceTotal2 = document.getElementById('cartPriceTotal2');
        cartPriceTotal2.innerText = 'NT$' + (parseInt(oldTotalMath1) - 60 + 120);
    }

}

/*三-2. 商城商品改變數量*/
function plusSI(){
    var itemId = this.getAttribute('id');

    var itemIdString = `${itemId}`;
    var key = itemIdString.replace('cartInputPlussi', '')
    console.log(key);

    //處理價格// 商城商品價格有3種
    var itemPrice;
    if(key==1 || key==2 || key==3 || key==10 || key==11 || key==12){
        itemPrice = 450;
    }else if(key==4 || key==5 || key==6 || key==13 || key==14 || key==15){
        itemPrice = 550;
    }else{
        itemPrice = 650;
    }

    /*三-1.修改數量+1 ===================================================================*/
    var cartItemNum = this.parentNode.children[1].value;

    this.parentNode.children[1].value = parseInt(cartItemNum) + 1;    
    console.log(`商城編號${key}商品異動後的商品數量:`,  parseInt(cartItemNum) + 1);

    /*三-2.修改這列cartRow小計 ===========================================================*/
    var cartItemTotal = this.parentNode.parentNode.parentNode.children[3].children[1].innerText;
    var cartItemTotalMath = cartItemTotal.replace('NT$', '');
    // console.log(cartItemTotalMath);
    this.parentNode.parentNode.parentNode.children[3].children[1].innerText = 'NT$' + (parseInt(cartItemTotalMath) + itemPrice);

    /*三-3.修改下方總計 ==================================================================*/
    var cartPriceTotal1 = document.getElementById('cartPriceTotal1');
    var oldTotal1 = cartPriceTotal1.innerText;
    
    var oldTotalMath1 = oldTotal1.replace('NT$', '')
    //按一次總計+60
    cartPriceTotal1.innerText = 'NT$' + (parseInt(oldTotalMath1) + itemPrice);

    var cartPriceTotal2 = document.getElementById('cartPriceTotal2');
    cartPriceTotal2.innerText = 'NT$' + (parseInt(oldTotalMath1) + itemPrice + 120);

}

function minusSI(){
    var itemId = this.getAttribute('id');

    var itemIdString = `${itemId}`;
    var key = itemIdString.replace('cartInputMinussi', '')
    // console.log(key);

    //處理價格// 商城商品價格有3種
    var itemPrice;
    if(key==1 || key==2 || key==3 || key==10 || key==11 || key==12){
        itemPrice = 450;
    }else if(key==4 || key==5 || key==6 || key==13 || key==14 || key==15){
        itemPrice = 550;
    }else{
        itemPrice = 650;
    }

    /*三-1.修改數量-1 ===================================================================*/
    var cartItemNum = this.parentNode.children[1].value;
    //小於1就不讓你減了, 與直接輸入<1邏輯不同
    if(parseInt(cartItemNum) <= 1){
        alert("親愛的會員, 商品數量不得小於1, 感恩")
    }else{
        this.parentNode.children[1].value = parseInt(cartItemNum) - 1;    
        console.log(`編號${key}商品異動後的商品數量:`,  parseInt(cartItemNum) - 1);

        /*三-2.修改這列cartRow小計 ===========================================================*/
        var cartItemTotal = this.parentNode.parentNode.parentNode.children[3].children[1].innerText;
        var cartItemTotalMath = cartItemTotal.replace('NT$', '');
        // console.log(cartItemTotalMath);
        this.parentNode.parentNode.parentNode.children[3].children[1].innerText = 'NT$' + (parseInt(cartItemTotalMath) - itemPrice);

        /*三-3.修改下方總計 ==================================================================*/
        var cartPriceTotal1 = document.getElementById('cartPriceTotal1');
        var oldTotal1 = cartPriceTotal1.innerText;
        
        var oldTotalMath1 = oldTotal1.replace('NT$', '')
        //按一次總計-60
        cartPriceTotal1.innerText = 'NT$' + (parseInt(oldTotalMath1) - itemPrice);

        var cartPriceTotal2 = document.getElementById('cartPriceTotal2');
        cartPriceTotal2.innerText = 'NT$' + (parseInt(oldTotalMath1) - itemPrice + 120);
    }
}


/*四-1. 明信片input輸入改變數量時, 價格變動*/
var oldNumValue = 0; //初始宣告
function rememberOldNum(){
    oldNumValue = this.parentNode.children[1].value;
    // console.log(oldNumValue);
}

function valueChange(){
    /*三-1.修改數量-1 ===================================================================*/
    var newNumValue = this.parentNode.children[1].value;
    console.log(newNumValue);
    console.log(oldNumValue);  //oldNumValue成功紀錄舊的數量

    //有變化才做
    if(oldNumValue != newNumValue){
        //小於1就不讓你減了, 同時改回舊的數值, 與按鈕更改<=1邏輯不同
        if(parseInt(newNumValue) < 1){
            alert("親愛的會員, 商品數量不得小於1, 感恩");
            this.parentNode.children[1].value = oldNumValue;

        }else{
            // this.parentNode.children[1].value = parseInt(newNumValue) - 1;    

            /*三-2.修改這列cartRow小計 ===========================================================*/
            //減掉原本的再重新加上新的(例如-5*60+7*60)
            var cartItemTotal = this.parentNode.parentNode.parentNode.children[3].children[1].innerText;
            var cartItemTotalMath = cartItemTotal.replace('NT$', '');
            this.parentNode.parentNode.parentNode.children[3].children[1].innerText = 'NT$' + (parseInt(cartItemTotalMath) - 60*oldNumValue + 60*newNumValue);

            /*三-3.修改下方總計 ==================================================================*/
            var cartPriceTotal1 = document.getElementById('cartPriceTotal1');
            var oldTotal1 = cartPriceTotal1.innerText;
            
            var oldTotalMath1 = oldTotal1.replace('NT$', '')
            // 減掉原本的再重新加上新的(例如-5*60+7*60)
            cartPriceTotal1.innerText = 'NT$' + (parseInt(oldTotalMath1) - 60*oldNumValue + 60*newNumValue);

            var cartPriceTotal2 = document.getElementById('cartPriceTotal2');
            cartPriceTotal2.innerText = 'NT$' + (parseInt(oldTotalMath1) - 60*oldNumValue + 60*newNumValue + 120);
        }
    }
}

/*四-2. 商城商品input輸入改變數量時, 價格變動*/
var oldNumValuesi =0; //初始宣告
/*!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!晚點回來思考var oldNumValuesi是否須給0在外頭;!!!!!!!!!!!!*/

function rememberOldNumSI(){
    oldNumValuesi = this.parentNode.children[1].value;
    // console.log(oldNumValue);
}

function valueChangeSI(){
    /*三-1.修改數量-1 ===================================================================*/
    var newNumValuesi = this.parentNode.children[1].value;
    // console.log(newNumValuesi);
    // console.log(oldNumValuesi);  //oldNumValue成功紀錄舊的數量

    //處理價格// 商城商品價格有3種

    var keyString = this.getAttribute('id');
    var key = parseInt(keyString.replace('cartInputsi', ''));
    // console.log("商城商品編號",key); 

    var itemPrice;
    if(key==1 || key==2 || key==3 || key==10 || key==11 || key==12){
        itemPrice = 450;
    }else if(key==4 || key==5 || key==6 || key==13 || key==14 || key==15){
        itemPrice = 550;
    }else{
        itemPrice = 650;
    }

    //有變化才做
    if(oldNumValuesi != newNumValuesi){
        //小於1就不讓你減了, 同時改回舊的數值, 與按鈕更改<=1邏輯不同
        if(parseInt(newNumValuesi) < 1){
            alert("親愛的會員, 商品數量不得小於1, 感恩");
            this.parentNode.children[1].value = oldNumValuesi;

        }else{
            // this.parentNode.children[1].value = parseInt(newNumValuesi) - 1;    

            /*三-2.修改這列cartRow小計 ===========================================================*/
            //減掉原本的再重新加上新的(例如-5*60+7*60)
            var cartItemTotal = this.parentNode.parentNode.parentNode.children[3].children[1].innerText;
            var cartItemTotalMath = cartItemTotal.replace('NT$', '');
            this.parentNode.parentNode.parentNode.children[3].children[1].innerText = 'NT$' + (parseInt(cartItemTotalMath) - itemPrice * oldNumValuesi + itemPrice * newNumValuesi);

            /*三-3.修改下方總計 ==================================================================*/
            var cartPriceTotal1 = document.getElementById('cartPriceTotal1');
            var oldTotal1 = cartPriceTotal1.innerText;
            
            var oldTotalMath1 = oldTotal1.replace('NT$', '')
            // 減掉原本的再重新加上新的(例如-5*60+7*60)
            cartPriceTotal1.innerText = 'NT$' + (parseInt(oldTotalMath1) - itemPrice * oldNumValuesi + itemPrice * newNumValuesi);

            var cartPriceTotal2 = document.getElementById('cartPriceTotal2');
            cartPriceTotal2.innerText = 'NT$' + (parseInt(oldTotalMath1) - itemPrice * oldNumValuesi + itemPrice * newNumValuesi + 120);
        }
    }
}

/*五-1. 刪除商品*/
function deleteItem(){
    var itemId = this.getAttribute('id');
    // console.log(itemId);

    var itemIdString = `${itemId}`;
    var key = itemIdString.replace('pc', '')
    // console.log(key);
    
    //1.修改Local storage的資料, 移除掉買的編號
    localStorage['addPostcard:'] = localStorage['addPostcard:'].replace(`${key}, `,'');

    //2.刪除這列cartRow
    this.parentNode.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode.parentNode);

    //3.計算總價
    var cartPriceTotal1 = document.getElementById('cartPriceTotal1');
    var oldTotal1 = cartPriceTotal1.innerText;
    // console.log(oldTotal1);
    
    var oldTotalMath1 = oldTotal1.replace('NT$', '')
    //扣掉的時候刪掉這個的小計價格(cartItemTotalpc)
    var cartItemTotal = this.parentNode.parentNode.parentNode.children[1].children[3].children[1].innerText;
    // console.log(cartItemTotal);
    var cartItemTotalMath = cartItemTotal.replace('NT$', '');

    var newTotal1 = oldTotalMath1 - cartItemTotalMath;
    console.log(newTotal1);

    cartPriceTotal1.innerText = `NT$${newTotal1}`;
    var cartPriceTotal2 = document.getElementById('cartPriceTotal2');
    cartPriceTotal2.innerText = `NT$${newTotal1+120}`;

    if(newTotal1 == 0){
        cartPriceTotal2.innerText = `NT$0`;
    }
}

/*五-2. 商城商品刪除商品*/
function deleteItemSI(){
    var itemId = this.getAttribute('id');
    // console.log(itemId);

    var itemIdString = `${itemId}`;
    var key = itemIdString.replace('si', '')
    console.log(key);

    //處理價格
    var itemPrice;
    if(key==1 || key==2 || key==3 || key==10 || key==11 || key==12){
        itemPrice = 450;
    }else if(key==4 || key==5 || key==6 || key==13 || key==14 || key==15){
        itemPrice = 550;
    }else{
        itemPrice = 650;
    }
    
    //1.修改Local storage的資料, 移除掉買的編號
    localStorage['addShopItem:'] = localStorage['addShopItem:'].replace(`${key}, `,'');

    // //2.刪除這列cartRow
    this.parentNode.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode.parentNode);

    // //3.計算總價
    var cartPriceTotal1 = document.getElementById('cartPriceTotal1');
    var oldTotal1 = cartPriceTotal1.innerText;
    // // console.log(oldTotal1);
    
    var oldTotalMath1 = oldTotal1.replace('NT$', '')
    // //扣掉的時候刪掉這個的小計價格(cartItemTotalpc)
    var cartItemTotal = this.parentNode.parentNode.parentNode.children[1].children[3].children[1].innerText;
    // console.log(cartItemTotal);
    var cartItemTotalMath = cartItemTotal.replace('NT$', '');

    var newTotal1 = oldTotalMath1 - cartItemTotalMath;
    // console.log(newTotal1);

    cartPriceTotal1.innerText = `NT$${newTotal1}`;
    var cartPriceTotal2 = document.getElementById('cartPriceTotal2');
    cartPriceTotal2.innerText = `NT$${newTotal1+120}`;

    if(newTotal1 == 0){
        cartPriceTotal2.innerText = `NT$0`;
    }
}

window.addEventListener('load', shopcartInit1, false);



/*六. 購物車確認->記錄進去localStorage進下一頁*/
var cartNextBtn = document.getElementById("cartNextBtn")

function cartNextPage(){
    /*六-1.撈取LocalStorage重新確認最後放入購物車的明細*/
    var addPostcardString = localStorage.getItem('addPostcard:');    // var itemString = storage['addItemList'];
    var postcardArrLatest = addPostcardString.substr(0,addPostcardString.length-2).split(', ');
    console.log("最後放入購物車的明信片編號", postcardArrLatest);     //(2) ["1", "3"]
    var postcardNumLatest = postcardArrLatest.length;  //加入購物車幾個明信片
    console.log(postcardNumLatest);

    var addShopItemString = localStorage.getItem('addShopItem:');    // var itemString = storage['addItemList'];
    var shopItemArrLatest = addShopItemString.substr(0,addShopItemString.length-2).split(', ');
    console.log("最後放入購物車的商城商品編號", shopItemArrLatest);     //(3) ["2", "18", "15"]
    var shopItemNumLatest = shopItemArrLatest.length;  //加入購物車幾個商城商品
    console.log(shopItemNumLatest);


    //六-2-1.如果有買明信片就存入LocalStorage
    if(postcardNumLatest >= 1 && postcardArrLatest[0] != [""]){
        for(var key in postcardArrLatest){
            // console.log(key);
            itemId = postcardArrLatest[key];  //itemId明信片編號
            // console.log(itemId);

            //紀錄目前數量
            var father = document.getElementById("bornItemList1").children[`${key}`];
            // console.log(father);
            var cartItemNumString = father.children[1].children[2].children[1].children[1].value;
            var cartItemNum = parseInt(cartItemNumString);          //單品欲買數量
            // console.log(cartItemNum);

            localStorage.setItem(`明信片(編號, 商品數量, 商品小計)編號${itemId}`,`${itemId}, ${cartItemNum}, ${cartItemNum * 60}, `);
        }
    }

    //六-2-2.如果有買商城商品就存入LocalStorage
    if(shopItemNumLatest >= 1 && shopItemArrLatest[0] != [""]){
        for(var key in shopItemArrLatest){
            // console.log(key);
            itemIdsi = shopItemArrLatest[key];  //itemIdsi商城商品編號
            console.log(itemIdsi);

            //紀錄目前數量
            var fathersi = document.getElementById("bornItemList2").children[`${key}`];
            console.log(fathersi);
            var cartItemNumStringsi = fathersi.children[1].children[2].children[1].children[1].value;
            var cartItemNumsi = parseInt(cartItemNumStringsi);          //單品欲買數量
            console.log(cartItemNumsi);      

            //紀錄商城商品價格
            var itemPrice;
            if(itemIdsi==1 || itemIdsi==2 || itemIdsi==3 || itemIdsi==10 || itemIdsi==11 || itemIdsi==12){
                itemPrice = 450;
            }else if(itemIdsi==4 || itemIdsi==5 || itemIdsi==6 || itemIdsi==13 || itemIdsi==14 || itemIdsi==15){
                itemPrice = 550;
            }else{
                itemPrice = 650;
            }

            localStorage.setItem(`商城商品(編號, 商品數量, 商品小計)編號${itemIdsi}`,`${itemIdsi}, ${cartItemNumsi}, ${cartItemNumsi * itemPrice}, `);
        }
    }    
}

function shopcartInit2(){
    cartNextBtn.addEventListener("click", cartNextPage, false);
}

window.addEventListener("load", shopcartInit2, false);
