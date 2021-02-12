


<?php
require_once("config.php");
$array = ['../dashboard.php','../index.php','../seller.php'];
$username=($_POST['username']);
$username=$conn -> real_escape_string($username);
$password=md5($_POST['password'])   ;
$query = "SELECT username, password, role FROM utenti WHERE username='$username'";
$result = $conn->query($query);
$row = $result->fetch_array(MYSQLI_NUM);
if(!strcmp($password,$row[1])){

    $_SESSION['user']=$row[0];
    $_SESSION['password']=$row[1];
    $_SESSION['role']=$row[2];
    $_SESSION['message']="Login effettuato con successo";
    $query = "SELECT viewsIndex FROM visite ";
    $result = $conn->query($query);
    $visiteIndex=mysqli_fetch_array($result);
    $lavisita= $visiteIndex[0]+1;
    $query = "UPDATE visite SET viewsIndex='$lavisita' ";
    $conn->query($query);
    setcookie('PHPSESSID', session_id(), 0, '/');
    header("location: ".$array[$row[2]]);
}
else{
    $_SESSION['error']="Il nome utente o la password sono errate";
    header("location: ../login.php");
}






















function checkOrder(){
    $username=$_POST['username'];   //Assegna alla variabile il dato che post ha preso dalle caselle di testo
    $query = "SELECT username,id_p,quantity FROM utenti_panini WHERE username='$username'";
    $result = $conn->query($query);
    global $number;
    $number=mysqli_num_rows($result);
    return $number;
}

