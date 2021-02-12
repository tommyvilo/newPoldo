<!DOCTYPE html>
<html oncontextmenu="return false" >
<head>

    <link rel="icon" type="image/gif" size="32x32" href="/images/favicon.png" />
    <link rel="stylesheet" href="/style/style.css">
    <title>Login</title>
    <?php require_once("config.php");?>
    <?php //require_once(ROOT_PATH . "/functions/login.php");?>
    <?php

        $query = "SELECT viewsLogin FROM visite ";
        $result = $conn->query($query);
        $visiteIndex=mysqli_fetch_array($result);
        $lavisita= $visiteIndex[0]+1;
        $query = "UPDATE visite SET viewsLogin='$lavisita' ";
        $conn->query($query);
    ?>



    <link href="https://fonts.googleapis.com/css2?family=Bangers&family=Luckiest+Guy&family=Paytone+One&family=Righteous&display=swap" rel="stylesheet">


</head>
<body>
<?php
//session_start();
if(isset($_SESSION['user'])): ?>
    <?php header("location: index.php"); ?>
<?php else: ?>

<div id="formLogin"><form action="/functions/login.php" method="post" >
        <img id="Logo" src="images/closedLogo.PNG" style=""></a>
        <br>

    <h3 id="errorLogin" ><?php echo $_SESSION['error']; ?></h3>
    <input class="form__field"  type="text" id="username" placeholder="Username" name="username">
    <input class="form__field"  type="password" id="password" placeholder="Password" name="password">
        <br>
        <br>
    <button type="submit" name="login" id="bottoneLogin"  >Accedi</button>
    </form>
    <br>
    <br>
    <h4 id="contatttone" >Problemi con l'accesso? <a style="color: #ffd953; text-decoration: none;" href = "mailto: poldo@marconi.edu.it">CONTATTACI</a></h4>
    </div>

<?php endif ?>
<script>
    document.addEventListener('contextmenu', event => event.preventDefault());

</script>
<script>

    document.cookie = "easterEgg=0";

    document.onkeydown = function (e) {
        e = e || window.event;
        switch (e.which || e.keyCode) {
            case 13 : //Your Code Here (13 is ascii code for 'ENTER')
                break;
        }
    }


    document.onkeydown=function (e){
        if(event.keyCode == 123){
            return false;             }
        if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){
            return false;
        }
        if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)){
            return false;
        }

        if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)){
            return false;
        }
    }
</script>


</body>
</html>
