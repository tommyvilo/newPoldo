<?php

function checkOrder($username){
    global $conn;
    //$username;   //Assegna alla variabile il dato che post ha preso dalle caselle di testo
    $query = "SELECT username,id_p,quantity FROM utenti_panini WHERE username='$username'";
    $result = $conn->query($query);
    $number=mysqli_num_rows($result);
    return $number;
}
//require_once("config.php");

//$array = ['../panini.php','../carrello.php'];

//$username=$_POST['username'];   //Assegna alla variabile il dato che post ha preso dalle caselle di testo
//$query = "SELECT username,id_p,quantity FROM utenti_panini WHERE username='$username'";
//$result = $conn->query($query);
//global $number;
//$number=mysqli_num_rows($result);
//echo $username;
//echo $number;
/*$row = $result->fetch_array(MYSQLI_NUM);

if(!strcmp($password,$row[1])){

    $_SESSION['user']=$row[0];
    $_SESSION['message']="Login effettuato con successo";
    setcookie('PHPSESSID', session_id(), 0, '/');

    header("location: ".$array[$row[2]]);
}

else{
    $_SESSION['error']="Il nome utente o la password sono errate";
    header("location: ../login.php");
}*/
