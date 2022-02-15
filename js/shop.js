var ikona="";
var pages="";
var x=0;
var books_count = 2;
var q1 = "call p_wyswietl_przedzial(1,6)";
document.onload = new function()
{
	function init2(q1, element)
		{
			$.ajax({
				type: "POST",
				url: "js/test.php",
				data: {id: q1},
				dataType: "json",
				success: function(data)
				{
					var tab = JSON.parse(JSON.stringify(data));
					
					for(var i=0; i<tab.length; i++)
					{
						ikona = ikona + '<div class="book"><div class="book-left-site"><div class="book-left-site__title">'+tab[i].Tytul+'</div><div class="book-left-site__author">'+tab[i].NazwiskoAutora+' '+tab[i].ImieAutora+'</div><div class="book-left-site__price">'+tab[i].Cena+' zł</div><div id="book_'+tab[i].IDKsiazki+'" class="book-left-site__more">Dowiedz się więcej...</div></div><img src="'+tab[i].ZdjecieKsiazki+'" width="100" height="150"></div>';
					}

					document.getElementById(element).innerHTML = ikona;
				}
			});
		}
	if(window.location.href == "http://localhost:8080/simple_shop/index.php")
	{
		init2(q1, "books_hook");
	}

	if(x==0)
	{
		if(window.location.href == "http://localhost:8080/simple_shop/shop.php")
		{
			init2(q1, "shop_hook");
		}
	}
	x++;
};
$(document).ready(function() {
	var fullquery = "call p_wyswietl_limit_ksiazek("+books_count+")";
	//console.log(fullquery);
	function display_books(q)
	{
		$.ajax({
			type: "POST",
			url: 'js/test.php',
			data: {id: q},
			dataType: 'json',
			success: function(data){
				var ik="";
				var tab = JSON.parse(JSON.stringify(data));
				
				for(var i=0; i<tab.length; i++)
					{
						console.log(tab[i].IdKsiazki);
						ik = ik  + '<div class="book"><div class="book-left-site"><div class="book-left-site__title">'+tab[i].Tytul+'</div><div class="book-left-site__author">'+tab[i].NazwiskoAutora+' '+tab[i].ImieAutora+'</div><div class="book-left-site__price">'+tab[i].Cena+' zł</div><div id="book_'+tab[i].IdKsiazki+'" class="book-left-site__more">Dowiedz się więcej...</div></div><img src="'+tab[i].ZdjecieKsiazki+'" width="100" height="150"></div>';
					}
					document.getElementById("shop_hook").innerHTML = ik;
			}
		});
	};

	$(document).delegate('.book-left-site__more', 'click', function() 
	{
		var productId = $(this).attr('id');
		var productId_cut =productId.replace("book_", "");

		var book = "CALL p_wyswietl_szczegoly_ksiazki("+productId_cut+")";
		$.ajax({
			type: "POST",
			url: 'js/test.php',
			data: {id: book},
			dataType: 'json',
			success: function(data){
				var tab = JSON.parse(JSON.stringify(data));
				document.getElementById("book-photo-price").innerHTML = "<img src='"+tab[0].ZdjecieKsiazki+"'><div class='book-details__price'>Cena: <span>"+tab[0].Cena+" zł.</span></div><div id='add-to-cart__"+tab[0].IdKsiazki+"' class='left-site__button'><i class='demo-icon icon-basket'>&#xe800;</i> Dodaj do koszyka</div>";
				document.getElementById("right-site-title").innerHTML = tab[0].Tytul;
				document.getElementById("right-site-author").innerHTML = tab[0].ImieAutora +" "+ tab[0].NazwiskoAutora;
				document.getElementById("right-site__type").innerHTML = "Okładka: "+tab[0].TypOkladki;
				document.getElementById("right-site__pages").innerHTML = "Ilość stron: "+tab[0].StronyKsiazki;
				document.getElementById("right-site__year").innerHTML ="Data wydania: "+ tab[0].DataWydaniaKsiazki;
				document.getElementById("right-site__desc").innerHTML = "Opis: "+tab[0].OpisKsiazki;
				$("#book-show-details").css("display","flex");
			}
		});
	  });
	  $("#close-details").click(function(){
		$("#book-show-details").css("display","none");
	  });

	$("#show_more").click(function() {
		books_count+=2; 
		fullquery = "call p_wyswietl_limit_ksiazek("+books_count+")";
		display_books(fullquery);		
	});

	$("#search-hook").click(function() {
		var chceck_przygodowa = document.getElementById("chceck-przygodowa");
		var chceck_kryminal = document.getElementById("chceck-kryminal");
		var chceck_akcji = document.getElementById("chceck-akcji");
		var chceck_historyczna = document.getElementById("chceck-historyczna");
		var chceck_komedia = document.getElementById("chceck-komedia");

		books_count =2; 

		query = "SELECT ksiazki.IdKsiazki, ksiazki.TypOkladki, ksiazki.Tytul, ksiazki.ZdjecieKsiazki,ksiazki.Cena, autorzy.ImieAutora, autorzy.NazwiskoAutora FROM ksiazki INNER JOIN tworcy USING (IDKsiazki) INNER JOIN autorzy USING(IdAutora) ";
		var ifchceck=0;
		if (chceck_przygodowa.checked == true)
		{
			query += "WHERE (ksiazki.IdKategorii = 1";
			ifchceck =1;
		}
		if (chceck_kryminal.checked == true)
		{
			if(ifchceck==1)
			{
				query += " OR ksiazki.IdKategorii = 2";
			}else
			{
				query += "WHERE (ksiazki.IdKategorii = 2";
				ifchceck=1;
			}
		}
		if (chceck_akcji.checked == true)
		{
			if(ifchceck==1)
			{
				query += " OR ksiazki.IdKategorii = 3";
			}else
			{
				query += "WHERE (ksiazki.IdKategorii = 3";
				ifchceck=1;
			}
		}
		if (chceck_historyczna.checked == true)
		{
			if(ifchceck==1)
			{
				query += " OR ksiazki.IdKategorii = 4";
			}else
			{
				query += "WHERE (ksiazki.IdKategorii = 4";
				ifchceck=1;
			}
		}
		if (chceck_komedia.checked == true)
		{
			if(ifchceck==1)
			{
				query += " OR ksiazki.IdKategorii = 5";
			}else
			{
				query += "WHERE (ksiazki.IdKategorii = 5";
				ifchceck=1;
			}
		}
		if(ifchceck==1)
		query+=")";

		var chceck_radio1 = document.getElementById("radio-1");
		var chceck_radio2 = document.getElementById("radio-2");
		var chceck_radio3 = document.getElementById("radio-3");

		if (chceck_radio1.checked == true)
		{
			if(ifchceck==1)
			{
				query += " AND ksiazki.Cena BETWEEN 0 AND 25 ";
			}else
			{
				query += "WHERE ksiazki.Cena BETWEEN 0 AND 25 ";
			}
		}

		if (chceck_radio2.checked == true)
		{
			if(ifchceck==1)
			{
				query += " AND ksiazki.Cena BETWEEN 25 AND 50 ";
			}else
			{
				query += "WHERE ksiazki.Cena BETWEEN 25 AND 50 ";
			}
		}

		if (chceck_radio3.checked == true)
		{
			if(ifchceck==1)
			{
				query += " AND ksiazki.Cena BETWEEN 50 AND 75 ";
			}else
			{
				query += "WHERE ksiazki.Cena BETWEEN 50 AND 75 ";
			}
		}

		endofquery = "ORDER BY ksiazki.IdKsiazki LIMIT "+books_count+";";
		fullquery = query + endofquery;

		display_books(fullquery);		
	});
})
