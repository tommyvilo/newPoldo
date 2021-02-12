<?php session_start();?>
<?php require_once("config.php");?>
<?php include(ROOT_PATH . "/sections/head_section.html"); //incorporo il tag head ?>
<?php require_once(ROOT_PATH . "/functions/public_functions.php");?>
<?php require_once(ROOT_PATH . "/functions/viewOrdini.php");?>
<?php require_once(ROOT_PATH ."/libs/Mobile_Detect.php"); ?>
</head>

<body onload="scrivi()">

<div class="container">
    <?php include(ROOT_PATH . "/sections/menu_section.php"); //incorporo il menu ?>
    <div id="overlay" onclick="chiudiSlider(0)"></div>
    <div class="bordi">
        <h1 id="titoloUser" >Nel carrello</h1>
        <hr style="background-color: orange;height: 3px;margin-bottom: 3vw;">

        <h2 id="Debug1" style="color: black"></h2>
        <h2 id="Debug2" style="color: black"></h2>

        <?php $ordini=getOrdini(); ?>
        <?php $detect = new Mobile_Detect; ?>

        <?php if(count($ordini)>0): ?>

            <?php if(!($detect->isMobile() && !$detect->isTablet())):?>
            <table style="width: 100%;border: 0;">
                <tr>
                    <td>
                        <h1 style="font-family: 'Bangers';font-weight: 100;font-size: 4vw;">Ecco la tua ordinazione</h1>
                        <button style="background-color: #7c7c7c;" id="Aggiorna" class="aggiungi" disabled onclick="updateOrdine()">Aggiorna ordine</button>
                        <button id="Cancella" class="togli" onclick="apriSlider()">Cancella ordine</button>
                        <h3 id="totale" class="scritteNere"></h3>
                        <h3 id="nPanini" class="scritteNere"></h3>
                        <div class="info">
                        </div>
                    </td>
                    <td>
                        <table class="fixed_header">
                            <thead>
                                <tr>
                                    <th><p>Panino</p></th>
                                    <th><p>Prezzo</p></th>
                                    <th><p>Quantita'</p></th>
                                    <th><p>Modifica</p></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($ordini as $ordine): ?>
                                <tr style="border-bottom: 1px solid #d8d8d8;">
                                    <td style="padding-right: 2.5vw;"><?php echo $ordine['id_p']; ?></td>
                                    <td style="padding-right: 6vw;" class="prezzo">€<?php echo fixaPrezzi($ordine['prezzo']); ?></td>
                                    <td style="padding-right: 4.5vw;" class="quantita" id="Q<?php echo $ordine['id_p']; ?>"><?php echo $ordine['quantity']; ?></td>
                                    <td><button style="background-color: #7c7c7c;" class="aggiungi" id="A<?php echo $ordine['id_p']; ?>" onclick="aggiungi('<?php echo $ordine['id_p']; ?>')" disabled>+</button>   <button id="T<?php echo $ordine['id_p']; ?>" class="togli" onclick="togli('<?php echo $ordine['id_p']; ?>')">-</button></td>
                                </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </table>
            <?php else:?>
                <h1 style="font-family: 'Bangers';font-weight: 100;">Ecco la tua ordinazione</h1>
                <button style="background-color: #7c7c7c;" id="Aggiorna" class="aggiungi" disabled onclick="updateOrdine()">Aggiorna ordine</button>
                <button id="Cancella" class="togli" onclick="apriSlider()">Cancella ordine</button>
                <h3 id="totale" class="scritteNere"></h3>
                <h3 id="nPanini" class="scritteNere"></h3>
                <div class="info">
                </div>

                <table class="fixed_header">
                    <thead>
                    <tr>
                        <th><p>Panino</p></th>
                        <th><p>Prezzo</p></th>
                        <th><p>Quantita'</p></th>
                        <th><p>Modifica</p></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($ordini as $ordine): ?>
                        <tr style="border-bottom: 1px solid #d8d8d8;">
                            <td style="padding-right: 2.5vw;"><?php echo $ordine['id_p']; ?></td>
                            <td style="padding-right: 6vw;" class="prezzo">€<?php echo fixaPrezzi($ordine['prezzo']); ?></td>
                            <td style="padding-right: 4.5vw;" class="quantita" id="Q<?php echo $ordine['id_p']; ?>"><?php echo $ordine['quantity']; ?></td>
                            <td><button style="background-color: #7c7c7c;" class="aggiungi" id="A<?php echo $ordine['id_p']; ?>" onclick="aggiungi('<?php echo $ordine['id_p']; ?>')" disabled>+</button>   <button id="T<?php echo $ordine['id_p']; ?>" class="togli" onclick="togli('<?php echo $ordine['id_p']; ?>')">-</button></td>
                        </tr>
                    <?php endforeach ?>
                    </tbody>
                </table>
            <?php endif; ?>

            <div id="slider">
                <h2>Attenzione !!!</h2>
                <button id="chiudi2" onclick="chiudiSlider(0)"><i class="fas fa-times"></i></button>
                <hr>
                <h3 style="font-size: <?php if($detect->isMobile() && !$detect->isTablet()){ echo '4.5';}else{echo '1.7';}?>vw;" class="scritteNere">Sei sicuro di voler cancellare l'intera ordinazione ?</h3>
                <hr>
                <button style="width: 49%;" class="aggiungi" onclick="chiudiSlider(1)">Sì</button>
                <button style="width: 49%;" class="togli" onclick="chiudiSlider(0)">No</button>
            </div>
        <?php else: ?>
            <h3 id="ops">Ops, il tuo carrello è vuoto !</h3>
        <?php endif; ?>


    </div>


    <?php include(ROOT_PATH . "/sections/footer_section.html"); ?>

