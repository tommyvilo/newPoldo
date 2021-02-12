<?php session_start();?>
<?php require_once("config.php");?>
<?php include(ROOT_PATH . "/sections/head_section.html"); //incorporo il tag head ?>
<?php require_once(ROOT_PATH . "/functions/public_functions.php");?>
<?php require_once(ROOT_PATH . "/functions/updatePassword.php");?>
<link rel="stylesheet" type="text/css" href="style/seller.css" />

</head>

<body>

<div class="container">
    <?php include(ROOT_PATH . "/sections/menu_section.php"); //incorporo il menu ?>
    <div class="bordi">
        <h5 id="subtitle"  style="font-size: 6.5vh;text-align: left;margin-top: 5vh;">Account
        </h5>
        <hr style="background-color: orange; height: 3px;">
        <br>
        <br>
        <p id="titleUSER" >Username: <?php echo $_SESSION['user']?></p>
        <td id="tdMOD" ><p><a id="modPasswd" onclick="modificaPassword()">MODIFICA PASSWORD</a></p></td>

        <form id="form" action="account.php" method="post" style="display:none">
            <input class="form__field" type="password" id="passwordOLD" placeholder="password vecchia" name="OLDpassword">
            <input class="form__field" type="password" id="password" placeholder="nuova password" name="password">
            <input class="form__field" type="password" id="password2" placeholder="reinserisci password" name="password1">
            <button id="buttonSalvaPass" type="submit" name="record1">SALVA</button>
        </form>

    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <?php include(ROOT_PATH . "/sections/footer_section.html"); //incorporo il menu ?>
</div>


<script src="js/classie.js"></script>
<script src="js/main3.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script>
    function mostraPassword(){
        if(document.getElementById("mostraPasswd").value==1) {
            document.getElementById("spanPasswd").style.display = "none";
            document.getElementById("mostraPasswd").innerHTML = "MOSTRA";
            document.getElementById("mostraPasswd").value=15;
        }
        else{
            document.getElementById("spanPasswd").style.display = "inline";
            document.getElementById("mostraPasswd").innerHTML = "(NASCONDI)";
            document.getElementById("mostraPasswd").value=1;

        }
    }

    function modificaPassword(){
        if(document.getElementById("modPasswd").value==1) {
            document.getElementById("form").style.display = "none";
            document.getElementById("modPasswd").innerHTML = "MODIFICA";
            document.getElementById("modPasswd").value=0;
        }
        else{
            document.getElementById("form").style.display = "inline";
            document.getElementById("modPasswd").innerHTML = "NON SALVARE";
            document.getElementById("modPasswd").value=1;
        }
    }
</script>
</body>
</html>

