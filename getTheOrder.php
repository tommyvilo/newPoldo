<?php
function getOrder()
{
    global $conn;
    $sql = "SELECT * FROM utenti_panini WHERE username='1ai'" ;
    $result = mysqli_query($conn, $sql);
    $orders = mysqli_fetch_assoc($result, MYSQLI_ASSOC);
    $orders["quantity"]="mona";
    return "ciao";
}