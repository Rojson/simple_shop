var ikona="";
var pages="";
var x=0;
var books_count = 6;
var q1 = "call p_wyswietl_limit_ksiazek(6)";
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
	if(window.location.href == "http://localhost:8080/simple_shop/index.php" || window.location.href == "http://localhost:8080/simple_shop/")
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
				var tab = JSON.parse(JSON.stringify(data));
				var ik="";
				tab.push("x");
				let ikona=[];
				
				
				for(var i=0; i<tab.length-1; i++)
					{
						if(tab[i].IdKsiazki == tab[i+1].IdKsiazki)
						{
							ikona.push(tab[i].ImieAutora + " " + tab[i].NazwiskoAutora + ", ");
						}else
						{
							ikona.push(tab[i].ImieAutora + " " + tab[i].NazwiskoAutora);
							console.log(tab[i].IdKsiazki);

							ik = ik  + '<div class="book"><div class="book-left-site"><div class="book-left-site__title">'+tab[i].Tytul+'</div>';
							ik = ik  + '<div class="book-left-site__author">'
							for(var x = 0; x<ikona.length; x++)
							{
								ik = ik + ikona[x];
							}
							ik = ik  + '</div>';
							ik = ik  + '<div class="book-left-site__price">'+tab[i].Cena+' zł</div><div id="book_'+tab[i].IdKsiazki+'" class="book-left-site__more">Dowiedz się więcej...</div></div><img src="'+tab[i].ZdjecieKsiazki+'" width="100" height="150"></div>';
							
							ikona=[];
						}
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
				console.log(tab);
				var autorzy = "";
				for(var i=0;i<tab.length;i++)
				{
					autorzy += tab[i].ImieAutora + " " + tab[i].NazwiskoAutora + ", ";
				}
				document.getElementById("book-photo-price").innerHTML = "<img src='"+tab[0].ZdjecieKsiazki+"'><div class='book-details__price'>Cena: <span>"+tab[0].Cena+" zł.</span></div><div id='add-to-cart__"+tab[0].IdKsiazki+"' class='left-site__button'><i class='demo-icon icon-basket'>&#xe800;</i> Dodaj do koszyka</div>";
				document.getElementById("right-site-title").innerHTML = tab[0].Tytul;
				document.getElementById("right-site-author").innerHTML = autorzy;
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
		books_count =6; 
		var markedCheckbox = document.querySelectorAll('input[type="checkbox"]:checked');  
		

		query = "SELECT ksiazki.IdKsiazki, ksiazki.TypOkladki, ksiazki.Tytul, ksiazki.ZdjecieKsiazki,ksiazki.Cena, autorzy.ImieAutora, autorzy.NazwiskoAutora FROM ksiazki INNER JOIN tworcy USING (IDKsiazki) INNER JOIN autorzy USING(IdAutora) ";
		var ifchceck=0;

		if(markedCheckbox != null)
		{
			ifchceck = 1;
			query += "WHERE ksiazki.IdKategorii IN (";
			for(var checkbox of markedCheckbox)
			{
				query += checkbox.value + ",";
			}
			query = query.slice(0,-1);
			query += ")";
		}
		
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

		endofquery = "ORDER BY ksiazki.IdKsiazki;";
		fullquery = query + endofquery;
		display_books(fullquery);		
	});
})
