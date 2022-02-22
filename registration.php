<?php
    require('db.php');
    session_start();
    if(isset($_REQUEST["reg"])) #jeżeli TRUE to rejestruje i loguje, jeżeli FALSE to loguje
    {
        if(isset($_REQUEST['login'])) #jeżeli login jest to wchodzi
        {
            $user = stripslashes($_REQUEST['login']); #pobiera login
            $user = mysqli_real_escape_string($conn, $user); 

            $pass = stripslashes($_REQUEST['password']); #pobiera haslo
            $pass = mysqli_real_escape_string($conn, $pass);


            $sql = "SELECT * FROM `uzytkownicy` WHERE login='$user'"; #sprawdza czy login już istnienie

            $res = mysqli_query($conn, $sql) or die(mysqli_error());
            $rows = mysqli_num_rows($res); #liczba zwróconych wierszy z zapytania SQL

            if($rows == 0) #jeżeli jest = 0 czyli nie istnieje tworzymy użytkownika
            {
                $pass = md5($pass); #szyfrowanie md5
                $stmt=$conn->prepare("INSERT INTO uzytkownicy(login, haslo) VALUES(?,?)");
                $stmt->bind_param("ss",$user,$pass);
                $stmt->execute(); #dodaje użytkownika
                add_logs($user, $conn); #dodaje pierwszy log o danym użytkowniku
                session_start();
                $_SESSION['username'] = $user; #sesja
                header("Refresh:0");
            }
            else
            {
                echo "<div id='sign_in' class='log_bg log_display_b'>
                <form id='reg_form' method='POST' action='' class='vertical-container box'  onsubmit='return validateForm_reg()'>
                    <div id='toggle_sign_btn' class='x'></div>
                    <img src='css/logo_f.png'>
                    <input type='hidden' name='reg' value='reg'>
                    <input type='text' class='input_error' name='login' placeholder='Podaj swój login'>
                    <input type='password' class='input_error' name='password' placeholder='Hasło'>
                    <input type='password' class='input_error' name='password_2' placeholder='Powtórz hasło'>
                    <span>Konto o takiej nazwie już istnieje</span>
                    <input type='submit' value='Utwórz konto'>
            </form>
            </div>";
            }

        }
    }
    else{
        echo "<div id='sign_in' class='log_bg log_display_a'>
        <form id='reg_form' method='POST' action='' class='vertical-container box' onsubmit='return validateForm_reg()'>
            <img src='css/logo_f.png'>
                <div id='toggle_sign_btn' class='x'></div>
                <input type='hidden' name='reg' value='reg'>
                <input type='text' name='login' placeholder='Podaj swój login'>
                <input type='password' name='password' placeholder='Hasło'>
                <input type='password' name='password_2' placeholder='Powtórz hasło'>
                <input type='submit' value='Utwórz konto'>
        </form>
    </div>";
    }


    if(isset($_REQUEST['log']))
    {
        if(isset($_REQUEST['login']))
        {
            $user = stripslashes($_REQUEST['login']);
            $user = mysqli_real_escape_string($conn,$user);

            $pass = stripslashes($_REQUEST['password']);
            $pass = mysqli_real_escape_string($conn,$pass);

            $pass= md5($pass);

            $sql = "SELECT * FROM `uzytkownicy` WHERE login='$user' and haslo='$pass'";

            $res = mysqli_query($conn, $sql) or die(mysqli_error());
            $rows = mysqli_num_rows($res);

            if($rows == 1) #jeżeli jest tylko jeden użytkownik to nas do niego loguje
            {
                add_logs($user,$conn);
                $_SESSION['username'] = $user;
                header("Refresh:0");
            }
            else
            {
                echo "<div id='log_in' class='log_bg log_display_b'>
                <form method='POST' action='' class='vertical-container box'>
                    <div id='toggle_log_btn' class='x'></div>
                    <img src='css/logo_f.png'>
                    <input type='hidden' name='log' value='log'>
                    <input type='text' class='input_error' name='login' placeholder='Login'>
                    <input type='password' class='input_error' name='password' placeholder='Hasło'>
                    <span>Błędny login lub hasło</span>
                    <input type='submit' value='Zaloguj się'>
                </form>
            </div>";
            }
        }
    }
    else{
        echo "<div id='log_in' class='log_bg log_display_a'>
                <form method='POST' action='' class='vertical-container box'>
                    <div id='toggle_log_btn' class='x'></div>
                    <img src='css/logo_f.png'>
                    <input type='hidden' name='log' value='log'>
                    <input type='text' name='login' placeholder='Login'>
                    <input type='password' name='password' placeholder='Haslo'>
                    <input type='submit' value='Zaloguj się'>
                </form>
            </div>";
    }

    if(isset($_SESSION['username'])){
        $postnames = array_keys($_POST);
        foreach($postnames as $value){
            if($value == 'logout'){
                session_destroy();
                header("Refresh:0");
            }
        }
    }
?>