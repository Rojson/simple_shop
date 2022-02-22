$(document).ready(function(){
    $( "#toggle_log" ).click(function() {
        $( "#log_in" ).toggleClass("log_display_a log_display_b")
    });

    $( "#toggle_log_btn" ).click(function() {
        $( "#log_in" ).toggleClass("log_display_a log_display_b")
    });
    
    $( "#toggle_sign" ).click(function() {
        $( "#sign_in" ).toggleClass("log_display_a log_display_b")
    });

    $( "#toggle_sign_btn" ).click(function() {
        $( "#sign_in" ).toggleClass("log_display_a log_display_b")
    });

    $( "#file_hook" ).click(function() {

        $( "#file_hook" ).toggleClass("fileUpload fileUpload2")
    });

    
});
function validateForm() {
    let tytul = document.forms["upload_form"]["title"].value;
    let opis = document.forms["upload_form"]["description"].value;
    let plik = document.forms["upload_form"]["image"].value;
    let kat1 = document.forms["upload_form"]["chceck-smieszne"].checked;
    let kat2 = document.forms["upload_form"]["chceck-Krajobraz"].checked;
    let kat3 = document.forms["upload_form"]["chceck-sztuka"].checked;
console.log(kat1);
    if (tytul == "") {
      alert("Pole tytuł musi mieć wartość");
      return false;
    }
    if (opis == "") {
        alert("Pole opis musi mieć wartość");
        return false;
    }
    if (plik == "") {
        alert("Nie dodano zdjęcia");
        return false;
    }
    if (kat1 == false && kat2 == false && kat3 == false) {
        alert("Nie wybrano kategorii");
        return false;
    }
    return true;
  }

  function validateForm_reg() {
    let login = document.forms["reg_form"]["login"].value;
    let pass1 = document.forms["reg_form"]["password"].value;
    let pass2 = document.forms["reg_form"]["password_2"].value;
console.log(login);
    if (login == "") {
      alert("Pole login musi mieć wartość");
      return false;
    }
    if (pass1 == "") {
        alert("Pole hasło musi mieć wartość");
        return false;
    }
    if (pass2 == "") {
        alert("Powtórz hasło");
        return false;
    }
    if (pass2 != pass1) {
        alert("Hasła nie są identyczne");
        return false;
    }

    return true;
  }