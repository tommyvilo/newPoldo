<?php


    function getUsers()
    {
        global $conn;
        $sql = "SELECT * FROM utenti WHERE role IS NOT NULL ORDER BY username ASC";
        $result = mysqli_query($conn, $sql);
        $users = mysqli_fetch_all($result, MYSQLI_ASSOC);

        return $users;
    }

    //ritorna le classi che hanno ordinate, senza ridondanza

    function getOrderUser()
    {
        global $conn;
        $sql = "SELECT DISTINCT username FROM utenti_panini ORDER BY username ASC";
        //$sql = "SELECT utenti.*, utenti_panini.* FROM utenti NATURAL JOIN utenti_panini ON utenti.username = utenti_panini.username WHERE role='1';";
        $result = mysqli_query($conn, $sql);
        $orders = mysqli_fetch_all($result, MYSQLI_ASSOC);

        return $orders;
    }

    function getNumberOrderUser()
    {
        $ct=0;
        global $conn;
        $sql = "SELECT DISTINCT username FROM utenti_panini ORDER BY username ASC";
        //$sql = "SELECT utenti.*, utenti_panini.* FROM utenti NATURAL JOIN utenti_panini ON utenti.username = utenti_panini.username WHERE role='1';";
        $result = mysqli_query($conn, $sql);
        $orders = mysqli_fetch_all($result, MYSQLI_ASSOC);
        foreach ($orders as $order){
            $ct++;
        }
        return $ct;
    }

    function getOrder()
    {
        //$classe=$_GET['classe'];
        global $conn;
        $sql = "SELECT * FROM utenti_panini WHERE quantity>'0'";
        //$sql = "SELECT utenti.*, utenti_panini.* FROM utenti NATURAL JOIN utenti_panini ON utenti.username = utenti_panini.username WHERE role='1';";
        $result = mysqli_query($conn, $sql);
        $orders = mysqli_fetch_all($result, MYSQLI_ASSOC);

        return $orders;
    }

    function getTotalCost($classe)
{
    global $conn;
    $sql = "SELECT * FROM utenti_panini WHERE username='$classe' ";
    //$sql = "SELECT panini.*, utenti_panini.* FROM panini NATURAL JOIN utenti_panini ON panini.id_p = utenti_panini.id_p WHERE role='1';";
    $result = mysqli_query($conn, $sql);
    $orders = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $costo=0;
    foreach($orders as $order){
        $costo+=getCostbyID_p($order["id_p"],$order["quantity"]);
    }
    return $costo;

}

    function getTotalCostOfAll()
{
    global $conn;
    $sql = "SELECT DISTINCT username FROM utenti_panini ORDER BY username ASC";
    //$sql = "SELECT panini.*, utenti_panini.* FROM panini NATURAL JOIN utenti_panini ON panini.id_p = utenti_panini.id_p WHERE role='1';";
    $result = mysqli_query($conn, $sql);
    $utenti = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $costo= [];
    $ct=0;
    foreach($utenti as $utente){
        $costo[$ct]=getTotalCost($utente["username"]);
        $ct++;
    }
    return $costo;

}

    function getOrderByClass($classe)
    {
        global $conn;
        $sql = "SELECT * FROM utenti_panini  WHERE username='$classe' AND quantity>'0'";
        //$sql = "SELECT panini.*, utenti_panini.* FROM panini NATURAL JOIN utenti_panini ON panini.id_p = utenti_panini.id_p WHERE role='1';";
        $result = mysqli_query($conn, $sql);
        $orders = mysqli_fetch_all($result, MYSQLI_ASSOC);

        return $orders;
    }

    function getCostbyID_p($panino,$quantita)
    {
        global $conn;
        $sql = "SELECT prezzo FROM panini WHERE nome='$panino'";
        //$sql = "SELECT panini.*, utenti_panini.* FROM panini NATURAL JOIN utenti_panini ON panini.id_p = utenti_panini.id_p WHERE role='1';";
        $result = mysqli_query($conn, $sql);
        $orders = mysqli_fetch_all($result, MYSQLI_ASSOC);

        return $orders[0][prezzo]*$quantita;

    }



    function getDay()
    {
        $day="";
        $n=date(w);
        if($n==1){
            $day="lunedì";
        }
        elseif ($n==2){
            $day="martedì";
        }
        elseif ($n==3){
            $day="mercoldì";
        }
        elseif ($n==4){
            $day="giovedì";
        }
        elseif ($n==5){
            $day="venerdì";
        }
        elseif ($n==6){
            $day="sabato";
        }
        elseif ($n==0){
            $day="domenica";
        }

        return $day;

    }

    function getCredits(){
        $credits="";
        $nomi = array("Vilotto Tommaso","Zugravu Eduard","Castaldini Giovanni","Zerman Nicolò","Gaiga Alex");
        $ct=4;
        $longArr=count($nomi);
        for($i=0;$i<$longArr;$i++){
            $number=mt_rand(0,$ct);
            if($i!=$longArr-1){
                $credits=$credits.$nomi[$number].", ";
            }
            else{
                $credits=$credits.$nomi[0].".";
            }
            unset($nomi[$number]);
            sort($nomi);
            $ct--;
        }
        return $credits;
    }

    function getTotalPanini(){
        global $conn;
        $sql = "SELECT nome,ingredienti,prezzo,quantita,avaiableCK,dispoBK,disponibilita FROM panini";
        $result = mysqli_query($conn, $sql);
        $arrayPanini = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $arrayPanini;
    }

    function getTotalPanini1(){
        global $conn;
        $sql = "SELECT nome,ingredienti,prezzo,quantita,avaiableCK,dispoBK,disponibilita FROM panini WHERE quantita!='-1'";
        $result = mysqli_query($conn, $sql);
        $arrayPanini = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $arrayPanini;
    }



