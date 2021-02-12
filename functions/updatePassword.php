




<?php
require_once("config.php");

if(isset($_POST['record1'])) {
    $username = $_SESSION['user'];
    $oldPassword = md5($_POST['OLDpassword']);
    $password1 = md5($_POST['password']);
    $password2 = md5($_POST['password1']);

    $query = "SELECT password FROM utenti WHERE username='$username'";
    $result = $conn->query($query);
    $row = $result->fetch_array(MYSQLI_NUM);
    $controlla = $row[0];


    if (!strcmp($password1, $password2) and !strcmp($oldPassword, $controlla)) {
        $query = "UPDATE utenti SET password='$password1' WHERE username='$username'";
        $result = $conn->query($query);
        $_SESSION['password']=$password1;
    }

}

