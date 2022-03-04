<?php header('Content-type: text/html; charset=utf-8'); ?>

<!DOCTYPE html>
<html>

    <head>

        <meta charset="uft-8">
        <link rel="stylesheet" href="css/nav_admin.css" />
        <link rel="stylesheet" href="css/reset.css" />
        <link rel="stylesheet" href="css/animation.css">
        <link rel="stylesheet" href="css/panel.css">
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
            <img src="graphic/logo.png">

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

        <div class="horizontal-container footer">
            <img src="graphic/logo.png">
        </div>

    </body>

</html>