var book_shopping_cart_cut;
var cart_list = [];

$(document).ready(function() {

    
      
    $(document).delegate('.left-site__button', 'click', function(){
        var book_shopping_cart = $(this).attr('id');
        book_shopping_cart_cut =book_shopping_cart.replace("add-to-cart__", "");

        cart_list.push(book_shopping_cart_cut);
        document.getElementById("cart-state").innerHTML = cart_list.length;
        document.getElementById("shopping-cart-menu").innerHTML = cart_list.length;
        $.ajax({
			type: "POST",
			url: 'js/set_session.php',
			data: {id: cart_list},
			dataType: 'json',
			success: function(data){
				var tab = JSON.parse(JSON.stringify(data));
                console.log(tab);
                console.log("work");
			}
        });
        /*
        $.ajax({
        type: "GET",
        url: 'js/get_session.php',
        dataType: 'json',
        success: function(data){
            var tab = JSON.parse(JSON.stringify(data));
            if(tab.lenght>0)
            cart_list= tab;

            console.log(cart_list);
        }
    });
    */
    });

    

});

document.onload = new function()
{
    $.ajax({
        type: "GET",
        url: 'js/get_session.php',
        dataType: 'json',
        success: function(data){
            var tab = JSON.parse(JSON.stringify(data));
            if(tab)
            cart_list= tab;
            console.log(tab);
            console.log(cart_list);
        }
    });
}