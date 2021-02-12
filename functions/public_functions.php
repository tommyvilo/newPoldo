
<?php
function getPaniniDisponibili()
{
	global $conn;
    
    $sql = "SELECT * FROM panini WHERE quantita!=0";
    $result = mysqli_query($conn, $sql);
    
    $panini = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $panini;
}

function getTime2()
{
    date_default_timezone_set('Europe/Rome');

    $d = strtotime("now");
    $day = date('l', strtotime(date("Y-m-d", $d)));
    $hour = (int)date("h", $d);
    $minutes = (int)date("i", $d);
    $seconds = (int)date("s", $d);

    return $day.":".$hour.":".$minutes.":".$seconds;
}

function getTime()
{
    date_default_timezone_set('Europe/Rome');

    $d = strtotime("now");
    $d2=strtotime("tomorrow");
    $array=array($d,$d2);
    return $array;
}

function getCountdown(){
    date_default_timezone_set('Europe/Rome');

    $dOra=strtotime("now");
    $dOrdinatra=strtotime("now 07:00:00");
    $dOrdinatra2=strtotime("tomorrow 07:00:00");
    $dOrdinatra3=strtotime("+2 Days 07:00:00");
    $dOrdinafino=strtotime("now 08:30:00");
    $dRitiratra=strtotime("now 09:30:00");
    $dRitirafino=strtotime("now 09:50:00");

    $day = date('l', strtotime(date("Y-m-d", $dOra)));
    $hour = (int)date("H", $dOra);
    $minutes = (int)date("i", $dOra);

    if($day=='Monday' || $day=='Tuesday' || $day=='Wednesday' || $day=='Thursday' || $day=='Friday' || $day=='Saturday'){
        if($hour==7 || ($hour==8 && $minutes<30)){
            $dRisultato=$dOrdinafino-$dOra;
            echo '<span id="frase1" >'."Tempo rimanente per ordinare il tuo panino".'</span>';
            $giornirim=floor($dRisultato/(60*60*24));
            $orerim=floor(($dRisultato%(60*60*24))/(60*60));
            $minrim=floor(($dRisultato%(60*60))/(60));
            $secrim=floor(($dRisultato%(60)));
            $orario=$giornirim."D ".$orerim."H ".$minrim."M ".$secrim."S";
            echo '<span id="ilTimer" >'.$orario.'</span>';
        }
        elseif(($hour==8 && $minutes>=30) || ($hour==9 && $minutes<30)){
            $dRisultato=$dRitiratra-$dOra;
            echo '<span id="frase1" >'."Puoi andare a ritirare i tuoi panini tra".'</span>';
            $giornirim=floor($dRisultato/(60*60*24));
            $orerim=floor(($dRisultato%(60*60*24))/(60*60));
            $minrim=floor(($dRisultato%(60*60))/(60));
            $secrim=floor(($dRisultato%(60)));
            $orario=$giornirim."D ".$orerim."H ".$minrim."M ".$secrim."S";
            echo '<span id="ilTimer">'.$orario.'</span>';
        }
        elseif($hour==9 && ($minutes>=30 && $minutes<50)){
            $dRisultato=$dRitirafino-$dOra;
            echo '<span id="frase1" >'."Tempo rimanente per ritirare i tuoi panini<br>".'</span>';
            $giornirim=floor($dRisultato/(60*60*24));
            $orerim=floor(($dRisultato%(60*60*24))/(60*60));
            $minrim=floor(($dRisultato%(60*60))/(60));
            $secrim=floor(($dRisultato%(60)));
            $orario=$giornirim."D ".$orerim."H ".$minrim."M ".$secrim."S";
            echo '<span id="ilTimer">'.$orario.'</span>';
        }
        if($hour>=0 && $hour<7){
            $dRisultato=$dOrdinatra-$dOra;
            echo '<span id="frase1" >'."Potrai ordinare i tuoi panini tra".'</span>';
            $giornirim=floor($dRisultato/(60*60*24));
            $orerim=floor(($dRisultato%(60*60*24))/(60*60));
            $minrim=floor(($dRisultato%(60*60))/(60));
            $secrim=floor(($dRisultato%(60)));
            $orario=$giornirim."D ".$orerim."H ".$minrim."M ".$secrim."S";
            echo '<span id="ilTimer">'.$orario.'</span>';
        }
        if($day!='Saturday'){
            if(($hour==9 && $minutes>=50) || ($hour>=10)) {
                $dRisultato=$dOrdinatra2-$dOra;
                echo '<span id="frase1" >'."Potrai ordinare i tuoi panini tra".'</span>';
                $giornirim=floor($dRisultato/(60*60*24));
                $orerim=floor(($dRisultato%(60*60*24))/(60*60));
                $minrim=floor(($dRisultato%(60*60))/(60));
                $secrim=floor(($dRisultato%(60)));
                $orario=$giornirim."D ".$orerim."H ".$minrim."M ".$secrim."S";
                echo '<span id="ilTimer">'.$orario.'</span>';
            }
        }
    }
    if($day=='Saturday' && (($hour==9 && $minutes>=50) || ($hour>=10))){
        $dRisultato=$dOrdinatra3-$dOra;
        echo '<span id="frase1"  >'."Potrai ordinare i tuoi panini tra".'</span>';
        $giornirim=floor($dRisultato/(60*60*24));
        $orerim=floor(($dRisultato%(60*60*24))/(60*60));
        $minrim=floor(($dRisultato%(60*60))/(60));
        $secrim=floor(($dRisultato%(60)));
        $orario=$giornirim."D ".$orerim."H ".$minrim."M ".$secrim."S";
        echo '<span id="ilTimer">'.$orario.'</span>';
    }
    elseif($day=='Sunday') {
        $dRisultato = $dOrdinatra2 - $dOra;
        echo '<span id="frase1" >' . "Potrai ordinare i tuoi panini tra" . '</span>';
        $giornirim = floor($dRisultato / (60 * 60 * 24));
        $orerim = floor(($dRisultato % (60 * 60 * 24)) / (60 * 60));
        $minrim = floor(($dRisultato % (60 * 60)) / (60));
        $secrim = floor(($dRisultato % (60)));
        $orario = $giornirim . "D " . $orerim . "H " . $minrim . "M " . $secrim . "S";
        echo '<span id="ilTimer">' . $orario . '</span>';
    }
}

