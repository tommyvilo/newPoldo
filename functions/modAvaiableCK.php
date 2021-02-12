<?php
    require_once("config.php");
    require_once("admin_functions.php");
    //echo "ciao";


$panini = json_decode($_COOKIE["mioBiscotto"]);

foreach($panini as $panino){
    $nome = $panino->nome;
    $nome = $conn -> real_escape_string($nome);
    $prezzo = $panino->prezzo;
    $prezzo = $conn -> real_escape_string($prezzo);
    $ingr = $panino->ingredienti;
    $ingr = $conn -> real_escape_string($ingr);
    $qt = $panino->quantita;
    $qt = $conn -> real_escape_string($qt);
    $dispoCK = $panino -> disponibilita;
    $dispoCK = $conn -> real_escape_string($dispoCK);
    //echo $dispoCK;
    $sql = "UPDATE panini  SET prezzo='$prezzo', ingredienti='$ingr',quantita='$qt', disponibilita='$dispoCK' WHERE nome='$nome' ";
    mysqli_query($conn, $sql);
    echo $conn->error;

}

$paniniToDelete = json_decode($_COOKIE["toDelete"]);
for($i=0;$i<count($paniniToDelete);$i++){
    $erPaninazzoSgravato=$paniniToDelete[$i];
    //echo $erPaninazzoSgravato;
    $erPaninazzoSgravato=$conn -> real_escape_string($erPaninazzoSgravato);
    $sql = "DELETE FROM panini WHERE nome='$erPaninazzoSgravato'";
    mysqli_query($conn, $sql);

}

    $variable=$_GET['check'];
    global $conn;
    $panini = getTotalPaniniWH();
    //echo $variable;
        //echo count($panini);
    $qt=10000;

    foreach ($panini as $panino){
        $nome = $panino['nome'];
        $nome = $conn -> real_escape_string($nome);
        $sql = "UPDATE panini  SET avaiableCK='$variable' WHERE nome='$nome' ";
        $controllone1 =  intval(panino['avaiableCK']);
        $variabile1=  intval($variable);
        mysqli_query($conn, $sql);
        echo $controllone1+$variabile1;
        echo $controllone1;
        echo $variabile1;
        echo intval($panino['avaiableCK']);
        echo "<br>";
        if($variabile1==intval($panino['avaiableCK'])){
            //non fa niente ahah
            echo "fanculo";
        }
        else{
            echo $variable;
            echo $panino['avaiableCK'];
            if(!strcmp($variable,'1')){
                $quantita = $panino['dispoBK'];
                $quantita=$conn -> real_escape_string($quantita);
                $sql = "UPDATE panini  SET quantita='$quantita' WHERE nome='$nome' ";
                mysqli_query($conn, $sql);
                echo "ops";
            }
            else{
                echo "ciao";
                $dispoBK = $panino['quantita'];
                $dispoBK=$conn -> real_escape_string($dispoBK);
                echo $dispoBK;
                $sql = "UPDATE panini  SET dispoBK='$dispoBK', quantita='$qt' WHERE nome='$nome' ";
                mysqli_query($conn, $sql);
                //$stoCazzo = "UPDATE panini  SET prezzo='$qt' WHERE nome='$nome'";
                //mysqli_query($conn, $stoCazzo);
                //$sql = "UPDATE panini  SET quantita='$qt' WHERE nome='$nome' ";
                //mysqli_query($conn, $sql);
            }
        }

        //echo $conn->error;
        //echo "ciao";

    }

header("location: ../managePanini.php");





//echo $panini[0]->nome;

