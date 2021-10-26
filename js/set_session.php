<?php
session_start();
$_SESSION['list'] = $_POST['id'];

echo json_encode($_SESSION['list']);
?>