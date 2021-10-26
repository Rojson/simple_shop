<?php header('Content-type: text/html; charset=utf-8'); ?>
<!DOCTYPE html>
<html>

    <head>

        <meta charset="uft-8">
        <link rel="stylesheet" href="css/nav.css" />
        <link rel="stylesheet" href="css/reset.css" />
        <link rel="stylesheet" href="css/animation.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/books.css">
        <link rel="stylesheet" href="css/footer.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=K2D:500,600,700|Lato&display=swap" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="js/nav.js"></script>
        <script src="js/render.js"></script>
        <script src="js/cart_state.js"></script>
        <script src="js/cart.js"></script>
        <style>
            @font-face
            {
                font-family: 'fontello';
                src: url('./font/fontello.eot?82845320');
                src: url('./font/fontello.eot?82845320#iefix') format('embedded-opentype'),
                    url('./font/fontello.woff?82845320') format('woff'),
                    url('./font/fontello.ttf?82845320') format('truetype'),
                    url('./font/fontello.svg?82845320#fontello') format('svg');
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
                        <div class="content__option content__option--actual">
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
                    <div class="mobile-bot__position mobile-bot__position--actual">

                        <i class="demo-icon icon-home position__icon position__icon--actual">&#xe805;</i>
                        <span class="position__text position__text--actual">Główna</span>
                        <span class="position__arrow position__arrow--actual">></span>

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

        <section class="hero">

            <section class="intro">

                <section class="message">

                    <span class="message__caption">
                        Największy wybór książek i nie tylko
                    </span>

                    <a href="shop.php" class="message__button">
                        Sprawdź >>
                     </a>

                </section>

            </section>

        </section>

        <section class="features">
            
            <section class="features-box">

                <div class="feature">

                    <div class="feature__icon feature__icon--delivery">

                    </div>

                    <div class="feature__caption">
                        Szybka dostawa
                    </div>

                </div>

                <div class="feature">

                    <div class="feature__icon feature__icon--pricing">

                    </div>

                    <div class="feature__caption">
                        Najniższe ceny
                    </div>

                </div>

                <div class="feature">

                    <div class="feature__icon feature__icon--stats">

                    </div>

                    <div class="feature__caption">
                        24 000 tytułów
                    </div>

                </div>

            </section>

        </section>

        <div class="header-box">

            <div class="header">

                <div class="header__text">

                    Bestsellery

                </div>

                <div class="header__separator">

                </div>

            </div>

        </div>

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
        
        <div class="books-box">

            <div class="books" id="books_hook">

                

            </div>

        </div>

        <div class="button-box">

            <div class="big-button">

                <div class="big-button__left">

                    <i class="demo-icon icon-basket">&#xe800;</i>

                </div>

                
                <a href="shop.php" class="big-button__right">
                    
                    Zobacz pełną ofertę sklepu

                </a>

            </div>

        </div>

        <div class="stats-box">

            <div class="stats-and-advert">

                <div class="stats">

                    <div class="stats__header">
                        Najlepiej oceniane:
                    </div>

                    <div class="stats-position">

                        <div class="stats-position__number">
                            1
                        </div>

                        <div class="stats-posiotn__author-title">

                            <div class="stats-position__title">
                                Harry Poter i komnata tajemnic
                            </div>

                            <div class="stats-position__author">
                                J.K Rowling
                            </div>

                        </div>

                        <div class="stats-position__result">
                            5.0
                        </div>

                    </div>

                    <div class="stats-position">

                            <div class="stats-position__number">
                                2
                            </div>
    
                            <div class="stats-posiotn__author-title">
    
                                <div class="stats-position__title">
                                    Harry Poter i czara ognia
                                </div>
    
                                <div class="stats-position__author">
                                    J.K Rowling
                                </div>
    
                            </div>
    
                            <div class="stats-position__result">
                                4.9
                            </div>
    
                    </div>

                    <div class="stats-position">

                            <div class="stats-position__number">
                                3
                            </div>
    
                            <div class="stats-posiotn__author-title">
    
                                <div class="stats-position__title">
                                    Hobbit, czyli tam i z powrotem
                                </div>
    
                                <div class="stats-position__author">
                                    Tolkien J.R.R.
                                </div>
    
                            </div>
    
                            <div class="stats-position__result">
                                4.9
                            </div>
    
                    </div>

                    <div class="stats-position">
    
                                <div class="stats-position__number">
                                    4
                                </div>
        
                                <div class="stats-posiotn__author-title">
        
                                    <div class="stats-position__title">
                                        Igrzyska śmierci
                                    </div>
        
                                    <div class="stats-position__author">
                                        Suzanne Collins
                                    </div>
        
                                </div>
        
                                <div class="stats-position__result">
                                    4.9
                                </div>
        
                    </div>

                    <div class="stats-position">

                        <div class="stats-position__number">
                            5
                        </div>

                        <div class="stats-posiotn__author-title">

                            <div class="stats-position__title">
                            Harry Potter i Insygnia Śmierci
                            </div>

                            <div class="stats-position__author">
                                J.K Rowling
                            </div>

                        </div>

                        <div class="stats-position__result">
                            4.8
                        </div>

                    </div>

                    <div class="stats-position">

                            <div class="stats-position__number">
                                6
                            </div>
    
                            <div class="stats-posiotn__author-title">
    
                                <div class="stats-position__title">
                                To
                                </div>
    
                                <div class="stats-position__author">
                                Stephen King
                                </div>
    
                            </div>
    
                            <div class="stats-position__result">
                                4.6
                            </div>
    
                    </div>

                    <div class="stats-position">

                            <div class="stats-position__number">
                                7
                            </div>
    
                            <div class="stats-posiotn__author-title">
    
                                <div class="stats-position__title">
                                Harry Potter i Kamień Filozoficzny
                                </div>
    
                                <div class="stats-position__author">
                                    J.K Rowling
                                </div>
    
                            </div>
    
                            <div class="stats-position__result">
                                4.4
                            </div>
    
                    </div>

                </div>

                <div class="advert">

                    <div class="advert-photo">

                    </div>

                    <div class="advertt-text">

                        <div class="advert-text__title">
                            Niezdecydowany?
                        </div>

                        <div class="advert-text__desc">
                            Może znajdziesz promocję dla siebie
                        </div>
                        
                        <a href="sale.php" class="advert-text__button">
                            Sprawdź >>
                        </a>

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