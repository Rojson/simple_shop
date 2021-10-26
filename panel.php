<?php header('Content-type: text/html; charset=utf-8'); ?>

<!DOCTYPE html>
<html>

    <head>

        <meta charset="uft-8">
        <link rel="stylesheet" href="css/nav.css" />
        <link rel="stylesheet" href="css/reset.css" />
        <link rel="stylesheet" href="css/animation.css">
        <link rel="stylesheet" href="css/panel.css">
        <link rel="stylesheet" href="css/footer.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=K2D:500,600,700|Lato&display=swap" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="js/nav.js"></script>
        <script src="js/display_panel.js"></script>
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

        <nav class="nav">

            <section class="content">

                <div class="content__logo">

                    <img class="content__logo--img" src="graphic/logo.png">

                </div>

                <span>

                    <a href="index.php">
                        <div class="content__option">
                            Główna
                        </div>
                    </a>
                    
                    <a href="shop.php">
                        <div class="content__option">
                            Sklep
                        </div>
                    </a>

                    <a href="sale.php">
                        <div class="content__option content__option--actual">
                            Promocje
                        </div>
                    </a>

                    <div class="content__option">
                        Kontakt
                    </div>


                    <a href="cart.php">
                        <div class="content__button">
                            <i class="demo-icon icon-basket">&#xe800;</i><div id="shopping-cart-menu">0</div>
                        </div>
                    </a>

                </span>    

                <div class="mobile-menu">

                    <div class="mobile-menu__element"></div>

                </div>

            </section>

        </nav>

        <nav class="mobile-nav">
            
            <a href="cart.php">
                <div class="mobile-top">

                    <div class="mobile-top__cart">

                        <div id="cart-state" class="mobile-top__count">

                        0

                        </div>

                    </div>

                </div>
            </a>

            <div class="mobile-bot">

                <a href="index.php">
                    <div class="mobile-bot__position">

                        <i class="demo-icon icon-home position__icon">&#xe805;</i>
                        <span class="position__text">Główna</span>
                        <span class="position__arrow">></span>

                    </div>
                </a>

                <a href="shop.php">
                    <div class="mobile-bot__position">

                        <i class="demo-icon icon-basket position__icon">&#xe800;</i>
                        <span class="position__text">Sklep</span>
                        <span class="position__arrow">></span>

                    </div>
                </a>

                <a href="sale.php">
                    <div class="mobile-bot__position mobile-bot__position--actual">

                        <i style="margin-left: 3px; margin-right: 8px;" class="demo-icon icon-fire-1 position__icon position__icon--actual">&#xe807;</i>
                        <span class="position__text position__text--actual">Promocje</span>
                        <span class="position__arrow position__arrow--actual">></span>

                    </div>
                </a>

                <div class="mobile-bot__position">

                    <i class="demo-icon icon-email position__icon">&#xe801;</i>
                    <span class="position__text">Kontakt</span>
                    <span class="position__arrow">></span>

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