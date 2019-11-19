/*一. 撈取LocalStorage確認放入購物車的資料*/
var addPostcardString = localStorage.getItem('addPostcard:');    // var itemString = storage['addItemList'];
var postcardArr = addPostcardString.substr(0,addPostcardString.length-2).split(', ');
// console.log(postcardArr);     //(2) ["1", "3"]
var postcardNum = postcardArr.length;  //加入購物車幾個明信片
// console.log(postcardNum);

var addShopItemString = localStorage.getItem('addShopItem:');    // var itemString = storage['addItemList'];
var shopItemArr = addShopItemString.substr(0,addShopItemString.length-2).split(', ');
//console.log(shopItems);     //(3) ["2", "18", "15"]
var shopItemNum = shopItemArr.length;  //加入購物車幾個商城商品
// console.log(shopItemNum);






      


/*二. 動態生成*/
function shopcartInit1(){


    //如果有買明信片就產生結構.newRow
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


}

var i=1;
var postcardTotal1 = 0;
function createPostcardList(itemId, itemImage){
    // console.log(itemImage);

    //#bornItemList1 > .cartRow, 產生一列cartRow並且命名
    var newDiv = document.createElement('div');
    var innerDiv = document.createElement('div');            

    var newRow = document.getElementById('bornItemList1').appendChild(newDiv);            
    newRow.className = `cartRow cartRow${i}`;

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





if(shopItemNum != 1){
    newDiv = document.createElement('div');
    var cartRowInner2 = `<div class="cartRow cartRow2">
                        <div class="cartRowPic">
                            <div class="cartPicShopItem">
                                <img src="images/shopcart/shopCartItem_2.png" alt="">
                            </div>
                        </div>
                        
                        <div class="cartRowDetail">
                            <div class="cartRowDetailName">
                                <span class="cartRowSmallSizeApear">名稱：</span>
                                <span>客製化馬克杯</span>
                            </div>
                            <div class="cartRowDetailPrice">
                                <span class="cartRowSmallSizeApear">單價：</span>
                                <span>NT$450</span>
                            </div>                            

                            <div class="cartRowDetailNum">
                                <span class="cartRowSmallSizeApear">數量：</span>
                                <span>
                                    <button>-</button>
                                    <input type="text" value="1">
                                    <button>+</button>
                                </span>
                            </div>
                            <div class="cartRowDetailSubtotal">
                                <span class="cartRowSmallSizeApear">小計：</span>
                                <span>NT$450</span>
                            </div>
                        </div>
                        <div class="cartRowTrash">
                            <div class="cartRowTrashPic">
                                <img src="images/shopcart/trash.png" alt="trash">
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>`


    var bornItemList2 = document.getElementById('bornItemList2');
    var cartRow2 = bornItemList2.appendChild(newDiv);
    // var i = ;
    // cartRow2.className = `cartRow cartRow${i}`;

    cartRow2.innerHTML = cartRowInner2;    
}    





/*三. 改變數量*/
function plus(){
    var itemId = this.getAttribute('id');

    var itemIdString = `${itemId}`;
    var key = itemIdString.replace('cartInputPluspc', '')
    // console.log(key);

    /*三-1.修改數量-1 ===================================================================*/
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

/*四. input輸入改變數量時, 價格變動*/
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


/*五. 刪除商品*/
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


window.addEventListener('load', shopcartInit1, false);



