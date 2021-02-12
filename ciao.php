<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>CIAO</title>
    <?php //require_once("config.php");?>
    <?php //require_once("functions\login.php");?>
</head>
<body>
<h1>PINGUINO</h1>
<a href="/functions/logout.php">LogOut</a>

<?php
session_start(); //SEI UNO SCHIFO DI MERDA
if(isset($_SESSION['user'])){
    //echo $_SESSION['user'];
    echo "ciao bello funziona";
    echo "<br>";
    echo $_SESSION['user'];
    echo " sei un figlio di puttana";
    exit(0);
   }
    echo "non va";

?>


</body>
</html>
