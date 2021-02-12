<?php session_start();?>
<?php require_once("config.php");?>
<?php include(ROOT_PATH . "/sections/head_section.html"); //incorporo il tag head ?>
<?php require_once(ROOT_PATH . "/functions/public_functions.php");?>
<?php require_once(ROOT_PATH . "/functions/viewPanini.php");?>
<?php require_once(ROOT_PATH . "/functions/admin_functions.php");?>
<?php require_once(ROOT_PATH ."/libs/Mobile_Detect.php"); ?>

</head>
<body onload="aggiorna2()">
<?php $easter=getEasterBread(); ?>
<?php $panini=getPaniniDisponibili(); ?>


<div class="container">
    <?php include(ROOT_PATH . "/sections/menu_section.php"); //incorporo il menu ?>
    <div id="overlay" onclick="chiudiCarrello()"></div>
    <div class="bordi">
        <table style="border: 0;width: 100%;margin-bottom: -3vw;">
            <tr>
                <td><h1 style="font-size: 6.5vh;text-align: left;margin-top: 5vh;">Ordina</h1></td>

                <?php $detect = new Mobile_Detect; ?>
                <?php if(!($detect->isMobile() && !$detect->isTablet())):?>
                    <td style="text-align: right;"><select id="tipoRicerca" onchange="cambiaRiecrca()"><option value="0">Nome panino</option><option value="1">Categoria panino</option><option value="2">Prezzo panino</option></select><i id="cambiaRicerca"><input id='cercaP' class='cerca' type='text' placeholder='Cerca il tuo panino' onfocus='prova1()' onfocusout='prova2()'></i></td>
            </tr>
                <?php else: ?>
            </tr>
                    <tr>
                        <td style="text-align: left;"><select id="tipoRicerca" onchange="cambiaRiecrca()"><option value="0">Nome panino</option><option value="1">Categoria panino</option><option value="2">Prezzo panino</option></select>
                </tr>
                <tr>
                    <td style="text-align: left;"><i id="cambiaRicerca"><input id='cercaP' class='cerca' type='text' placeholder='Cerca il tuo panino' onfocus='prova1()' onfocusout='prova2()'></i></td>
                </tr>
                <?php endif; ?>

        </table>
        <button onclick="apriCarrello()" class="carrello"><h3><i id="carrello">0</i>  <i id="iconaCarrello" class="fas fa-shopping-cart"></i></h3></button>

        <hr style="background-color: orange; height: 3px;">
        <iframe id="disponibili" style="display: none;" src="/sections/schedePanini2.php"></iframe>
        <iframe id="paniniCercati" style="display: none;"></iframe>
        <iframe id="disponibili2" style="display: none;"></iframe>


        <?php if($detect->isMobile() && !$detect->isTablet()):?>
            <?php include(ROOT_PATH . "/sections/schedePaniniM.php"); //incorporo le schede dei panini da comprare ?>
        <?php else: ?>
            <?php include(ROOT_PATH . "/sections/schedePanini.php"); //incorporo le schede dei panini da comprare ?>
        <?php endif; ?>

        <div id="scontrino">
            <h1>Il tuo ordine</h1>
            <button id="chiudi" onclick="chiudiCarrello()"><i class="fas fa-times"></i></button>
            <hr>

            <table id="testoScontrino" style="border: 0;color: #e89600;width: 100%;">
                <tr>
                    <td>Panino</td>
                    <td id="price" style="right: -3vw;">Prezzo</td>
                </tr>
            </table>
            <hr>
            <div id="paniniScontrino" class="ingredienti">
                <table id="lista" style="border: 0;width: 100%;"></table>
            </div>
            <hr>
            <table style="border: 0;">
                <tr>
                    <td></td>
                    <td style=""><button id="ordina" onclick="book()">Ordina € <i id="totale">0.00</i></button></td>
                </tr>
            </table>

        </div>
        <div id="slider">
            <h2>Seleziona un range</h2>
            <button id="chiudi2" onclick="chiudiSlider(0)"><i class="fas fa-times"></i></button>
            <hr>
            <table style="border: 0;width: 100%;">
                <tr>
                    <td>Minimo</td>
                    <td><input type="range" min="0.5" max="10" value="0.5" step="0.5" class="barraSlider" id="sliderMin"></td>
                    <td id="minimo"></td>
                </tr>
                <tr>
                    <td>Massimo</td>
                    <td><input type='range' min='0.5' max='10' value='7' step="0.5" class="barraSlider" id="sliderMax"></td>
                    <td id="massimo"></td>
                </tr>
            </table>
            <hr>
            <button id="cercaPrezzo" onclick="chiudiSlider(1)">Filtra</button>
        </div>
        <br>
        <br>
        <br>
    </div>
    <?php include(ROOT_PATH . "/sections/footer_section.html"); ?>
