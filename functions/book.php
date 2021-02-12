<?php
require_once("config.php");
require_once("admin_functions.php");

$username=$_SESSION['user'];
$ordinazioni=$_GET['book'];
$ord1 = explode("|", $ordinazioni);
$spesa= getTotalCost($username);
 for($i=0;$i<sizeof($ord1);$i++) {
    $dati = explode(":", $ord1[$i]);


    //echo "<h1>".$dati[0].":".$dati[1]."</h1>";
    $query = "SELECT quantity FROM utenti_panini WHERE id_p='$dati[0]' && username='$username'";
    $result = $conn->query($query);
    //$type = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $numero = mysqli_num_rows($result);

    //echo getDisponibilita($dati[0]);
    $disponibilita = getDisponibilita($dati[0]);

    if (($disponibilita - $dati[1]) >= 0) {
        //echo "<br> Sono dentro";
        updatePanini($dati[0], $dati[1]);


        if ($numero == 0) {
            /*
            $query="SELECT * FROM panini WHERE nome='$dati[0]'";
            $panino = $conn->query($query);
            echo $panino['nome'] . " - " . $panino['quantita'];
            */

            $checkDISPO=getDISPONIBILITAPANINO($dati[0]);
            if($dati[1]>$checkDISPO){
                $dati[1]=$checkDISPO;
            }
            echo "i dati sono".$dati[1];
            echo $checkDISPO;
            $query = "INSERT INTO utenti_panini (username, id_p, quantity) VALUES ('$username','$dati[0]','$dati[1]')";
            $result = $conn->query($query); //arrivato qui ho inserito l'utente
            }
        else {
            $qty = $result->fetch_array(MYSQLI_NUM);
            //echo "<h1>".$qty[0].": da db".</h1>";
            //(int)$dati[1]+=(int)$qty[0];
            //echo "<h1>".$dati[1]." : totali ora in db"."</h1>";
            $checkDISPO=getDISPONIBILITAPANINO($dati[0]);
            echo "i pastelli nel culo ";
                if($dati[1]<$checkDISPO){
                    echo "i pastelli nel culo ";
                    $query = "UPDATE utenti_panini SET quantity=quantity+'$dati[1]' WHERE id_p='$dati[0]' && username='$username'";
                    $result = $conn->query($query);

                    //echo $qty[0];
                    //$query = "SELECT quantity FROM utenti_panini WHERE id_p='$dati[0]'";
             }

        }
    }
}

updateRECORD($username,$spesa);


//echo "ordinazione effetuata ".$_SESSION['user'];
//header("location: ../index.php");


header("location: ../carrello.php");


function updatePanini($nome,$numeroQ)
{
    global $conn;
    /*
        $query="SELECT * FROM panini WHERE nome='$nome'";
        $result = mysqli_query($conn, $query);
        //$result=$conn->query($query);
        $panino=mysqli_fetch_assoc($result, MYSQLI_ASSOC);*/

    $numeroD=getDisponibilita($nome);

    if($numeroD!=10000)
    {
        $sql = "UPDATE panini SET quantita=quantita-'$numeroQ' WHERE nome='$nome'";
        mysqli_query($conn, $sql);
    }
}

function getDisponibilita($nome)
{
    global $conn;

    $sql="SELECT * FROM panini WHERE nome='$nome'";
    $result=mysqli_query($conn, $sql);
    $result=mysqli_fetch_assoc($result);
    return $result['quantita'];

}