function getNumber()
{
    date_default_timezone_set('Europe/Rome');

    $dOra=strtotime("now");
    $dOrdinatra=strtotime("now 07:00:00");
    $dOrdinatra2=strtotime("tomorrow 07:00:00");
    $dOrdinatra3=strtotime("+2 Days 07:00:00");
    $dOrdinafino=strtotime("now 08:30:00");
    $dRitiratra=strtotime("now 09:30:00");
    $dRitirafino=strtotime("now 09:50:00");

    $day = date('l', strtotime(date("Y-m-d", $dOra)));
    $hour = (int)date("H", $dOra);
    $minutes = (int)date("i", $dOra);
    $seconds= (int)date("s", $dOra);
    //echo 'Ciao come stai?';
    //echo $day.'<br>';
    //echo $hour.'<br>';
    //echo $minutes.'<br>';
    //echo $seconds.'<br>';
    global $number;
    /*
     * number = 0 -> bottone ordina oppure ordina/carrello
     * number = 1 -> bottone carrello
     * number = 2 -> controlla i panini
     * number = 3 -> di default (nel caso non andasse modificato)
     */


    if($day=='Monday' || $day=='Tuesday' || $day=='Wednesday' || $day=='Thursday' || $day=='Friday' || $day=='Saturday'){
        if($hour==7 || ($hour==8 && $minutes<30)){
            $number=0;
        }
        elseif(($hour==8 && $minutes>=30) || ($hour==9 && $minutes<30)){
            $number=1;
        }
        elseif($hour==9 && ($minutes>=30 && $minutes<50)){
            $number=1;
        }
        if($day!='Saturday'){
            if(($hour==9 && $minutes>=50) || ($hour>=10 || $hour<7)) {
                $number=2;
            }
            elseif($hour>=0 && $hour<7){
                $number=2;
            }
        }
    }
    if($day=='Saturday' && (($hour==9 && $minutes>=50) || ($hour>=10))){
        $number=2;
    }
    elseif($day=='Sunday') {
        $number=2;
    }
    return $number;
}

function getClassificaSpesa()
{
    global $conn;
    $sql="SELECT * FROM utenti WHERE role=1 AND somma_spesa>0 ORDER BY somma_spesa DESC";
    $result=mysqli_query($conn, $sql);
    $result=mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $result;
}

function getClassificaGrande()
{
    global $conn;
    $sql="SELECT * FROM utenti WHERE role=1 AND spesa_grande>0 ORDER BY spesa_grande DESC";
    $result=mysqli_query($conn, $sql);
    $result=mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $result;
}
?>
