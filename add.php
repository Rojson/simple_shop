<!DOCTYPE html>
<head>
    <meta charset='UTF-8'>
    <link rel='stylesheet' href="css/nav_admin.css">
    <link rel='stylesheet' href="css/add.css">
    <link rel='stylesheet' href="css/log.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/log.js"></script>
</head>
<body class="bg">
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
                    <a href="panel.php" class="pointer">Zamawianie</a>
                    <a href="add.php" class="pointer nav-active">Dodawanie </a>
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

    <div class="container-lg">
        <form id="upload_form" class="row" action="upload.php" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
            <div class="col-sm-6 col-md-4 cols">
                    <span>Tytuł</span>
                    <input id="tytul" type="text" name="title" />
                    <span>Opis</span>
                    <textarea name="description"></textarea>
            </div>
            <div class="col-sm-6 col-md-4 cols">
                    <span>Liczba stron</span>
                    <input id="liczba_stron" type="number" name="liczba_stron" />
                    <span>Cena</span>
                    <input id="cena" type="number" name="cena" />
                    <span>Data</span>
                    <input id="data" type="date" name="data" />
                    <span>Dostawca</span>
                    <?php
                         $sql = "SELECT IDDostawcy, NazwaDostawcy  FROM `Dostawcy`";
                         $res = mysqli_query($conn, $sql) or die(mysqli_error());

                         if ($res->num_rows > 0) 
                         {
                            while($row = $res->fetch_assoc()) 
                            {
                              $id =$row["IDDostawcy"];
                              $name =$row["NazwaDostawcy"];
                              echo "<label class='search-box__row'..><input name='dostawca' value='$id' type='radio' class='checkbox'><div class='search-box__checkbox radius'></div><div class='search-box__text'>$name</div></label>";
                            }
                        }
                    ?>

                    <div id="file_hook" class="fileUpload">
                        <input name="image" id="image" type="file" class="upload" />
                        <span>Plik</span>
                    </div>
                    <input type="submit" name="submit" value="Dodaj książkę" class="submit">
            </div>
            <div class="col-sm-6 col-md-4 cols">
                    Wybierz kategorie
                    <?php
                         $sql = "SELECT IDKategorii, NazwaKategorii  FROM `kategorie`";
                         $res = mysqli_query($conn, $sql) or die(mysqli_error());

                         if ($res->num_rows > 0) 
                         {
                            while($row = $res->fetch_assoc()) 
                            {
                              $id =$row["IDKategorii"];
                              $name =$row["NazwaKategorii"];
                              echo "<label class='search-box__row'..><input name='category' value='$id' type='radio' class='checkbox'><div class='search-box__checkbox radius'></div><div class='search-box__text'>$name</div></label>";
                            }
                        }
                    ?>
                    Wybierz typ okładki
                    <label class="search-box__row">
                        <input name="okladka" value="Miękka" type="radio" class="checkbox">
                        <div class="search-box__checkbox radius">
                        </div> 
                        <div class="search-box__text">
                            Miękka
                        </div>
                    </label>
                    <label class="search-box__row">
                        <input name="okladka" value="Twarda" type="radio" class="checkbox">
                        <div class="search-box__checkbox radius">
                        </div> 
                        <div class="search-box__text">
                            Twarda
                        </div>
                    </label>
                    Wybierz twórców
                    <?php
                         $sql = "SELECT IDAutora, ImieAutora, NazwiskoAutora  FROM `Autorzy`";
                         $res = mysqli_query($conn, $sql) or die(mysqli_error());

                         if ($res->num_rows > 0) 
                         {
                            while($row = $res->fetch_assoc()) 
                            {
                              $id =$row["IDAutora"];
                              $name =$row["ImieAutora"];
                              $name2 =$row["NazwiskoAutora"];
                              echo "<label class='search-box__row'..><input name='tworcy[]' value='$id' type='checkbox' class='checkbox radius'><div class='search-box__checkbox'></div><div class='search-box__text'>$name $name2</div></label>";
                            }
                        }
                    ?>
            </div>
        </form>
    </div>
    <div class="horizontal-container footer">
        <img src="graphic/logo.png">
    </div>
</body>