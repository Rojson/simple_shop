<?php

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
	$sql = "call p_wyswietl_przedzial(1,2);";
	$wynik = $conn->query($sql);
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