</div>
</div>

<script src="js/classie.js"></script>
<script src="js/main3.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script>
    var strCookie="";
    var prenotati=[];
    var prenotatiNomi=[];
    var prenotatiPrezzi=[];
    var prenotatiNomi_global=[]; //array dove metto i nomi seingoli dei panini
    var prenotatiQTY_global=[]; //array dove metto la quantità dei nomi prenotati
    var check = true;
    var uniqueNames="";


    var iframe;
    var quantita=document.getElementsByClassName("quantitaI");
    var paniniTotali=quantita.length;

    var myVar = setInterval(aggiorna2, 3500);

    var easterPanini = <?php echo json_encode($easter); ?>;



    //togliEaster();

    setInterval(
        function togliEaster(){
            var ilTAG;
            for(i=0;i<easterPanini.length;i++){
                ilTAG= "D"+easterPanini[i]['nome'];
                console.log(ilTAG);
                document.getElementById(ilTAG).innerText= '0';
                var square = document.getElementById("square" + easterPanini[i]['nome']);
                var pulsante=document.getElementById(easterPanini[i]['nome']);
                square.style.backgroundColor="#d2d2d2";
                pulsante.style.backgroundColor="#757575";
                pulsante.disabled=true;
            }
        },
        500
    );

    function easterEgg(){

        //document.cookie = "easterEgg=0";
        var valore=document.cookie.indexOf('easterEgg=');
        if(valore==-1){
            console.log("ciao");
            document.cookie = "easterEgg=1";
        }
        else{
            console.log(document.getElementById("carrello").innerText.localeCompare("0"));
            if(!document.getElementById("carrello").innerText.localeCompare("0")){
                var valore=parseInt(getCookie('easterEgg'));
                valore= valore+1;
                document.cookie = "easterEgg=" + valore;
            }

        }
        if((valore)==5){
            location.reload();
        }
    }

    function getCookie(c_name) {
        if (document.cookie.length > 0) {
            c_start = document.cookie.indexOf(c_name + "=");
            if (c_start != -1) {
                c_start = c_start + c_name.length + 1;
                c_end = document.cookie.indexOf(";", c_start);
                if (c_end == -1) {
                    c_end = document.cookie.length;
                }
                return unescape(document.cookie.substring(c_start, c_end));
            }
        }
        return "";
    }

    function aggiorna() {
        var pulsante;
        var square;
        var differenza;
        iframe = document.getElementById("disponibili");
        quantita=document.getElementsByClassName("quantitaI");

        for (i = 0; i < quantita.length; i++)
        {
            pulsante = document.getElementById(iframe.contentWindow.document.getElementsByClassName("nomiN")[i].innerHTML);


            if (pulsante.innerHTML == "+") {
                quantita[i].innerHTML = iframe.contentWindow.document.getElementsByClassName("quantitaN")[i].innerHTML;
            } else if (pulsante.innerHTML != "+") {
                if (parseInt(pulsante.innerHTML) > parseInt(quantita[i].innerHTML) && (parseInt(pulsante.innerHTML) + parseInt(quantita[i].innerHTML)) > parseInt(iframe.contentWindow.document.getElementsByClassName("quantitaN")[i].innerHTML)) {
                    differenza = parseInt(pulsante.innerHTML) - parseInt(quantita[i].innerHTML);
                    for (x = 0; x < differenza; x++) {
                        togli(iframe.contentWindow.document.getElementsByClassName("nomiN")[i].innerHTML);
                    }
                    pulsante.innerHTML = quantita[i].innerHTML;
                    quantita[i].innerHTML = "0";
                } else {
                    quantita[i].innerHTML = parseInt(iframe.contentWindow.document.getElementsByClassName("quantitaN")[i].innerHTML) - parseInt(pulsante.innerHTML);
                }
            }
            if (parseInt(quantita[i].innerHTML) == 0) {
                square = document.getElementById("square" + iframe.contentWindow.document.getElementsByClassName("nomiN")[i].innerHTML);
                square.style.backgroundColor = "#dedede";
                pulsante.style.backgroundColor = "#757575";
                pulsante.disabled = true;
            } else {
                square = document.getElementById("square" + iframe.contentWindow.document.getElementsByClassName("nomiN")[i].innerHTML);
                square.style.backgroundColor = "#faf8f3";
                pulsante.style.backgroundColor = "#41ce35";
                pulsante.disabled = false;
            }

        }

    }

    function cambiaRiecrca()
    {
        var cambia;
        var valore=parseInt(document.getElementById("tipoRicerca").value);

        document.getElementsByClassName("footer")[0].style.display="none";


        switch (valore)
        {
            case 0:
                cambia="<input id='cercaP' class='cerca' type='text' placeholder='Cerca il tuo panino' onfocus='prova1()' onfocusout='prova2()'>";
                break;
            case 1:
                cambia="<select id='cercaP' class='cerca' onchange='cercaPanini()'><option value='-1'>Tutte le categorie</option><option value='0'>Caldo</option><option value='1'>Freddo</option><option value='2'>Salato</option><option value='3'>Dolce</option><option value='4'>Piccante</option><option value='5'>Vegano</option><option value='6'>Senza glutine</option></select>";
                break;
            case 2:
                cambia="<button id='cercaP' class='cerca' onclick='apriSlider()'><i id='minimoScritto'>€0.50</i> - <i id='massimoScritto'>€7.00</i></button>";
                //cambia="<div id='cercaP' class='cerca'><input type='range' min='0.5' max='25.0' value='0.0' step='0.5'><input type='range' min='0.5' max='25.0' value='25.0' step='0.5'></div>";
                break;
        }
        //document.getElementById("prova").innerHTML=valore;
        document.getElementById("cambiaRicerca").innerHTML=cambia;

        clearInterval(myVar);
        document.getElementById("paniniCercati").src = "/sections/schedePaniniCercati.php?tipo=0&dato=";

        document.getElementById("tabellaPanini").style.width = "100%";
        document.getElementById("tabellaPanini").innerHTML = "<tr><td></td><td><img id='loading' src='images/caricamento.GIF'></td><td></td></tr>";
        setTimeout(scrivi, 1300);
    }

    function aggiorna2()
    {
        var pulsante;
        var square;
        var differenza;

        quantita=document.getElementsByClassName("quantitaI");
        iframe = document.getElementById("disponibili");

        if(parseInt(iframe.contentWindow.document.getElementById(quantita[0].id.substring(1)).innerHTML)!=10000) {
            for (i = 0; i < quantita.length; i++) {
                pulsante = document.getElementById(quantita[i].id.substring(1));

                if (pulsante.innerHTML == "+") {
                    quantita[i].innerHTML = iframe.contentWindow.document.getElementById(quantita[i].id.substring(1)).innerHTML;
                } else if (pulsante.innerHTML != "+") {
                    if ((parseInt(pulsante.innerHTML) + parseInt(quantita[i].innerHTML)) > parseInt(iframe.contentWindow.document.getElementById(quantita[i].id.substring(1)).innerHTML)) {
                        differenza = (parseInt(pulsante.innerHTML) + parseInt(quantita[i].innerHTML)) - parseInt(iframe.contentWindow.document.getElementById(quantita[i].id.substring(1)).innerHTML);
                        differenza = differenza - parseInt(quantita[i].innerHTML);
                        if (differenza > 0) {
                            for (x = 0; x < differenza; x++) {
                                togli(quantita[i].id.substring(1));
                            }
                        }
                        quantita[i].innerHTML = "0";
                        if (differenza < 0) {
                            quantita[i].innerHTML = parseInt(quantita[i].innerHTML) - differenza;
                        }
                    } else if ((parseInt(pulsante.innerHTML) + parseInt(quantita[i].innerHTML)) < parseInt(iframe.contentWindow.document.getElementById(quantita[i].id.substring(1)).innerHTML)) {
                        differenza = parseInt(iframe.contentWindow.document.getElementById(quantita[i].id.substring(1)).innerHTML) - (parseInt(pulsante.innerHTML) + parseInt(quantita[i].innerHTML));
                        quantita[i].innerHTML = parseInt(quantita[i].innerHTML) + differenza;
                    }
                    /*
                    if(parseInt(quantita[i].innerHTML)==0)
                    {
                        if(parseInt(pulsante.innerHTML)>parseInt(iframe.contentWindow.document.getElementById(quantita[i].id.substring(1)).innerHTML))
                        {
                            differenza=parseInt(pulsante.innerHTML)-parseInt(iframe.contentWindow.document.getElementById(quantita[i].id.substring(1)).innerHTML);
                            for (x = 0; x < differenza; x++)
                            {
                                togli(quantita[i].id.substring(1));
                            }
                            //pulsante.innerHTML = parseInt(pulsante.innerHTML)-differenza;
                            quantita[i].innerHTML = "0";
                        }
                        else
                        {
                            differenza=parseInt(iframe.contentWindow.document.getElementById(quantita[i].id.substring(1)).innerHTML)-parseInt(pulsante.innerHTML);
                            quantita[i].innerHTML = differenza;
                        }
                    }
                    else if (parseInt(pulsante.innerHTML) > parseInt(quantita[i].innerHTML) && (parseInt(pulsante.innerHTML) + parseInt(quantita[i].innerHTML)) > parseInt(iframe.contentWindow.document.getElementById(quantita[i].id.substring(1)).innerHTML))
                    {
                        differenza = parseInt(pulsante.innerHTML) - parseInt(quantita[i].innerHTML);
                        for (x = 0; x < differenza; x++)
                        {
                            togli(quantita[i].id.substring(1));
                        }
                        pulsante.innerHTML = quantita[i].innerHTML;
                        quantita[i].innerHTML = "0";
                    }
                    else
                    {
                        quantita[i].innerHTML = parseInt(iframe.contentWindow.document.getElementById(quantita[i].id.substring(1)).innerHTML) - parseInt(pulsante.innerHTML);
                    }*/
                }
                if (parseInt(quantita[i].innerHTML) == 0) {
                    square = document.getElementById("square" + quantita[i].id.substring(1));
                    square.style.backgroundColor = "#dedede";
                    pulsante.style.backgroundColor = "#757575";
                    pulsante.disabled = true;
                } else {
                    square = document.getElementById("square" + quantita[i].id.substring(1));
                    square.style.backgroundColor = "#faf8f3";
                    pulsante.style.backgroundColor = "#41ce35";
                    pulsante.disabled = false;
                }
            }
        }
    }




    var cercato="";
    var topicCercato="";
    var prezzi=[];

    function verificaCercato()
    {
        var myVar2 = setInterval(cercaPanini(), 1000);
        //cercato=document.getElementById("cercaP").value;
    }

    function stopCerca()
    {
        setInterval(cercaPanini(), 0);
    }

    function cercaPanini()
    {
        var valore=parseInt(document.getElementById("tipoRicerca").value);
        document.getElementsByClassName("footer")[0].style.display="none";

        switch (valore)
        {
            case 0:
                if(cercato.length != document.getElementById("cercaP").value.length)
                {
                    cercato = document.getElementById("cercaP").value;
                    clearInterval(myVar);
                    document.getElementById("paniniCercati").src = "/sections/schedePaniniCercati.php?tipo=0&dato=" + cercato;

                    document.getElementById("tabellaPanini").style.width = "100%";
                    document.getElementById("tabellaPanini").innerHTML = "<tr><td></td><td><img id='loading' src='images/caricamento.GIF'></td><td></td></tr>";
                    setTimeout(scrivi, 1300);
                }
                break;
            case 1:
                topicCercato=document.getElementById("cercaP").value;
                clearInterval(myVar);
                document.getElementById("paniniCercati").src = "/sections/schedePaniniCercati.php?tipo=1&dato=" + topicCercato;

                document.getElementById("tabellaPanini").style.width = "100%";
                document.getElementById("tabellaPanini").innerHTML = "<tr><td></td><td><img id='loading' src='images/caricamento.GIF'></td><td></td></tr>";
                setTimeout(scrivi, 1300);
                break;
            case 2:
                prezzi[0]=document.getElementById("sliderMin").value;
                prezzi[1]=document.getElementById("sliderMax").value;

                document.getElementById("minimoScritto").innerHTML="€"+parseFloat(prezzi[0]).toFixed(2);
                document.getElementById("massimoScritto").innerHTML="€"+parseFloat(prezzi[1]).toFixed(2);

                //prezzi[0]=1.5;
                //prezzi[1]=2.5;

                clearInterval(myVar);
                document.getElementById("paniniCercati").src = "/sections/schedePaniniCercati.php?tipo=2&dato=" + prezzi.toString();

                document.getElementById("tabellaPanini").style.width = "100%";
                document.getElementById("tabellaPanini").innerHTML = "<tr><td></td><td><img id='loading' src='images/caricamento.GIF'></td><td></td></tr>";
                setTimeout(scrivi, 1300);
                break;
        }
    }

    /*
    function disponibiliCercati()
    {
        cercato = document.getElementById("cercaP").value;
        myVar5="?nome="+cercato;
        document.getElementById("disponibili2").src = "/sections/schedePanini3.php"+myVar5;
    }*/

    function scrivi()
    {
        //document.getElementById("prova").innerHTML=document.getElementById("paniniCercati").contentWindow.document.getElementById("tabellaPanini").innerHTML;
        if(document.getElementById("paniniCercati").contentWindow.document.getElementsByClassName("spiacante").length!=1)
        {
            document.getElementById("tabellaPanini").style.width = "auto";
        }
        document.getElementById("tabellaPanini").innerHTML = document.getElementById("paniniCercati").contentWindow.document.getElementById("tabellaPanini").innerHTML;

        //clearInterval(myVar);
        aggiorna2();
        myVar=setInterval(aggiorna2, 3500);
        document.getElementsByClassName("footer")[0].style.display="block";
        /*
        if(document.getElementsByClassName("quantitaI").length==document.getElementById("disponibili").contentWindow.document.getElementsByClassName("quantitaN").length)
        {
            //clearInterval(myVar3);
            myVar=setInterval(aggiorna2, 3500);
        }
        else
        {
            aggiorna2();
            myVar3=setInterval(aggiorna2, 3500);
        }*/
    }

    var myVar2;
    var myVar3;
    var myVar4;
    var myVar5;

    function prova1()
    {
        myVar2 = setInterval(cercaPanini, 1000);
    }

    function prova2()
    {
        //document.getElementById("prova").innerHTML="goodbye";
        clearInterval(myVar2)
    }



    function aggiungi(id)
    {

        var nome=document.getElementById("nome"+id);
        var prezzo=document.getElementById("prezzo"+id);
        var pulsante=document.getElementById(id);
        var disponibili=document.getElementById("D"+id);
        var carrello=document.getElementById("carrello");
        var check=true;



        if(parseInt(disponibili.innerHTML)>0)
        {
            prenotati.push(id);
            prenotatiNomi.push(nome.innerHTML);
            prenotatiPrezzi.push(prezzo.innerHTML);
            //document.getElementById("whereToPrint").innerHTML=prenotatiPrezzi.toString();
            if(pulsante.innerHTML=="+")
            {
                pulsante.innerHTML=1;
            }
            else
            {
                pulsante.innerHTML=parseInt(pulsante.innerHTML)+1;
            }
            disponibili.innerHTML=parseInt(disponibili.innerHTML)-1;

            carrello.innerHTML=prenotati.length;

            if(parseInt(disponibili.innerHTML)==0)
            {
                var square = document.getElementById("square" + id);
                square.style.backgroundColor="#d2d2d2";
                pulsante.style.backgroundColor="#757575";
                pulsante.disabled=true;
            }
        }
        else
        {
            prenotati.push(id);
            prenotatiNomi.push(nome.innerHTML);
            prenotatiPrezzi.push(prezzo.innerHTML);
            if(pulsante.innerHTML=="+")
            {
                pulsante.innerHTML=1;
            }
            else
            {
                pulsante.innerHTML=parseInt(pulsante.innerHTML)+1;
            }
            carrello.innerHTML=prenotati.length;
        }
    }


    function togli(id)
    {

        if(prenotati.includes(id))
        {
            var nome=document.getElementById("nome"+id);
            var prezzo=document.getElementById("prezzo"+id);
            var n=prenotati.indexOf(id);
            prenotati.splice(prenotati.indexOf(id),1); //elimina l'elemento dall'array e sposta gli altri elementi
            prenotatiNomi.splice(n,1);
            prenotatiPrezzi.splice(n,1);
            var pulsante=document.getElementById(id);
            var disponibili=document.getElementById("D"+id);
            var carrello=document.getElementById("carrello");

            if(pulsante.innerHTML=="1")
            {
                pulsante.innerHTML="+";
            }
            else
            {
                pulsante.innerHTML=parseInt(pulsante.innerHTML)-1;
            }
            if(parseInt(disponibili.innerHTML)>0)
            {
                disponibili.innerHTML = parseInt(disponibili.innerHTML) + 1;
            }

            carrello.innerHTML=prenotati.length;

            if(pulsante.disabled==true)
            {
                var square = document.getElementById("square" + id);
                square.style.backgroundColor="#faf8f3";
                pulsante.style.backgroundColor="#41ce35";
                pulsante.disabled=false;
            }
        }
    }



    function conta(array,stringa)
    {
        var n=0;
        for(x=0;x<array.length;x++)
        {
            if(array[x].localeCompare(stringa)==0)
            {
                n++;
            }
        }
        return n;
    }

    var testo="";
    var totale=0.00;

    function compilaCarrello()
    {
        if(prenotatiNomi.length!=0)
        {
            testo = "";
            totale = 0.00;
            usati=[];
            for (i = 0; i < prenotatiNomi.length; i++)
            {
                if(!usati.includes(prenotatiNomi[i]))
                {
                    var stringaS="";
                    var numero=conta(prenotatiNomi,prenotatiNomi[i]);
                    if(numero>1)
                    {
                        stringaS="  x"+numero;
                    }
                    testo = testo + "<tr><td>" + prenotatiNomi[i] +stringaS+ "</td><td id='price'>" + prenotatiPrezzi[i] + "</td></tr>";
                    //document.getElementById("whereToPrint").innerHTML=i.toString();
                    totale = totale + parseFloat(prenotatiPrezzi[i].substring(2, prenotatiPrezzi[i].length))*numero;
                    document.getElementById("totale").innerHTML = totale.toFixed(2);
                    usati.push(prenotatiNomi[i]);
                }
            }
        }
        else
        {
            testo = "Non hai prenotato niente";
            document.getElementById("totale").innerHTML = "0.00";
        }
        document.getElementById("lista").innerHTML = testo;

    }



    function apriCarrello()
    {
        easterEgg();
        document.cookie = "ordinazione" + "=" + strCookie + "; path=/";
        compilaCarrello();
        var layer=document.getElementById("overlay");
        layer.style.display="block";

        var scontrino=document.getElementById("scontrino");
        scontrino.style.animationName="comparsa";
        scontrino.style.animationDuration="0.5s";
        scontrino.style.animationFillMode="forwards";
    }


    var slider1 = document.getElementById("sliderMin");
    var output1 = document.getElementById("minimo");
    var slider2 = document.getElementById("sliderMax");
    var output2 = document.getElementById("massimo");

    output1.innerHTML = "€ "+parseFloat(slider1.value).toFixed(2);
    output2.innerHTML="€ "+parseFloat(slider2.value).toFixed(2);

    slider1.oninput = function() {
        output1.innerHTML = "€ "+(parseFloat(this.value).toFixed(2));
    }

    slider2.oninput = function() {
        output2.innerHTML = "€ "+(parseFloat(this.value).toFixed(2));
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
            cercaPanini();
        }
    }


    function book(){
        location.replace("/functions/book.php?book="+strCookie);
    }

    function chiudiCarrello()
    {
        var scontrino=document.getElementById("scontrino");
        scontrino.style.animationName="scomparsa";
        scontrino.style.animationDuration="0.5s";
        scontrino.style.animationFillMode="forwards";

        var layer=document.getElementById("overlay");
        layer.style.display="none";
    }





    $(document).ready(function () {
        createCookie("height", $(window).height(), "10");
    });



    //ok adesso provo a creare un cookie per salvare i dati della prenotazione
    function createCookie(name, value, days) {
        var expires;
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toGMTString();
        }
        else {
            expires = "";
        }
        document.cookie = escape(name) + "=" + escape(value) + expires + "; path=/";
    }





    function eraseCookie(name) {
        createCookie(name,"",-1);
    }

    function createCookie(name,value,days) {
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 *1000));
            var expires = "; expires=" + date.toGMTString();
        } else {
            var expires = "";
        }
        document.cookie = name + "=" + value + expires + "; path=/";
    }

    function getUnique(array){
        var uniqueArray = [];

        // Loop through array values
        for(var value of array){
            if(uniqueArray.indexOf(value) === -1){
                uniqueArray.push(value);
            }
        }
        return uniqueArray;
    }


    var controlla=0;

    setInterval(function(){

        uniqueNames = getUnique(prenotatiNomi);

        if(controlla==0 && uniqueNames.length>0){
            controlla=1;
            for (i = 0; i < uniqueNames.length; i++){ //riempio l'array tutto con zeri
                prenotatiQTY_global.push(0);
            }
        }

        var controlla=1;
        for (i = 0; i < prenotati.length; i++) {
            for (y = 0; y < uniqueNames.length; y++) {
                if (!uniqueNames[y].localeCompare(prenotatiNomi[i])) {
                    prenotatiQTY_global[y] += 1;
                    controlla=0;

                }
            }
            if(controlla==1){
                prenotatiQTY_global.push(1);
            }
            else{controlla=1}
        }

        strCookie="";
        var lunghezza = uniqueNames.length;
        lunghezza--;
        for(i=0; i<uniqueNames.length;i++){
            strCookie+=uniqueNames[i]+":"+prenotatiQTY_global[i];
            if(i<lunghezza){
                strCookie+="|";
            }
        }

        //document.getElementById("whereToPrint").innerHTML = strCookie;


        //document.getElementById("whereToPrint").innerHTML = uniqueNames.toString();
        for (i = 0; i < prenotatiQTY_global.length; i++){
            prenotatiQTY_global[i]=0;
        }
        for (i = 0; i < prenotatiNomi_global.length; i++){
            prenotatiNomi_global[i]=" ";
        }
    }, 1000);





</script>


</body>
</html>