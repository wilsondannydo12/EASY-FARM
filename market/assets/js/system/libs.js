/*$(window).ready(function () {
    setTimeout(function () {
        $('#newsletter_modal').modal("show"); 
    }, 7000);
});*/
var BASE_LINK = "http://localhost/agroBusiness/market";

function my_checkOut_content() {
    document.getElementById('checkout_page_content').innerHTML="Working on it..."
    jQuery.ajax({
    url: "php/my_checkout_page_content.php",
    data:{
    },
    type: "POST",
        success:function(data){
            $("#checkout_page_content").html(data);
        },  
        error:function (){}
    });
}

function quickShopProduct(pro_id) {
    document.getElementById('quick_shop_product_view').innerHTML="Loading..."
    jQuery.ajax({
    url: BASE_LINK+"/php/fetch_product_for_quick_shopping.php",
    data:{
    pro_id : pro_id
    },
    type: "POST",
        success:function(data){
        $("#quick_shop_product_view").html(data);

        },  
        error:function (){}
    });
}

function addToCart(proid) {
    //var quick_shop_cur_product = document.getElementById('proid').value;
    var quantity = document.getElementById('quantity'+proid).value;
    jQuery.ajax({
    url: BASE_LINK+"/php/add_to_cart.php",
    data:{
    quick_shop_cur_product : proid,
    quantity : quantity
    },
    type: "POST",
        success:function(data){
            $('#quickshop_modal').modal("hide"); 
            $("#add_to_cart_product_view").html(data);
            alert("Item added successfully");
            checkCartBusketWithQuantity();

        },  
        error:function (){}
    });
}

function checkCart() {
    jQuery.ajax({
    url: BASE_LINK+"/php/check_cart.php",
    data:{
    },
    type: "POST",
        success:function(data){
            $("#add_to_cart_product_view").html(data);

        },  
        error:function (){}
    });
}
checkCart();

function checkCartBusketWithQuantity() {
    jQuery.ajax({
    url: BASE_LINK+"/php/check_cart_busket_with_quantity.php",
    data:{
    },
    type: "POST",
        success:function(data){
            $("#cart_busket_with_quantity").html(data);
            my_checkOut_content();

        },  
        error:function (){}
    });
}
checkCartBusketWithQuantity();

function removeItemFromCart(proid) {
    jQuery.ajax({
    url: BASE_LINK+"/php/remove_item_from_cart.php",
    data:{
        proid : proid
    },
    type: "POST",
        success:function(data){
            checkCart();
            checkCartBusketWithQuantity();
            fetch_my_cart_page_content();
            
        },  
        error:function (){}
    });
}

function clearItemFromCart() {
    var clear = "all";
    jQuery.ajax({
    url: BASE_LINK+"/php/remove_item_from_cart.php",
    data:{
        clear : clear
    },
    type: "POST",
        success:function(data){
            checkCart();
            checkCartBusketWithQuantity();
            fetch_my_cart_page_content();
        },  
        error:function (){}
    });
}

function qtyMinus(proid) {
    var quantity = document.getElementById('quantity'+proid).value;
    var quantityLeft = parseInt(quantity) - 1;
    if (parseInt(quantityLeft) == 0) {
        document.getElementById('quantity'+proid).value = 1;
    }else{
        document.getElementById('quantity'+proid).value = quantityLeft;
    }
}

function qtyPlus(proid) {
    var quantity = document.getElementById('quantity'+proid).value;
    var quantityLeft = parseInt(quantity) + 1;
    document.getElementById('quantity'+proid).value = quantityLeft;
}

function cartQtyMinus(forQty, proid) {
    var qtyType = "minus";
    var quantity = document.getElementById('quantity'+forQty+proid).value;
    var quantityLeft = parseInt(quantity) - 1;
    if (parseInt(quantityLeft) == 0) {
        document.getElementById('quantity'+forQty+proid).value = 1;
        qtyAddToCart(proid, qtyType);
    }else{
        document.getElementById('quantity'+forQty+proid).value = quantityLeft;
        qtyAddToCart(proid, qtyType);
    }
}

function cartQtyPlus(forQty, proid) {
    var quantity = document.getElementById('quantity'+forQty+proid).value;
    var qtyType = "add";
    var quantityLeft = parseInt(quantity) + 1;
    document.getElementById('quantity'+forQty+proid).value = quantityLeft;
    qtyAddToCart(proid, qtyType);
}

function qtyAddToCart(proid, qtyType) {
    jQuery.ajax({
    url: BASE_LINK+"/php/add_or_subtract_qty_in_cart.php",
    data:{
    quick_shop_cur_product : proid,
    qtyType : qtyType
    },
    type: "POST",
        success:function(data){
            checkCartBusketWithQuantity();
            checkCart();
            fetch_my_cart_page_content();
        },  
        error:function (){}
    });
}

function loadHome(){
    window.location.href=BASE_LINK+"/home";
}

function fetch_my_cart_page_content() {
    document.getElementById('my_cart_page_content').innerHTML="Working on it..."
    jQuery.ajax({
    url: BASE_LINK+"/php/my_cart_page_content.php",
    data:{
    },
    type: "POST",
        success:function(data){
            $("#my_cart_page_content").html(data);
            

        },  
        error:function (){}
    });
}
fetch_my_cart_page_content();