<html>
<head>
    <?php //session_start();?>
    <?php require_once("config.php");?>
    <?php include(ROOT_PATH . "/sections/head_section.html"); //incorporo il tag head ?>
    <?php require_once(ROOT_PATH . "/functions/saluto.php");?>
    <?php require_once(ROOT_PATH . "/functions/admin_functions.php");?>
    <?php require_once(ROOT_PATH . "/functions/weather.php");?>
    <link rel="stylesheet" type="text/css" href="style/seller.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>


<div class="container">
    <?php include(ROOT_PATH . "/sections/menu_sectionAdmin.php"); //incorporo il menu ?>
    <div class="bordi" id="sellerPage">
        <div class="container">
            <h1 id="saluto" >Buongiorno <?php echo $_SESSION['user']; ?></h1>


            <div class='spacer'>
                <a href="manageUser.php" class='wide blue'>
                    <i class="fas fa-cog"></i>
                    <h2>Gestisci Utenti</h2>
                </a>
                <a href="account.php" class='box bluefish'>
                    <i class="fas fa-user"></i>
                    <h2>Account</h2>
                </a>


                <a href="http://apps.marconivr.it/" target="_blank" class='box orange'>
                    <i class="fas fa-graduation-cap"></i>
                    <h2>Apps Marconi</h2>
                </a>
                <a href="https://www.3bmeteo.com/meteo/verona" target="_blank" class='wide blue cal_e'>
                    <h1 class="city">VERONA</h1><h1 id="gradi" ><?php echo getTemp().°; ?></h1><h2><?php echo getDay();?></h2>


                </a>
                <a href="/functions/logout.php" class='box yellow'>
                    <i class="fas fa-sign-out-alt"></i>
                    <h2>LogOut</h2>

                </a>
            </div>
        </div>
    </div>
</div>

<script src='https://ajax.googleapis.com/ajax/libs/angularjs/1.3.2/angular.min.js'></script><script  src="./script.js"></script>
<script src="js/classie.js"></script>
<script //src="js/main3.js"></script>
<script src="js/clock.js"></script>
</body>
</html>