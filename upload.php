<?php
    session_start();
    
    if(isset($_SESSION['username']))
    {   
        if(FALSE !== getimagesize($_FILES['image']['tmp_name']))
        {
            $user = $_SESSION['username'];
            $md5_user = md5($user);
            $target_dir = "books/";
            $image_file_type = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
            $_FILES['image']['name'] = $md5_user."_".time().".".$image_file_type;
            $target_file = $target_dir . basename($_FILES['image']['name']);
            $upload_status = 1;
            
    
            if(isset($_POST['submit']))
            {
                $check = getimagesize($_FILES['image']['tmp_name']);
                if($check !== FALSE)
                {
                    echo "Plik to obrazek: ".$check['mime']."</br>";
                    $upload_status = 1;
                }
                else
                {
                    echo "Plik to nie obrazek.";
                    $upload_status = 0;
                }
            }
    
            if(file_exists($target_file))
            {
                echo "Plik już istnieje";
                $upload_status = 0;
            }
    
            if($_FILES['image']['size']>32000000)
            {
                echo "Plik jest za duży";
                $upload_status = 0;
            }
    
            if($image_file_type != 'jpg' && $image_file_type != 'jpeg' && $image_file_type != 'png')
            {
                echo "Tylko JPG, JPEG i PNG są dozwolone";
                $upload_status = 0;
            }
    
            if($upload_status == 0)
            {
                echo "Przesyłanie zdjęcia nie powiodło się";
                header("Refresh:0");
            }
            else
            {
                if(move_uploaded_file($_FILES['image']['tmp_name'],$target_file))
                {
                    require('db.php');
                    //echo "Plik ". htmlspecialchars( basename( $_FILES["image"]["name"])). " został przesłąny.</br>";
    
                    $title = $_POST['title'];
                    $description = $_POST['description'];
                    $kategoria = $_POST["category"];
                    $expire = intval($_POST['data']);
                    $okladka = $_POST["okladka"];
                    $strony = $_POST["liczba_stron"];
                    $cena = $_POST["cena"];
                    $dostawca = $_POST["dostawca"];
                    $magazyn = 0;
    
                    #wyszukiwanie id użytkownika
                    $sql = "SELECT id_uzytkownika FROM `uzytkownicy` WHERE login='$user'"; #sprawdza czy login już istnienie-----------------------------------------------
    
                    $res = mysqli_query($conn, $sql) or die(mysqli_error());
                    if(mysqli_num_rows($res) == 1){
                        foreach($res as $result){
                            foreach($result as $value){
                                $id_user = $value; #ID UŻYTKOWNIKA ZALOGOWANEGO
                            }
                        }
    
                    }
                    else
                    {
                        echo "Błąd użytkownika";
                    }
    
    
                    $time = new DateTime();
                    $time -> add(new DateInterval('PT'.$expire.'M'));
                    $time_expire = $time->format("Y-m-d H:i:s");
    
                    $stmt=$conn->prepare("INSERT INTO ksiazki(Tytul, IDKategorii, OpisKsiazki, ZdjecieKsiazki, TypOkladki, IloscStron, DataWydaniaKsiazki, Cena, IDDostawcy, IloscNaMagazynie) VALUES(?,?,?,?,?,?,?,?,?,?)");
                    $stmt->bind_param("sisssisiii",$title,$kategoria, $description, $target_file, $okladka, $strony, $time_expire, $cena, $dostawca, $magazyn);
                    $stmt->execute();
                    $id_image = 0;
                    #wyszukiwanie id kategorii
                    if(isset($_POST['tworcy']))
                    {
                        $sql = "SELECT IDKsiazki FROM `ksiazki` WHERE ZdjecieKsiazki='$target_file'";
                        $res = mysqli_query($conn, $sql) or die(mysqli_error());
                        foreach($res as $result)
                        {
                            foreach($result as $value)
                            {
                                $id_image = $value;
                            }
                        }
                        echo  $target_file;
                        $categories = $_POST['tworcy'];
                        $stmt=$conn->prepare("INSERT INTO tworcy(IDksiazki, IDautora) VALUES(?,?)");
                        foreach($categories as $category){
                            $sql = "SELECT IDAutora FROM `autorzy` WHERE IDAutora='$category'";
                            $res = mysqli_query($conn, $sql) or die(mysqli_error());
                            foreach($res as $result)
                            {
                                foreach($result as $value)
                                {
                                    $stmt->bind_param("ii",$id_image,$value);
                                    $stmt->execute();
                                }
                            }
                        }
                    }
                    else
                    {
                        echo "Kategorie są wymagane!";
                    }
                    $conn ->close();
                    //header("Location: index.php");
                }
                else
                {
                    echo "Plik nie został przesłany.";
                    //header("Refresh:0");
                }
            }
        }
        else
        {
            echo "Brak zdjęcia";
            //header("Location: add.php");
        }
    }
    else
    {
        echo "Zaloguj się!";
    }
?>