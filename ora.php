
<?php //session_start();?>
<?php require_once("config.php");?>
<?php include(ROOT_PATH . "/sections/head_section.html"); //incorporo il tag head ?>
<?php require_once(ROOT_PATH . "/functions/saluto.php");?>
<?php require_once(ROOT_PATH . "/functions/public_functions.php");?>
<link rel="stylesheet" type="text/css" href="style/clock.css" />

</head>
<body>

<?php
        $d=getTime();
        $day = date('l', strtotime(date("Y-m-d", $d)));
        $hour = (int)date("h", $d);
        $minutes = (int)date("i", $d);
        $seconds= (int)date("s", $d);
        echo $d.'<br>';


    if($day=='Monday' || $day=='Tuesday' || $day=='Wednesday' || $day=='Thursday' || $day=='Friday' || $day=='Saturday'){
        if($hour==7 || ($hour==8 && $minutes<30)){
            echo "Tempo rimanente per ordinare il tuo panino";
            echo '<span id="contorovescia" countdown="" date="'.date("m-d-Y", $d).' 08:30:00">&nbsp;</span>';
            echo "ORDINA";
        }
        elseif(($hour==8 && $minutes>=30) || ($hour==9 && $minutes<30)){
            echo "Puoi andare a ritirare i tuoi panini tra";
            echo '<span id="contorovescia" countdown="" date="'.date("m-d-Y", $d).' 09:30:00">&nbsp;</span>';
            echo "GUARDA CARRELLO";
        }
        elseif($hour==10 && ($minutes>=30 && $minutes<50)){
            echo "Tempo rimanente per ritirare i tuoi panini";
            echo '<span id="contorovescia" countdown="" date="'.date("m-d-Y", $d).' 09:50:00">&nbsp;</span>';
            echo "GUARDA CARRELLO";
        }
        if($day!='Saturday'){
            if(($hour==9 && $minutes>=50) || ($hour>=10 || $hour<7)) {
                $d=strtotime("tomorrow");
                echo $d.'<br>';
                echo "Potrai ordinare i tuoi panini tra".'<br>';
                echo '<span id="contorovescia" countdown="" date="' . date("m-d-Y", $d) . ' 7:00:00">&nbsp;</span>'.'<br>';
                echo "GUARDA CARRELLO".'<br>';
            }

        }
    }
    if($day=='Saturday' && (($hour==9 && $minutes>=50) || ($hour>=10))){
        $d=strtotime("+2 Days");
        echo "Potrai ordinare i tuoi panini tra";
        echo '<span id="contorovescia" countdown="" date="'.date("m-d-Y", $d).' 07:00:00">&nbsp;</span>';
        echo "GUARDA CARRELLO";
    }
    elseif($day=='Sunday') {
        $d = strtotime("tomorrow");
        echo "Potrai ordinare i tuoi panini tra";
        echo '<span id="contorovescia" countdown="" date="' . date("m-d-Y", $d) . ' 07:00:00">&nbsp;</span>';
        echo "GUARDA CARRELLO";
    }
    ?>
</h1>
</body>
</html>