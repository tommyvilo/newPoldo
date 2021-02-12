<?php session_start();?>
<?php require_once("config.php");?>
<?php include(ROOT_PATH . "/sections/head_section.html"); //incorporo il tag head ?>
<?php require_once(ROOT_PATH . "/functions/public_functions.php");?>
<?php require_once(ROOT_PATH . "/functions/viewPanini.php");?>

<script src="https://kit.fontawesome.com/5375d9ae8f.js" crossorigin="anonymous"></script>
</head>
<body>

<?php $panini=getPaniniDisponibili(); ?>

<div class="container">
    <?php include(ROOT_PATH . "/sections/menu_section.php"); //incorporo il menu ?>
    <div id="overlay"></div>
    <div class="bordi">
        <h1 id="titoloUser" >Ordina</h1>
        <button onclick="apriCarrello()" class="carrello"><h3><i id="carrello">0</i>  <i class="fas fa-shopping-cart"></i></h3></button>

        <hr style="background-color: orange; height: 3px;">

        <?php //include(ROOT_PATH . "/sections/schedePanini.php"); //incorporo le schede dei panini da comprare ?>
        <iframe id="view" src="/sections/schedePanini2.php"></iframe>

        <div id="scontrino">
            <h1>Il tuo ordine</h1>
            <button id="chiudi" onclick="chiudiCarrello()"><i class="fas fa-times"></i></button>
            <hr>

            <table style="border: 0;font-size: 1.5vw;color: #e89600;">
                <tr>
                    <td>Panino</td>
                    <td id="price">Prezzo</td>
                </tr>
            </table>
            <hr>
            <div style="height: 52vh;font-size: 1.1vw;" class="ingredienti">
                <table id="lista" style="border: 0;"></table>
            </div>
            <hr>
            <table style="border: 0;">
                <tr>
                    <td><h2>Totale:</h2></td>
                    <td style="position: absolute;right: 4vw;"><button id="ordina">Ordina € <i id="totale">0.00</i></button></td>
                </tr>
            </table>

        </div>
        <br>
        <br>
        <br>
    </div>
</div>
</div>

<script src="js/classie.js"></script>
<script src="js/main3.js"></script>
<script data-main="js/realTimepanini.js" src="require.js"></script>
<script>



    var volta = 0;


    function Cambia()
    {
        var classe=document.getElementById("tipoRicerca");

        if(volta==0)
        {
            classe.innerHTML = "<label onclick='Cambia();' class='switch'><input type='checkbox' checked><span class='slider round'></span></label><select id='ricerca' name='categoria'><option value='0'>categoria1</option><option value='1'>categoria2</option><option value='2'>categoria3</option></select><button id='bottoneR'>Filtra</button>";
            volta=1;
        }
        else
        {
            classe.innerHTML = "<label onclick='Cambia();' class='switch'><input type='checkbox' checked><span class='slider round'></span></label><input type='text' id='ricerca' placeholder='Nome panino' name='nomePanino'><button id='bottoneR'>Filtra</button>";
            volta=0;
        }
    }

    var prenotati=[];
    var prenotatiNomi=[];
    var prenotatiPrezzi=[];


    function aggiungi(id)
    {
        var nome=document.getElementById("nome"+id.toString());
        var prezzo=document.getElementById("prezzo"+id.toString());
        var pulsante=document.getElementById(id.toString());
        var disponibili=document.getElementById("D"+id.toString());
        var carrello=document.getElementById("carrello");

        if(parseInt(disponibili.innerHTML)>0)
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
            disponibili.innerHTML=parseInt(disponibili.innerHTML)-1;

            carrello.innerHTML=prenotati.length;
        }
    }

    function togli(id)
    {
        if(prenotati.includes(id))
        {
            var nome=document.getElementById("nome"+id.toString());
            var prezzo=document.getElementById("prezzo"+id.toString());
            var n=prenotati.indexOf(id);
            prenotati.splice(prenotati.indexOf(id),1); //elimina l'elemento dall'array e sposta gli altri elemneti
            prenotatiNomi.splice(n,1);
            prenotatiPrezzi.splice(n,1);
            var pulsante=document.getElementById(id.toString());
            var disponibili=document.getElementById("D"+id.toString());
            var carrello=document.getElementById("carrello");

            if(pulsante.innerHTML=="1")
            {
                pulsante.innerHTML="+";
            }
            else
            {
                pulsante.innerHTML=parseInt(pulsante.innerHTML)-1;
            }
            disponibili.innerHTML=parseInt(disponibili.innerHTML)+1;

            carrello.innerHTML=prenotati.length;
        }
    }

    var testo="";
    var totale=0.00;

    function compilaCarrello()
    {
        if(prenotati.length!=0)
        {
            testo = "";
            totale = 0.00;
            for (i = 0; i < prenotati.length; i++)
            {
                testo = testo + "<tr><td>" + prenotatiNomi[i] + "</td><td id='price'>" + prenotatiPrezzi[i] + "</td></tr>";
                totale = totale + parseFloat(prenotatiPrezzi[i].substring(2,prenotatiPrezzi[i].length));
                document.getElementById("totale").innerHTML = totale.toFixed(2);
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
        compilaCarrello();
        var layer=document.getElementById("overlay");
        layer.style.display="block";

        var scontrino=document.getElementById("scontrino");
        scontrino.style.animationName="comparsa";
        scontrino.style.animationDuration="0.5s";
        scontrino.style.animationFillMode="forwards";
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


</script>

<?php
//SEI UNO SCHIFO DI MERDA
if(!isset($_SESSION['user'])){
    header("location: login.php");
}
?>

</body>
</html>