var ikona = "";
document.onload = new function () {
	$.ajax({
		type: "GET",
		url: "js/show_json.php",
		dataType: "json",
		success: function (data) {
			var tab = JSON.parse(JSON.stringify(data));

			for (var i = 0; i < tab.length; i++) {
				ikona = ikona + '<div class="book"><div class="book-left-site"><div class="book-left-site__title">'+tab[i].Tytul+'</div><div class="book-left-site__author">'+tab[i].NazwiskoAutora+' '+tab[i].ImieAutora+'</div><div class="book-left-site__price">'+tab[i].Cena+' zł</div><div id="book_'+tab[i].IDKsiazki+'" class="book-left-site__more">Dowiedz się więcej...</div></div><img src="'+tab[i].ZdjecieKsiazki+'" width="100" height="150"></div>'
				console.log(tab[i].IDKsiazki);
			}

			document.getElementById("books_hook").innerHTML = ikona;
		}
	});
}
$(document).ready(function () {
	$(document).delegate('.book-left-site__more', 'click', function () {
		var productId = $(this).attr('id');
		var productId_cut = productId.replace("book_", "");

		var book = "CALL p_wyswietl_szczegoly_ksiazki(" + productId_cut + ")";
		$.ajax({
			type: "POST",
			url: 'js/test.php',
			data: { id: book },
			dataType: 'json',
			success: function (data) {
				var tab = JSON.parse(JSON.stringify(data));
				document.getElementById("book-photo-price").innerHTML = "<img src='" + tab[0].ZdjecieKsiazki + "'><div class='book-details__price'>Cena: <span>" + tab[0].Cena + " zł.</span></div><div id='add-to-cart__" + tab[0].IdKsiazki + "' class='left-site__button'><i class='demo-icon icon-basket'>&#xe800;</i> Dodaj do koszyka</div>";
				document.getElementById("right-site-title").innerHTML = tab[0].Tytul;
				document.getElementById("right-site-author").innerHTML = tab[0].ImieAutora + " " + tab[0].NazwiskoAutora;
				document.getElementById("right-site__type").innerHTML = "Okładka: " + tab[0].TypOkladki;
				document.getElementById("right-site__pages").innerHTML = "Ilość stron: " + tab[0].StronyKsiazki;
				document.getElementById("right-site__year").innerHTML = "Data wydania: " + tab[0].DataWydaniaKsiazki;
				document.getElementById("right-site__desc").innerHTML = "Opis: " + tab[0].OpisKsiazki;
				$("#book-show-details").css("display", "flex");
			}
		});
	});
	$("#close-details").click(function () {
		$("#book-show-details").css("display", "none");
	});
})
