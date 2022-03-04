//number of items, which are in cart

var cart_state = [];
$(document).ready(function() {
    $.ajax({
        type: "GET",
        url: 'js/get_session.php',
        dataType: 'json',
        success: function(data){
            var tab = JSON.parse(JSON.stringify(data));
            cart_state= tab;
            if(cart_state)         
            {
                document.getElementById("cart-state").innerHTML = cart_state.length;
                document.getElementById("shopping-cart-menu").innerHTML = cart_state.length;
            }
        }, error: function(){
            document.getElementById("cart-state").innerHTML = "0";
            document.getElementById("shopping-cart-menu").innerHTML = "0";
        }
    });
})
