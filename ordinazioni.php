<?php //session_start();?>
<?php require_once("config.php");?>
<?php include(ROOT_PATH . "/sections/head_section.html"); //incorporo il tag head ?>
<?php require_once(ROOT_PATH . "/functions/saluto.php");?>
<?php require_once(ROOT_PATH . "/functions/admin_functions.php");?>
<link rel="stylesheet" type="text/css" href="style/seller.css" />


</head>
<body>
<?php $ordini = getOrder(); ?>
<?php $numeroOrdini = theresORDER(); ?>

<div class="container">
    <?php include(ROOT_PATH . "/sections/menu_sectionSeller.php"); //incorporo il menu ?>
    <div class="bordi" id="sellerPage">

                <h5 id="subtitle">ORDINAZIONI</h5>
                <hr style="background-color: orange; height: 3px;">
        <div id="overlay1" onclick="unshow1()" ></div>
        <div id="avviso1" >
            <h4 id="warning" >ANCORA NESSUN ORDINE</h4>
            <button id="no" onclick="unshow1()" >CHIUDI</button>
        </div>
        <button onclick="printPDF()" id="print" >SCARICA PDF ORDINAZIONI</button>
        <div class="bordi" id="ordinazioni">
            <?php $orders=getOrderUser(); $costi=getTotalCostOfAll(); $classi=getOrderUser(); ?>
                <?php foreach($orders as $order): ?>
                    <a onclick="show('<?php echo $order['username'];?>')" class='box bluefish' id="classe" value="5fi">
                        <h2 id="classeOrd"><?php echo $order['username']; ?></h2>
                    </a>
            <?php endforeach ?>

        <div id="ordinazioneClasse">
            <table id="userTab123">
                <tbody>
                <div onclick="unshow()" id="overlay" ></div>
                    <div id="scontrino">
                        <h5 id="laClasse" ></h5>
                        <h1 id="scontrinoTitolo" >L'ordine contiene:</h1>
                        <div id="ytf"></div>
                        <button id="chiudi" onclick="unshow()"><i class="fas fa-times"></i></button>
                        <hr>
                        <h2 id="totCosti">TOT:</h2>
                    </div>

                </tbody>
            </table>
        </div>




        </div>
    </div>
</div>

<script src='https://ajax.googleapis.com/ajax/libs/angularjs/1.3.2/angular.min.js'></script>
<script type="text/javascript">

    var ar = <?php echo json_encode($ordini) ?>; //trasformo l'array degli ordini da php a js
    var tot= <?php echo json_encode($costi) ?>; //trasformo l'array tot costi da php a js
    var classi= <?php echo json_encode($classi) ?>; //trasformo l'array classi da php a js
    var numOrdini= <?php echo json_encode($numeroOrdini) ?>; //trasformo variabile nuemro ordini da php a js

    function printPDF(){
        if(numOrdini>0){
            window.open('functions/generatePDF.php');
        }
        else{
            show1();
        }
    }

    function show(classe)
    {
        var cd=0;
        document.getElementById("ytf").innerHTML="<tr>";
        var i;
        for(i = 0; i < ar.length; i++){
            if(!classe.localeCompare(ar[i].username)){
                cd++;
                document.getElementById("ytf").innerHTML=document.getElementById("ytf").innerHTML+ar[i].id_p+" x ";
                document.getElementById("ytf").innerHTML=document.getElementById("ytf").innerHTML+ar[i].quantity+"<br>";
            }
        }
        document.getElementById("ytf").innerHTML=document.getElementById("ytf").innerHTML+"</tr>";
        document.getElementById("totCosti").innerHTML=document.getElementById("totCosti").innerHTML+" "+tot[positionClasse(classe)].toFixed(2);
        document.getElementById("totCosti").innerHTML=document.getElementById("totCosti").innerHTML+"€";
        document.getElementById("laClasse").innerHTML=classe;
        document.getElementById("overlay").style.display="block";
        //document.getElementById("ytf").innerHTML=cd;
        document.getElementById("userTab123").style.color="red";
        //document.getElementById("ordinazioneClasse").style.backgroundColor='#1E2B32';
        scontrino.style.animationName="comparsa1";
        scontrino.style.animationDuration="0.7" + "s";
        scontrino.style.animationFillMode="forwards";

    }

    //mi serve per sapere in che posizione è la classe nell'array totOrd
    function positionClasse(classe){
        var i;
        var contatore=0;
        for(i=0;i<classi.length;i++){
            if(!classe.localeCompare(classi[i].username)){
                return contatore;
            }
            contatore++;
        }
    }

    function unshow(){
        //document.getElementById("overlay").style.display="none";
        document.getElementById("totCosti").innerHTML="TOT:"
        scontrino.style.animationName="scomparsa1";
        scontrino.style.animationDuration="0.5s";
        scontrino.style.animationFillMode="forwards";

        var layer=document.getElementById("overlay");
        layer.style.display="none";

    }

    function show1(){
        document.getElementById("overlay1").style.display="block";
        var avviso = document.getElementById("avviso1");
        //document.getElementById("ytf").innerHTML=cd;
        //document.getElementById("userTab123").style.color="red";
        //document.getElementById("ordinazioneClasse").style.backgroundColor='#1E2B32';
        avviso.style.animationName="avvisoSHOW";
        avviso.style.animationDuration="0.4" + "s";
        avviso.style.animationFillMode="forwards";
    }

    function unshow1(){
        var avviso = document.getElementById("avviso1");
        //document.getElementById("overlay").style.display="none";
        avviso.style.animationName="avvisoHIDE";
        avviso.style.animationDuration="0.4s";
        avviso.style.animationFillMode="forwards";

        var layer=document.getElementById("overlay1");
        layer.style.display="none";

    }

</script>
</body>
</html>