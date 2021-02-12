<?php

$servername = "localhost";
$username = "newpoldo";
$password = "dbrzMC46qWn5";
$dbname= "my_newpoldo";

$conn = new mysqli("localhost", "newpoldo", "dbrzMC46qWn5");

if (!$conn) {
    die( "Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";