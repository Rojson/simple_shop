<?php
    $config = include('config.php');
    $host=$config['hostname'];
    $username = $config['username'];
    $password = $config['password'];
    $dbname=$config['database'];

    $conn= new mysqli($host,$username,$password,$dbname);

    function add_logs($client, $mysqli)
    {
        $res = mysqli_query($mysqli, "SELECT id_uzytkownika FROM uzytkownicy WHERE login='$client'");
        if($res->num_rows == 1){
            while ($row = $res->fetch_assoc()) {
                $id = $row["id_uzytkownika"];
            }

            $stmt=$mysqli->prepare("INSERT INTO logi(id_uzytkownika) VALUES(?)");
            $stmt->bind_param("i",$id);
            $stmt->execute();
            $stmt->close();
        }
        else
        {
            echo "Nie znaleziono użytkownika: $client";
        }
    }
?>