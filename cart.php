<?php header('Content-type: text/html; charset=utf-8'); ?>

<!DOCTYPE html>
<html>

    <head>

        <meta charset="uft-8">
        <link rel="stylesheet" href="css/nav.css" />
        <link rel="stylesheet" href="css/reset.css" />
        <link rel="stylesheet" href="css/animation.css">
        <link rel="stylesheet" href="css/shopping_cart.css">
        <link rel="stylesheet" href="css/footer.css">
        <link rel="stylesheet" href="css/books.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=K2D:500,600,700|Lato&display=swap" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="js/nav.js"></script>
        <script src="js/display_cart.js"></script>
        <script src="js/cart_state.js"></script>
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
                        <div class="content__option">
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

                    <div class="mobile-menu__element  mobile-menu__element--top"></div>

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
                    <div class="mobile-bot__position">

                        <i style="margin-left: 3px; margin-right: 8px;" class="demo-icon icon-fire-1 position__icon">&#xe807;</i>
                        <span class="position__text">Promocje</span>
                        <span class="position__arrow">></span>

                    </div>
                </a>

                <div class="mobile-bot__position">

                    <i class="demo-icon icon-email position__icon">&#xe801;</i>
                    <span class="position__text">Kontakt</span>
                    <span class="position__arrow">></span>

                </div>

            </div>

        </nav>

        <div id="book-show-details" class="book-details">

            <div id="close-details" class="book-details__close">
            </div>

            <div id="book-photo-price" class="book-details__left-site">

                

            </div>

            <div class="book-details__right-site">

                <div class="right-site__title" id="right-site-title">

                </div>

                <div class="right-site__author" id="right-site-author">

                </div>

                <div class="right-site__row" id="right-site__type">

                </div>

                <div class="right-site__row" id="right-site__pages">

                </div>

                <div class="right-site__row" id="right-site__year">

                </div>

                <div class="right-site__row" id="right-site__desc">

                </div>

            </div>
        
        </div>

        <div class="header-box">

                <div class="header">

                    <div class="header__text">

                        Twój koszyk

                    </div>

                    <div class="header__separator">

                    </div>

                </div>

        </div>

        <div class="shopping-cart-box">

            <div id="shopping-cart-hook" class="shopping-cart">

            </div>

        </div>

        <div class="price-box">

            <div class="price">

                <div class="price__sum">

                    <div class="sum__up">
                        Podsumowanie
                    </div>

                    <div class="sum__dw">
                        Do zapłaty: <span id="total__price">0zł</span>
                    </div>
                
                </div>

            </div>

        </div>

        <div class="header-box">

            <div class="header">

                <div class="header__text">

                    Szczegóły zamówienia

                </div>

                <div class="header__separator">

                </div>

            </div>

        </div>

        <div class="order-box">

            <div class="order">

                <div class="order__section order__section--first">

                    <div class="section__content">

                        <div class="content__icon">
                            <img src="graphic/first.png">
                        </div>

                        <div class="content__input">

                            <div class="input__icon input__icon--green input__icon--user">
                            </div>
                            <input id="input_imie" type="text" class="input__form input__form--hook" placeholder="Imię" />

                        </div>

                        <div class="content__input">

                            <div class="input__icon input__icon--green input__icon--user">
                            </div>
                            <input id="input_nazwisko" type="text" class="input__form input__form--hook" placeholder="Nazwisko" />

                        </div>

                        <div class="content__input">

                            <div class="input__icon input__icon--green input__icon--phone">
                            </div>
                            <input id="input_telefon" type="text" class="input__form input__form--hook" placeholder="Telefon" />

                        </div>

                        <div class="content__input">

                            <div class="input__icon input__icon--green input__icon--mail">
                            </div>
                            <input id="input_email" type="text" class="input__form input__form--hook" placeholder="E-mail" />

                        </div>

                    </div>

                </div>

                <div class="order__section order__section--second">

                    <div class="section__content">

                        <div class="content__icon">
                            <img src="graphic/delivery.png">
                        </div>

                        <div class="content__input">

                            <div class="input__icon input__icon--yellow input__icon--code">
                            </div>
                            <input id="input_kod" type="text" class="input__form input__form--hook" placeholder="Kod pocztowy" />

                        </div>

                        <div class="content__input">

                            <div class="input__icon input__icon--yellow input__icon--city">
                            </div>
                            <input id="input_miejscowos" type="text" class="input__form input__form--hook" placeholder="Miejscowość" />

                        </div>

                        <div class="content__input">

                            <div class="input__icon input__icon--yellow input__icon--street">
                            </div>
                            <input id="input_ulica" type="text" class="input__form input__form--hook" placeholder="Ulica" />

                        </div>

                        <div class="content__input">

                            <div class="input__icon input__icon--yellow input__icon--home">
                            </div>
                            <input id="input_nr" type="text" class="input__form input__form--hook" placeholder="Nr. domu" />

                        </div>

                        <div class="content__input">

                            <div class="input__icon input__icon--yellow input__icon--home">
                            </div>
                            <input id="input_nr_m" type="text" class="input__form input__form--hook" placeholder="Nr. mieszkania" />

                        </div>

                    </div>

                </div>

                <div class="order__section order__section--third">

                    <div class="section__content">

                        <div class="content__icon">
                            <img src="graphic/payment.png">
                        </div>

                        <form>

                            <label class="content__label">
                                
                                <input id="input_radio1" type="radio" name="radio" class="radio"> 

                                <div class="label__radio">

                                </div> 

                                <div class="label__text">
                                    Przelew internetowy
                                </div>

                            </label>

                            <label class="content__label">
                                
                                <input id="input_radio2" type="radio" name="radio" class="radio"> 

                                <div class="label__radio">

                                </div> 

                                <div class="label__text">
                                    Przelew tradycyjny
                                </div>

                            </label>

                        </form>

                        <form>

                            <label class="content__label">
                                
                                <input id="input_radio3" type="radio" name="radio" class="radio"> 

                                <div class="label__radio">

                                </div> 

                                <div class="label__text">
                                    Przesyłka polecona
                                </div>

                            </label>

                            <label class="content__label">
                                
                                <input id="input_radio4" type="radio" name="radio" class="radio"> 

                                <div class="label__radio">

                                </div> 

                                <div class="label__text">
                                    Kurier
                                </div>

                            </label>

                        </form>

                        <div id="zamow" class="content__order">
                            Zamów
                        </div>

                    </div>

                </div>

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