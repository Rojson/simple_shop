var cart_list = [];

function dp(q) {
    $.ajax({
        type: "POST",
        url: 'js/test.php',
        data: { id: q },
        dataType: 'json',
        success: function (data) {
            var sum_price=0;
            var ik = "";
            var tab = JSON.parse(JSON.stringify(data));
            for (var i = 0; i < tab.length; i++) {
                ik += '<div class="shopping-cart__row"><div class="row__box row__box--photo"><img src="' + tab[i].ZdjecieKsiazki + '"></div><div class="row__box row__box--title">' + tab[i].Tytul + '</div><div class="row__box row__box--count"><button id="minus__' + tab[i].IdKsiazki + '" class="box__count-button box__count-button--red"></button><input class="amount--hook box__input" id="amount__' + tab[i].IdKsiazki + '" type="number" value="1" readonly><button id="plus__' + tab[i].IdKsiazki + '" class="box__count-button box__count-button--green"></button><input class="hidden__price" id="hidden-price__' + tab[i].IdKsiazki + '" type="hidden" value="' + tab[i].Cena + '"></div><div id="price__' + tab[i].IdKsiazki + '" class="row__box row__box--price">' + tab[i].Cena + 'zł</div><div class="row__box row__box--delete"><button id="delete__' + tab[i].IdKsiazki + '" class="box__delete-button"></button></div></div>';
                sum_price+=parseFloat(tab[i].Cena);
                document.getElementById("total__price").innerHTML=sum_price.toFixed(2)+"zł";
            }
            document.getElementById("shopping-cart-hook").innerHTML = ik;
        }
    });
}

function total_price()
{
    var x = document.getElementsByClassName("hidden__price");
    var y = document.getElementsByClassName("box__input");
    var sum=0;
    for(i=0; i< x.length; i++)
    {
        sum+=parseFloat(x[i].value) * parseFloat(y[i].value);
        console.log(sum);
    }
    return sum.toFixed(2);
}
document.onload = new function()
{
    
    var q = "SELECT Tytul, Cena, ZdjecieKsiazki, IdKsiazki FROM ksiazki WHERE IdKsiazki = ";
    
    $.ajax({
        type: "GET",
        url: 'js/get_session.php',
        dataType: 'json',
        success: function(data){
            var tab = JSON.parse(JSON.stringify(data));
            cart_list= tab;
            if ( cart_list != null)
                {
                    for(var i=0; i<tab.length; i++)
                    {
                        if(i==tab.length - 1)
                        q = q+ tab[i];
                        else
                        q = q + tab[i]+" OR IdKsiazki = ";
                    }
                    dp(q);
                }else
                {
                    document.getElementById("shopping-cart-hook").innerHTML = "Nie masz żadnych artykułów w koszyku";
                }
                
        }, error: function(){document.getElementById("shopping-cart-hook").innerHTML = "Nie masz żadnych artykułów w koszyku";}
    });

}

