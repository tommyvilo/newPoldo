<?php
//SEI UNO SCHIFO DI MERDA
function saluto()
{

    if (isset($_SESSION['user'])) {
        //echo $_SESSION['user'];
        return '<h1 class="salutoADMIN">BUONGIORNO ADMIN: ' . $_SESSION['user'] . '</h1>';

    }
    return "ciao stronzo";
}
?>