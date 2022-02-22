<?php header('Content-type: text/html; charset=utf-8'); ?>

<!DOCTYPE html>
<html>

    <head>

        <meta charset="uft-8">
        <link rel="stylesheet" href="css/nav_admin.css" />
        <link rel="stylesheet" href="css/reset.css" />
        <link rel="stylesheet" href="css/animation.css">
        <link rel="stylesheet" href="css/panel.css">
        <link rel="stylesheet" href="css/footer.css">
        <link rel='stylesheet' href="css/log.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=K2D:500,600,700|Lato&display=swap" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="js/display_panel.js"></script>
        <script src="js/log.js"></script>
        <style>
            @font-face
            {
                font-family: 'fontello';
                src: url('./font/fontello.eot?51459014');
                src: url('./font/fontello.eot?51459014#iefix') format('embedded-opentype'),
                    url('./font/fontello.woff?51459014') format('woff'),
                    url('./font/fontello.ttf?51459014') format('truetype'),
                    url('./font/fontello.svg?51459014#fontello') format('svg');
                font-weight: normal;
                font-style: normal;
            }
            .demo-icon
            {
                font-family: "fontello";
                font-style: normal;
                font-weight: normal;
                speak: none;
                margin-right: 5px;
            }
        </style>

    </head>
    
    <body>
    <?php
        require("registration.php");
    ?>
    <nav class="navbar nav navbar-expand-md fixed-top container-fluid navbar-dark">
            <img src="css/logo.png">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div id="collapsibleNavbar" class="justify-content-end collapse navbar-collapse">
                <div class="navbar-nav horizontal-container nav-container__right-side">
                    <a href="panel.php" class="pointer nav-active">Zamawianie</a>
                    <a href="add.php" class="pointer">Dodawanie </a>
                    <?php
                        if(isset($_SESSION['username']))
                        { 
                            echo '<span class="logged_user">#'.$_SESSION['username'].'</span>';
                        }else
                        {
                            echo '<span id="toggle_log" class="nav-button nav-button__first-button pointer">Zaloguj się</span>';
                        }
                    ?>
                    <span class="nav-sep"></span>
                    <?php
                        if(isset($_SESSION['username']))
                        { 
                            echo '<form action="" method="POST">';
                            echo '<input type="submit" name="logout" class="nav-button pointer" value="Wyloguj się">';
                            echo '</form>';
                        }else
                        {
                            echo '<span id="toggle_sign" class="nav-button pointer">Zarejestruj się</span>';
                        }
                    ?>
                    
                </div>
            </div>

    </nav>

        <div class="header-box">

            <div class="header">

                <div class="header__text">

                    Statystyki tygodniowe

                </div>

                <div class="header__separator">

                </div>

            </div>

        </div>  

        <div class="header-box">

            <div class="header">

                <div class="header__text">

                    Statystyki

                </div>

                <div class="header__separator">

                </div>

            </div>

        </div>  

        <div class="header-box">

            <div class="header">

                <div class="header__text">

                    Panel zamówień

                </div>

                <div class="header__separator">

                </div>

            </div>

        </div>  

        <div class="panel-box">

            <div id="panel-hook" class="panel">          

            </div>

        </div>

        <div class="panel-box">

            <div id="zamow" class="panel-button">
                Zamów
            </div>

        </div>

        <div class="footer-box">

            <div class="footer">

                <div class="footer__left">

                    <div class="footer__left-top">

                            <div class="footer__about">

                                <div class="footer__header">
                                    O nas
                                </div>

                                <div class="footer__about-text">
                                    Zajmujemy się internetową sprzedarzą książek, podręczników oraz innych artykułów. W branży działamy już ponad 10 lat i cieszymy się nienaganną opinią wśród klientów.
                                </div>

                            </div>

                            <div class="details">

                                <div class="footer__header">
                                    Dane kontaktowe
                                </div>

                                <div class="details__line">

                                    <i class="demo-icon icon-phone">&#xe802;</i>

                                    <div class="details__text">
                                        33-234-25-64
                                    </div>

                                </div>
                                
                                <div class="details__line">

                                    <i class="demo-icon icon-home">&#xe805;</i>
    
                                    <div class="details__text">
                                        22- 435 Katowice, Polna 12
                                    </div>
    
                                </div>

                                <div class="details__line">

                                    <i class="demo-icon icon-email">&#xe801;</i>
        
                                    <div class="details__text">
                                        ksiazkowo@gmail.com
                                    </div>
        
                                </div>                                

                            </div>

                    </div>

                    <div class="footer__left-bot">

                        <div class="footer__header">
                            Zapisz się na newsletter
                        </div>

                        <div class="newsletter">

                            <input type="text" placeholder="Adres e-mail" class="newsletter__input footer__input">
                            <input type="submit" value="Zapisz się" class="newsletter__button">
                            
                        </div>

                    </div>

                </div>

                <div class="footer__right">

                    <div class="footer__header">
                        Formularz kontaktowy
                    </div>

                    <input type="text" class="footer__input" placeholder="Imię i nazwisko">

                    <input type="text" class="footer__input" placeholder="Adres e-mail">

                    <textarea class="footer__input footer__input--message" placeholder="Treść wiadomości"></textarea>

                    <input type="submit" value="<< Wyślij wiadomość >>" class="footer__input footer__input--button">
                    
                </div>

            </div>

        </div>

        <div class="c">
            © 2008-2019 Książkowo Zoo. Wszystkie prawa zastrzeżone.
        </div>

    </body>

</html>