$(document).ready(function() {

    function execute(q)
	{
		$.ajax({
			type: "POST",
			url: 'js/test.php',
			data: {id: q},
			dataType: 'json',
			success: function(data){
				console.log("works");
			}
		});
    };
    
    $("#zamow").click(function(){   
        var elements_data = document.getElementsByClassName("input__form--hook");
        var elements_amount = document.getElementsByClassName("amount--hook");
        var elements_id = document.getElementsByClassName("hidden__price");

        var names_data = '';
        var names_amount = '';
        var names_id = '';

        for(var i = 0; i < elements_data.length; i++) {
            var x= document.getElementById(elements_data[i].id).value;
            names_data+=x+"-";
        }
        console.log(names_data);

        for(var i = 0; i < elements_amount.length; i++) {
            var x= document.getElementById(elements_amount[i].id).value;
            var y= document.getElementById(elements_id[i].id).id;
            y=y.split("__");
            names_amount+=x+"-";
            names_id+=y[1]+"-";
        }
        console.log(names_id);
        
        var chceck_radio1 = document.getElementById("input_radio1");
		var chceck_radio2 = document.getElementById("input_radio2");
        var chceck_radio3 = document.getElementById("input_radio3");
        var chceck_radio4 = document.getElementById("input_radio4");
        var typ_przelewu;
        var typ_przesylki;

        if (chceck_radio1.checked == true)
		{
            typ_przelewu = "Internetowy";
        }
        if(chceck_radio2.checked == true)
        {
            typ_przelewu = "Tradycyjny";
        }

        if (chceck_radio3.checked == true)
		{
            typ_przesylki = "Polecona";
        }
        if(chceck_radio4.checked == true)
        {
            typ_przesylki = "Kurier";
        }
        details=names_data.split("-");
        execute("call p_dodaj_zamowienie('"+names_id+"','"+names_amount+"','"+details[0]+"', '"+details[1]+"', '"+details[2]+"', '"+details[3]+"', '"+details[4]+"', '"+details[5]+"', '"+details[6]+"', '"+details[7]+"', '"+details[8]+"', '"+typ_przelewu+"', '"+typ_przesylki+"')");


      });
    
    $(document).delegate('.box__count-button--red', 'click', function(){
        var amount_input = $(this).attr('id');
        var amount_input_cut = amount_input.replace("minus", "amount");
        var price_number = amount_input.replace("minus__", "");
        var count = document.getElementById(amount_input_cut).value;
        var final_count = parseInt(count, 10) - 1;
        if(final_count>0)
        {
            document.getElementById(amount_input_cut).value = final_count;

            var final_price = document.getElementById("hidden-price__"+price_number).value;
            final_price = final_price * final_count;
            document.getElementById("price__"+price_number).innerHTML = final_price.toFixed(2)+"zł";
        }
        document.getElementById("total__price").innerHTML=total_price()+"zł";
    });

    $(document).delegate('.box__count-button--green', 'click', function(){
        var amount_input = $(this).attr('id');
        var amount_input_cut = amount_input.replace("plus", "amount");
        var price_number = amount_input.replace("plus__", "");
        var count = document.getElementById(amount_input_cut).value;
        var final_count = parseInt(count, 10) + 1;
        if(final_count>0)
        {
            document.getElementById(amount_input_cut).value = final_count;

            var final_price = document.getElementById("hidden-price__"+price_number).value;
            final_price = final_price * final_count;
            document.getElementById("price__"+price_number).innerHTML = final_price.toFixed(2)+"zł";
        }
        document.getElementById("total__price").innerHTML=total_price()+"zł";
    });
    function arrayRemove(arr, value) {

        return arr.filter(function(ele){
            return ele != value;
        });
     
     }
    $(document).delegate('.box__delete-button', 'click', function(){
        var book_id = $(this).attr('id');
        var book_id_cut = book_id.replace("delete__", "");


        var result = arrayRemove(cart_list, book_id_cut);
        console.log(result);
        $.ajax({
			type: "POST",
			url: 'js/set_session.php',
			data: {id: result},
			dataType: 'json',
			success: function(data){
				var tab = JSON.parse(JSON.stringify(data));
			}
        });
        var qq = "SELECT Tytul, Cena, ZdjecieKsiazki, IdKsiazki FROM ksiazki WHERE IdKsiazki = ";
        $.ajax({
            type: "GET",
            url: 'js/get_session.php',
            dataType: 'json',
            success: function(data){
                var tab = JSON.parse(JSON.stringify(data));
                cart_list= tab;
                console.log(cart_list);
                if ( cart_list != null)
                {
                    for(var i=0; i<tab.length; i++)
                    {
                        if(i==tab.length - 1)
                        qq = qq+ tab[i];
                        else
                        qq = qq + tab[i]+" OR IdKsiazki = ";
                    }
                    dp(qq);
                    document.getElementById("cart-state").innerHTML = cart_list.length;document.getElementById("shopping-cart-menu").innerHTML = cart_list.length;
                }else
                {
                    document.getElementById("shopping-cart-hook").innerHTML = "Nie masz żadnych artykułów w koszyku";
                }
            }, error: function(){
                document.getElementById("shopping-cart-hook").innerHTML = "Nie masz żadnych artykułów w koszyku";
                document.getElementById("cart-state").innerHTML = "0";
                document.getElementById("shopping-cart-menu").innerHTML = "0";}
        });
        document.getElementById("total__price").innerHTML=total_price()+"zł";
    });

    
});
