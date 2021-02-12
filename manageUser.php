
<?php //
//
//session_start();?>
<?php require_once("config.php");?>
<?php include(ROOT_PATH . "/sections/head_section.html"); //incorporo il tag head ?>
<?php require_once(ROOT_PATH . "/functions/admin_functions.php");?>
<?php require_once(ROOT_PATH . "/functions/addUser.php");?>
<?php require_once(ROOT_PATH ."/libs/Mobile_Detect.php"); ?>
<link rel="stylesheet" type="text/css" href="style/seller.css" />
</head>

<body>
    <div class="container">
        <div id="overlay" onclick="unshow()" ></div>
        <div id="overlay1" onclick="unshow1()" ></div>
        <div id="avviso" >
            <h4 id="warning" >SEI SICURO?</h4>
            <button id="si" onclick="reset()">CONFERMA</button>
            <button id="no" onclick="unshow()" >ANNULLA</button>
        </div>

        <div id="avviso1" >
            <h4 id="warning" ><?php echo $_SESSION['message']; ?></h4>
        </div>

        <?php include(ROOT_PATH . "/sections/menu_sectionSeller.php"); //incorporo il menu ?>
        <div class="bordi" id="sellerPage">
            <h5 id="subtitle">GESTIONE UTENTI</h5>
            <hr style="background-color: orange; height: 3px;">
            <br>
            <br>
            <!--<div class="userTable">-->

            <table id="SHOWtotalBox" >
                <thead></thead>
                <tbody>
                <tr>
                    <td>
                        <?php $detect = new Mobile_Detect; ?>
                        <?php if($detect->isMobile() && !$detect->isTablet()):?>
                            <?php include(ROOT_PATH . "/sections/tabellaUtentiMOBILE.php"); //incorporo la tabella utenti ?>
                        <?php else: ?>
                            <?php include(ROOT_PATH . "/sections/tabellaUtenti.php"); //incorporo la tabella utenti ?>
                        <?php endif; ?>


                </tr>
                </tbody>
            </table>

            <br>
            <br>
            <br>
            <br>
            <form action="manageUser.php" method="post" >
                <input class="form__field"  type="text" id="username" placeholder="nome utente" name="username">
                <input class="form__field"  type="password" id="password" placeholder="password utente" name="password">
                <input class="form__field"  type="password" id="password" placeholder="reinserisci password" name="password1">
                <select id="ruolo" name="role">
                    <option value="0">ADMIN</option>
                    <option value="1">CLASSE</option>
                    <option value="2">ATA</option>
                </select>

                <br>
                <br>
                <button type="submit" name="record"  id="salva1" >SALVA</button>
                <button id="fratmTolti" name="delete" ><a id="eliminaU" href="/functions/addUser.php" >ELIMINA</a></button>

            </form>

            <button type="submit" name="record" onclick="show()" id="fratmTolti">RESET PASSWORD CLASSI</button>
            <br>
            <br>
            <br>
        </div>
    </div>




<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script>

    var controllone = getCookie("ALLERT");
    if(!controllone.localeCompare("1")){
        var avviso = document.getElementById("avviso1");
        avviso.style.animationName="avvisoSHOW";
        avviso.style.animationDuration="0.4" + "s";
        avviso.style.animationFillMode="forwards";
        document.cookie = "ALLERT=; expires=Thu, 01 Jan 1970 00:00:00 UTC;"
        document.getElementById("overlay1").style.display="block";
    }


    function getCookie(name) {
        // Split cookie string and get all individual name=value pairs in an array
        var cookieArr = document.cookie.split(";");

        // Loop through the array elements
        for(var i = 0; i < cookieArr.length; i++) {
            var cookiePair = cookieArr[i].split("=");

            /* Removing whitespace at the beginning of the cookie name
            and compare it with the given string */
            if(name == cookiePair[0].trim()) {
                // Decode the cookie value and return
                return decodeURIComponent(cookiePair[1]);
            }
        }

        // Return null if not found
        return null;
    }



    <?php if(isset($_SESSION['message'])): ?>
        function alert()
        {
            confirm("<?php echo $_SESSION['message']; ?>");
        }
    <?php endif; ?>

    var cliccati=[];
    var link;

    function cambia(id)
    {
        if(cliccati.includes(id))
        {
            cliccati.splice(cliccati.indexOf(id),1);
        }
        else
        {
            cliccati.push(id);
        }

        document.getElementById("eliminaU").href="/functions/addUser.php?arrayD="+cliccati.toString();

    }

    function reset(){
        window.location.href = 'functions/reset.php';
        unshow();
    }

    function show(){
        document.getElementById("overlay").style.display="block";
        var avviso = document.getElementById("avviso");
        //document.getElementById("ytf").innerHTML=cd;
        //document.getElementById("userTab123").style.color="red";
        //document.getElementById("ordinazioneClasse").style.backgroundColor='#1E2B32';
        avviso.style.animationName="avvisoSHOW";
        avviso.style.animationDuration="0.4" + "s";
        avviso.style.animationFillMode="forwards";
    }

    function unshow(){
        var avviso = document.getElementById("avviso");
        //document.getElementById("overlay").style.display="none";
        avviso.style.animationName="avvisoHIDE";
        avviso.style.animationDuration="0.4s";
        avviso.style.animationFillMode="forwards";

        var layer=document.getElementById("overlay");
        layer.style.display="none";

    }

    function unshow1(){
        var avviso1 = document.getElementById("avviso1");
        //document.getElementById("overlay").style.display="none";
        avviso1.style.animationName="avvisoHIDE";
        avviso1.style.animationDuration="0.4s";
        avviso1.style.animationFillMode="forwards";
        var layer=document.getElementById("overlay1");
        layer.style.display="none";

    }


</script>
</body>
</html>