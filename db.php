<?php

$servername = "localhost";
$username = "cs_6314";
$password = "1234";
$db = "6314_final_project";
$port = 3306;

// Create connection
$con = mysqli_connect($servername, $username, $password, $db, $port);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}


?>