</div>
<script src="js/classie.js"></script>
<script src="js/main3.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script>
    differenze=0;
    paniniNomi=[];
    paniniQuantita=[];
    quantitaOriginale=[];



    function togli(panino)
    {
        if(parseInt(document.getElementById("Q"+panino).innerHTML)>0)
        {
            differenze = differenze + 1;

            if (!paniniNomi.includes(panino))
            {
                paniniNomi.push(panino);
                paniniQuantita.push(parseInt(document.getElementById("Q"+panino).innerHTML));
            }
            document.getElementById("Q" + panino).innerHTML = parseInt(document.getElementById("Q" + panino).innerHTML) - 1;
            var n = paniniNomi.indexOf(panino);
            paniniQuantita[n]=paniniQuantita[n]-1;

            if (document.getElementById("A" + panino).innerHTML == "+")
            {
                document.getElementById("A" + panino).innerHTML = 1;
                document.getElementById("A" + panino).style.backgroundColor = "#41ce35";
                document.getElementById("A" + panino).disabled = false;
            }
            else
            {
                document.getElementById("A" + panino).innerHTML = parseInt(document.getElementById("A" + panino).innerHTML) + 1;
            }
            document.getElementById("Aggiorna").style.backgroundColor = "#ffba20";
            document.getElementById("Aggiorna").disabled = false;
            //document.getElementById("Debug1").innerHTML=paniniNomi.toString();
            //document.getElementById("Debug2").innerHTML=paniniQuantita.toString();
        }
        scrivi();

        document.getElementById("Cancella").disabled=true;
        document.getElementById("Cancella").style.backgroundColor="#7c7c7c";
    }



    function aggiungi(panino)
    {
        differenze = differenze - 1;

        document.getElementById("Q" + panino).innerHTML = parseInt(document.getElementById("Q" + panino).innerHTML)+1;
        var n = paniniNomi.indexOf(panino);

        if (parseInt(document.getElementById("A" + panino).innerHTML) == 1)
        {
            document.getElementById("A" + panino).innerHTML = "+";
            document.getElementById("A" + panino).style.backgroundColor = "#7c7c7c";
            document.getElementById("A" + panino).disabled = true;
            paniniNomi.splice(n,1);
            paniniQuantita.splice(n,1);
        }
        else
        {
            document.getElementById("A" + panino).innerHTML = parseInt(document.getElementById("A" + panino).innerHTML) - 1;
            paniniQuantita[n]=paniniQuantita[n]+1;
        }
        if(differenze==0)
        {
            document.getElementById("Aggiorna").style.backgroundColor = "#7c7c7c";
            document.getElementById("Aggiorna").disabled = true;
        }
        //document.getElementById("Debug1").innerHTML=paniniNomi.toString();
        //document.getElementById("Debug2").innerHTML=paniniQuantita.toString();
        scrivi();

        if(differenze==0)
        {
            document.getElementById("Cancella").disabled=false;
            document.getElementById("Cancella").style.backgroundColor="#fd4040";
        }
    }


    function scrivi()
    {
        var prezzi=document.getElementsByClassName("prezzo");
        var quantita=document.getElementsByClassName("quantita");
        var somma=0.0;
        var nPanini=0;

        for(i=0;i<prezzi.length;i++)
        {
            somma=somma+(parseFloat(prezzi[i].innerHTML.substring(1))*parseInt(quantita[i].innerHTML));
            nPanini=nPanini+parseInt(quantita[i].innerHTML);
        }

        document.getElementById("totale").innerHTML="Totale: €"+somma.toFixed(2);
        document.getElementById("nPanini").innerHTML="Numero panini: "+nPanini.toString();
    }



    function deleteOrdine()
    {
        location.replace("https://51.124.169.35/functions/viewOrdini.php?deleteOrdine=1");
    }

    function updateOrdine()
    {
        for(i=0;i<paniniNomi.length;i++)
        {
            quantitaOriginale[i]=parseInt(document.getElementById("Q"+paniniNomi[i]).innerHTML)+parseInt(document.getElementById("A" + paniniNomi[i]).innerHTML);
        }
        location.replace("https://51.124.169.35/functions/viewOrdini.php?nomiPanini="+paniniNomi.toString()+"&quantitaPanini="+paniniQuantita.toString()+"&quantitaOriginale="+quantitaOriginale.toString());
    }


    function apriSlider()
    {
        var layer=document.getElementById("overlay");
        layer.style.display="block";


        var scontrino=document.getElementById("slider");
        scontrino.style.animationName="comparsaS";
        scontrino.style.animationDuration="0.5s";
        scontrino.style.animationFillMode="forwards";
    }


    function chiudiSlider(valore)
    {
        var scontrino=document.getElementById("slider");
        scontrino.style.animationName="scomparsaS";
        scontrino.style.animationDuration="0.5s";
        scontrino.style.animationFillMode="forwards";

        var layer=document.getElementById("overlay");
        layer.style.display="none";

        if(valore==1)
        {
            deleteOrdine();
        }
    }
</script>


</body>
</html>


