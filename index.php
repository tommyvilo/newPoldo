
	<?php //session_start();?>
    <?php require_once("config.php");?>
    <?php include(ROOT_PATH . "/sections/head_section.html"); //incorporo il tag head ?>
    <?php require_once(ROOT_PATH . "/functions/saluto.php");?>
    <?php require_once(ROOT_PATH. "/functions/public_functions.php");?>
    <?php require_once(ROOT_PATH. "/functions/controlloOrdine.php");?>
    <link rel="stylesheet" type="text/css" href="style/clock.css" />
    <link rel="stylesheet" type="text/css" href="style/index.css" />


    </head>
<body onload="controlloBottoni()" data-hijacking="off" data-animation="scaleDown" >


<div class="container">
	<?php include(ROOT_PATH . "/sections/menu_section.php"); $_SESSION['error']="";//incorporo il menu  ?>
    <div class="bordi">






        <div class='wrap' ng-app='app'>

        <div id='countdown' class='time-to'>
            <!--Preordina ora il tuo panino!-->
            <!--<span id="contorovescia" countdown="" date="11-10-2020 07:0:00">&nbsp;</span>-->
            <iframe id="ora" src="ora2.php" style="display:none"></iframe>

            <p id="nini"></p>

            <?php
                /*  date_default_timezone_set('Europe/Rome');

                $d=strtotime("now");
                $day = date('l', strtotime(date("Y-m-d", $d)));
                $hour = (int)date("h", $d);
                $minutes = (int)date("i", $d);
                $seconds= (int)date("s", $d);

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
                    elseif($hour==9 && ($minutes>=30 && $minutes<50)){
                        echo "Tempo rimanente per ritirare i tuoi panini";
                        echo '<span id="contorovescia" countdown="" date="'.date("m-d-Y", $d).' 09:50:00">&nbsp;</span>';
                        echo "GUARDA CARRELLO";
                    }
                    if($day!='Saturday'){
                        if(($hour==9 && $minutes>=50) || ($hour>=10 || $hour<7)) {
                            $d=strtotime("tomorrow");
                            echo "Potrai ordinare i tuoi panini tra";
                            echo '<span id="contorovescia" countdown="" date="' . date("m-d-Y", $d) . ' 7:00:00">&nbsp;</span>';
                            echo "GUARDA CARRELLO";
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
                }*/
            ?>
            <button type="submit" name="btnCarrello" id="bottoneCarrello" onclick="location.href='carrello.php'">Guarda Carrello</button>
            <button type="submit" name="btnOrdina" id="bottoneOrdina" onclick="location.href='panini.php'">Ordina</button>
            <button type="submit" name="btnPanini" id="bottonePanini" onclick="location.href='panini.php'">Guarda i nostri Panini</button>
        </div>

    </div>

        <table style="border:0;margin-right:auto;margin-left:auto;">
        <td><table id="noSmartphone" style="margin-right:8vw;top: 16vw;width: 25vw;" class="fixed_header">
            <thead>
            <tr>
                <th><p>Classifica All-Time</p></th>
            </tr>
            </thead>
            <tbody style="height: 17.1vw;">
            <?php
            $utenti=getClassificaSpesa();
            $contatore=0;
            ?>
            <?php foreach($utenti as $utente): ?>
                <tr style="border-bottom: 1px solid #d8d8d8;">
                    <td>
                        <?php if($contatore==0):?>
                            <img src="/images/coronaOro.PNG" style="height:3vw; ">
                        <?php elseif($contatore==1): ?>
                            <img src="/images/coronaArgento.PNG" style="height:3vw; ">
                        <?php elseif($contatore==2):?>
                            <img src="/images/coronaBronzo.PNG" style="height:3vw; ">
                        <?php endif; ?>
                        <?php $contatore=$contatore+1; ?>
                    </td>
                    <td style="padding-right: 6vw;padding-left: 6vw;">
                        <?php
                        if(strcmp($utente['username'],$_SESSION['user'])){
                            echo '<span style="color:black;">'.$utente['username'].'</span>';
                        }
                        else{
                            echo '<span style="color:red;">'.$utente['username'].'</span>';
                        }
                        ?></td>

                    <td style="padding-right: 6vw;padding-left: 6vw;">
                        <?php
                        if(strcmp($utente['username'],$_SESSION['user'])){
                            echo '<span style="color:black;">'.'€'.$utente['somma_spesa'].'</span>';
                        }
                        else{
                            echo '<span style="color:red;">'.'€'.$utente['somma_spesa'].'</span>';
                        }
                        ?></td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
        </td>
        <td>
        <table id="noSmartphone" style="margin-left:8vw;padding-right:5vw;top: 16vw;width: 25vw;" class="fixed_header">
            <thead>
            <tr>
                <th><p>Classifica Bigger-Order</p></th>
            </tr>
            </thead>
            <tbody style="height: 17.1vw;">
            <?php $utenti=getClassificaGrande();
            $contatore=0;
            ?>
            <?php foreach($utenti as $utente): ?>
                <tr style="border-bottom: 1px solid #d8d8d8;">
                    <td>
                        <?php if($contatore==0):?>
                            <img src="/images/coronaOro.PNG" style="height:3vw; ">
                        <?php elseif($contatore==1): ?>
                            <img src="/images/coronaArgento.PNG" style="height:3vw; ">
                        <?php elseif($contatore==2):?>
                            <img src="/images/coronaBronzo.PNG" style="height:3vw; ">
                        <?php endif; ?>
                        <?php $contatore=$contatore+1; ?>
                    </td>
                    <td style="padding-right: 6vw;padding-left: 6vw;">
                        <?php
                        if(strcmp($utente['username'],$_SESSION['user'])){
                            echo '<span style="color:black;">'.$utente['username'].'</span>';
                        }
                        else{
                            echo '<span style="color:red;">'.$utente['username'].'</span>';
                        }
                        ?></td>
                    <td style="padding-right: 6vw;padding-left: 6vw;">
                        <?php
                        if(strcmp($utente['username'],$_SESSION['user'])){
                            echo '<span style="color:black;">'.'€'.$utente['spesa_grande'].'</span>';
                        }
                        else{
                            echo '<span style="color:red;">'.'€'.$utente['spesa_grande'].'</span>';
                        }
                        ?></td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
        </td>
        </table>


    </div>



    <br>
    <br>
    <br>
    <br>
    <br>

    <?php include(ROOT_PATH . "/sections/footer_section.html"); ?>

