<?php
$message = $_POST['id'];
$ip = "localhost";
$username = "root";
$password = "";

$tablica = array();

$conn = new mysqli($ip, $username, $password, "ksiazkowo");

if($conn->connect_error)
{
    echo "Problem z polaczeniem z baza danych !";
}

$c = 'SET CHARACTER SET utf8';
$conn->query($c);

$wynik = $conn->query($message);

if($wynik->num_rows > 0)
{
    while($row = $wynik->fetch_assoc())
    {
        $tablica[] = $row;
    }
}

echo json_encode($tablica);
$conn->close();


?>
