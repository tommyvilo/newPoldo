<?php
    require_once("config.php");
    require_once ("generatePDPassword.php");
    global $conn;
    $arrayPSW=array();
    $sql = "SELECT * FROM utenti WHERE role=1 ORDER BY username ASC";
    $result = mysqli_query($conn, $sql);
    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
    //echo "MYSQL: " . $conn->error;
    foreach ($users as $user){
        $utente= $user['username'];

        $passw= md5(generateRandom());
        $sql = "UPDATE utenti SET password='$passw',somma_spesa=0,spesa_grande=0 WHERE username='$utente' ";
        $result = mysqli_query($conn, $sql);
        echo $conn->error;
    }
    stampaPDF($users,$arrayPSW);

    header("location: ". "../manageUser.php");


    function generateRandom(){
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
        $length = 8;
        global $arrayPSW;
        $pass = substr( str_shuffle(rand() . time() . $chars ), 0, $length );
        array_push($arrayPSW,$pass);
        return $pass;
    }