</div>

</body>
    <script src='https://ajax.googleapis.com/ajax/libs/angularjs/1.3.2/angular.min.js'></script><script  src="./script.js"></script>
    <script src="js/classie.js"></script>
    <script src="js/main3.js"></script>
    <script src="js/clock.js"></script>
    <script>
        function aggiorna_countdown()
        {
            var iframe=document.getElementById("ora").contentWindow.document.getElementById("count").innerHTML;
            document.getElementById("nini").innerHTML=iframe;
        }
        setInterval(aggiorna_countdown,1);

        function controlloBottoni()
        {
            var numeroGlobale;
            var number = <?php echo $number2=checkOrder($_SESSION['user']);?>;
            var number2 = <?php echo $number3=getNumber();?>;
            if(number2==0 && number==0){
                document.getElementById("bottoneCarrello").style.display="none";
                document.getElementById("bottonePanini").style.display="none";
                document.getElementById("bottoneOrdina").style.display="visible";
            }
            else if(number2==0 && number>0){
                document.getElementById("bottoneCarrello").style.display="visible";
                document.getElementById("bottonePanini").style.display="none";
                document.getElementById("bottoneOrdina").style.display="visible";
            }
            else if(number2==1){
                document.getElementById("bottoneCarrello").style.display="visible";
                document.getElementById("bottonePanini").style.display="none";
                document.getElementById("bottoneOrdina").style.display="none";
            }
            else if(number2==2){
                document.getElementById("bottoneCarrello").style.display="none";
                document.getElementById("bottonePanini").style.display="visible";
                document.getElementById("bottoneOrdina").style.display="none";
            }
            /*if(number==0){
                document.getElementById("bottoneCarrello").style.display="none";
            }
            else{
                document.getElementById("bottoneOrdina").style.display="none";
            }*/
        }
        setInterval(controlloBottoni,1);
    </script>
</html>