function getTotalPaniniWH(){
    global $conn;
    $sql = "SELECT nome,ingredienti,prezzo,quantita,avaiableCK,dispoBK FROM panini WHERE nome!='ilVilo' AND nome!='edd' AND nome!='nicc' AND nome!='castaCasta' AND nome!='Axeliooo' ";
    $result = mysqli_query($conn, $sql);
    $arrayPanini = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $arrayPanini;
}


    function getAvaiable(){
        global $conn;
        $sql = "SELECT * FROM panini";
        $result = mysqli_query($conn, $sql);
        $arrayPanini = mysqli_fetch_all($result, MYSQLI_ASSOC);
        foreach($arrayPanini as $larray){
            $_POST['disponibilita']= $larray["avaiableCK"];
            return $larray["avaiableCK"];
        }
    }

    function getChecked(){
        if(getAvaiable()==1){
            return "checked";
        }
    }

    function changePanini(){

    }

    function getFraseDisponibilita(){
        $valore=getAvaiable();
        if($valore==0){
            return "<p id='deactivated' >DISATTIVATA</p>";
        }
        else{
            return "<p id='activated' >ATTIVATA</p>";
        }
    }

    function getEasterBread(){
        global $conn;
        $sql = "SELECT nome,ingredienti,prezzo,quantita,avaiableCK,dispoBK FROM panini WHERE quantita='-1' ";
        $result = mysqli_query($conn, $sql);
        $arrayPanini = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $arrayPanini;
}


    function getVisualLogin(){
        global $conn;
        $query = "SELECT viewsLogin FROM visite ";
        $result = $conn->query($query);
        $visiteIndex=mysqli_fetch_array($result);
        $lavisita= $visiteIndex[0];
        return $lavisita;
    }

    function getVisualIndex(){
        global $conn;
        $query = "SELECT viewsIndex FROM visite ";
        $result = $conn->query($query);
        $visiteIndex=mysqli_fetch_array($result);
        $lavisita= $visiteIndex[0];
        return $lavisita;
    }

    function getDisplayValue(){
        $html='';
        $ck=getAvaiable();
        if(!strcmp($ck,"0")){
            $html='style="display:none;"';
        }
        return $html;
    }


    function getDISPONIBILITAPANINO($nome){
        global $conn;
        $sql="SELECT * FROM panini WHERE nome='$nome'";
        $result = mysqli_query($conn, $sql);
        $disp=mysqli_fetch_assoc($result);
        return $disp['quantita'];
    }

    function updateRECORD($classe,$spesa){
        $spesone= getTotalCost($classe);
        if($spesone>$spesa){
            $carrello=$spesone-$spesa;
        }
        else if($carrello==$spesa){
            $carrello=$spesone;
        }
        floor($carrello);
        global $conn;
        $sql="UPDATE utenti SET somma_spesa=somma_spesa+'$carrello' WHERE username='$classe'";
        $result = mysqli_query($conn, $sql);
        echo "la spesa è:".$spesone;
        $sql="SELECT * FROM utenti WHERE username='$classe'";
        $result = mysqli_query($conn, $sql);
        $ARRAYCAZZO=mysqli_fetch_assoc($result);
        echo 'QUESTO è' . $ARRAYCAZZO['spesa_grande'];
        echo 'la clase è:'. $classe;
        echo "<br>";
        print_r($ARRAYCAZZO);
        if($ARRAYCAZZO['spesa_grande']<$spesone){
            $LAVARIABILE=$spesone;
        }
        else{
            $LAVARIABILE=$ARRAYCAZZO['spesa_grande'];
        }
        echo "SU DB C'è" . $LAVARIABILE;

        $sql="UPDATE utenti SET spesa_grande = '$LAVARIABILE' WHERE username='$classe'";
        $result = mysqli_query($conn, $sql);
        echo $result->error; }

    function updateRECORDsasaasdasd1($classe,$spesa){
        $spesone= getTotalCost($classe);
        $carrello= $spesone-$spesa;
        floor($carrello);
        global $conn;
        $sql="UPDATE utenti SET somma_spesa=somma_spesa+'$carrello' WHERE username='$classe'";
        $result = mysqli_query($conn, $sql);
}

 function deleteRECORD($classe,$spesa){
     $spesone= getTotalCost($classe);
        global $conn;
        $sql="UPDATE utenti SET somma_spesa=somma_spesa-'$spesone' WHERE username='$classe'";
        $result = mysqli_query($conn, $sql);
}

function theresORDER(){
    global $conn;
    $sql = "SELECT * FROM utenti_panini";
    $result = mysqli_query($conn, $sql);
    $array=mysqli_fetch_array($result);
    return count($array);
}

function getIfDispo(){
    global $conn;
    $sql = "SELECT nome, disponibilita FROM panini WHERE avaiableCK=1";
    $result = mysqli_query($conn, $sql);
    return  mysqli_fetch_all($result);
}






