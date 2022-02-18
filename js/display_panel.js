//wyświetlanie listy książek
function dp(q) {
    $.ajax({
        type: "POST",
        url: 'js/test.php',
        data: { id: q },
        dataType: 'json',
        success: function (data) {
            var ik = "";
            ik+='<div class="panel__row"><div class="panel__row-header-first">Tytuł</div><div class="panel__row-header">Ilość na stanie</div><div class="panel__row-header">Zamówienie</div></div>';
            var tab = JSON.parse(JSON.stringify(data));
            for (var i = 0; i < tab.length; i++) {
                ik+='<div class="panel__row"><div class="panel__row-title">' + tab[i].Tytul + '</div><div class="panel__row-input">' + tab[i].IloscNaMagazynie + '</div><input id="'+ tab[i].IDKsiazki +'" type="number" class="panel__row-input panel__row-input-hook"/></div>';
            }
  
            document.getElementById("panel-hook").innerHTML = ik;
        }
    });
}

document.onload = new function()
{
    var q = "SELECT Tytul, IloscNaMagazynie, IDKsiazki from ksiazki";
    dp(q);
}

$(document).ready(function() {
    function execute(q)
	{
        console.log("sd");
		$.ajax({
			type: "POST",
			url: 'js/test.php',
			data: {id: q},
			dataType: 'json',
			success: function(data){
			}
		});
    };

    $("#zamow").click(function(){   
        var elements = document.getElementsByClassName("panel__row-input-hook");
        var names_id = '';
        var names_value = '';
        for(var i = 0; i < elements.length; i++) {
            
            var x= document.getElementById(elements[i].id).value;
            
            if(x>0){
                names_value+=x+"-";
                names_id += elements[i].id+="-";
            }       
        }
        execute("call p_dodaj_dostawe('"+names_id+"','"+names_value+"')");
        window.location.reload(true);
	  });
})
