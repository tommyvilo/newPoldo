<?php

require_once("config.php");
require_once("admin_functions.php");

if($_GET['deleteOrdine']==1)
{
    $spesa=getTotalCost($_SESSION['user']);
    deleteRECORD($_SESSION['user'],$spesa);
    eliminaOrdinazione();
}

if(isset($_GET['nomiPanini']) && isset($_GET['quantitaPanini']) && isset($_GET['quantitaOriginale']))
{
    aggiornaOrdinazione();
    echo "sono entrato<br>";
}


function getOrdini()
{

    global $conn;

    $username=$_SESSION['user'];
    $sql = "SELECT * FROM utenti_panini WHERE username='$username' AND quantity>'0' ";
    $result = mysqli_query($conn, $sql);
    $ordini=mysqli_fetch_all($result, MYSQLI_ASSOC);
    $array=array();

    foreach ($ordini as $ordine)
    {
        $ordine['prezzo']=getPrezzoByNome($ordine['id_p']);
        //$ordine['prezzo']=0.99;
        array_push($array,$ordine);
    }

    return $array;
}


function getOrderByClasse($class)
{
    global $conn;
    $sql = "SELECT * FROM utenti_panini WHERE username='$class'";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($result, MYSQLI_ASSOC);
}


function getPrezzoByNome($nome)
{
    global $conn;
    $sql="SELECT * FROM panini WHERE nome='$nome'";
    $result=mysqli_query($conn, $sql);
    $panino=mysqli_fetch_assoc($result);
    return $panino['prezzo'];
}


function fixaPrezzi($prezzo)
{
    switch (strlen($prezzo))
    {
        case 1:
            return $prezzo.".00";
        case 3:
            return $prezzo."0";
    }
}


function eliminaOrdinazione()
{
    global $conn;
    $username=$_SESSION['user'];
    $sql = "SELECT * FROM utenti_panini WHERE username='$username'";
    $result =mysqli_query($conn, $sql);
    $ordini=mysqli_fetch_all($result, MYSQLI_ASSOC);



    foreach ($ordini as $ordine)
    {
        $nome=$ordine['id_p'];
        $numeroQ=$ordine['quantity'];
        $sql="UPDATE panini SET quantita=quantita+'$numeroQ' WHERE nome='$nome'";
        mysqli_query($conn, $sql);
    }



    $sql = "DELETE FROM utenti_panini WHERE username='$username'";
    mysqli_query($conn, $sql);
    header("location: ../index.php");
}


function aggiornaOrdinazione()
{
    global $conn;
    $username=$_SESSION['user'];

    $nomiPanini=explode(",",$_GET["nomiPanini"]);
    $quantitaPanini=explode(",",$_GET["quantitaPanini"]);
    $quantitaOriginale=explode(",",$_GET["quantitaOriginale"]);
    $spesa=getTotalCost($_SESSION['user']);


    for($i=0;$i<count($quantitaOriginale);$i++)
    {
        $nome=$nomiPanini[$i];
        $differenza=$quantitaOriginale[$i]-$quantitaPanini[$i];
        $sql="UPDATE panini SET quantita=quantita+'$differenza' WHERE nome='$nome'";
        mysqli_query($conn, $sql);

        if($quantitaPanini[$i]==0)
        {
            $sql = "DELETE FROM utenti_panini WHERE id_p='$nome' && username='$username'";
            mysqli_query($conn, $sql);
        }
        else
        {
            $quantita = $quantitaPanini[$i];
            $sql = "UPDATE utenti_panini SET quantity='$quantita' WHERE id_p='$nome' && username='$username'";
            mysqli_query($conn, $sql);
        }
        //echo "ciclo ".$i." ho cambiato ".$nomiPanini[i]." differenza=".$quantitaOriginale[i]."-".$quantitaPanini[$i]."<br>";
        updateRECORDsasaasdasd1($_SESSION['user'],$spesa);
    }
    header("location: ../carrello.php");
}
