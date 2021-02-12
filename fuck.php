<!DOCTYPE html>
<html>
<head>
    <link rel="icon" type="image/gif" size="32x32" href="/images/favicon.png" />
    <link rel="stylesheet" href="/style/style.css">
    <title>Login</title>
    <?php
    require("config.php");
    require("functions/login.php")
    ;?>


    <link href="https://fonts.googleapis.com/css2?family=Bangers&family=Luckiest+Guy&family=Paytone+One&family=Righteous&display=swap" rel="stylesheet">


</head>
<body>
<?php 
session_start();
if(isset($_SESSION['user'])): ?>
    <?php header("location: index.php"); ?>
<?php else: ?>
<div id="formLogin"><form action="/functions/login.php" method="post" >
        <img id="Logo" src="images/Logo.png" style="width: 17vw;margin-bottom: 10vw;margin-top: 7vw;"></a>
        <br>
        <br>
    <h3 style="color: red;"><?php echo $_SESSION['error']; ?></h3>
    <input class="form__field"  type="text" id="username" placeholder="Username" name="username">
    <input class="form__field"  type="password" id="password" placeholder="Password" name="password">
        <br>
        <br>
    <button type="submit" name="login" id="bottoneLogin" >Accedi</button>
    </form>
    </div>
<?php endif ?>
</body>
</html>
?>

