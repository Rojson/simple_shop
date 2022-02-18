var book_shopping_cart_cut;
var cart_list = [];

$(document).ready(function() {
    //przycisk (dodaj do koszyka)
    $(document).delegate('.left-site__button', 'click', function(){
        //pozyskanie ID książki
        var book_shopping_cart = $(this).attr('id');
        book_shopping_cart_cut =book_shopping_cart.replace("add-to-cart__", "");

        //dodanie id książki do listy
        cart_list.push(book_shopping_cart_cut);

        //wpisanie liczby książek do przycisku "koszyk"
        document.getElementById("cart-state").innerHTML = cart_list.length;
        document.getElementById("shopping-cart-menu").innerHTML = cart_list.length;

        //przesłanie listy książek do sesji
        $.ajax({
			type: "POST",
			url: 'js/set_session.php',
			data: {id: cart_list},
			dataType: 'json',
			success: function(data){
				var tab = JSON.parse(JSON.stringify(data));
			}, error: function(){
                document.getElementById("cart-state").innerHTML = "0";
                document.getElementById("shopping-cart-menu").innerHTML = "0";
            }
        });
    });
});

document.onload = new function()
{
    //pobranie listy książek z sesji
    $.ajax({
        type: "GET",
        url: 'js/get_session.php',
        dataType: 'json',
        success: function(data){
            var tab = JSON.parse(JSON.stringify(data));
            if(tab)
            cart_list= tab;
        }, error: function(){
            document.getElementById("cart-state").innerHTML = "0";
            document.getElementById("shopping-cart-menu").innerHTML = "0";
        }
    });
}