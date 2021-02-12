<?php
global $conn;

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($conn, "SELECT * FROM Persons");



mysqli_close($conn);
