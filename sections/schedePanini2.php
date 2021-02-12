
<?php require_once("../config.php");?>
<?php //include(ROOT_PATH . "/sections/head_section.html"); //incorporo il tag head ?>
<?php require_once(ROOT_PATH . "/functions/viewPanini.php");?>


</head>
<body style="background-color: white;">
    <?php header("refresh: 3"); ?>
    <?php $panini=getPanini(); ?>
    <?php foreach ($panini as $panino): ?>
        <p class="quantitaN" id="<?php echo $panino['nome']; ?>"><?php echo $panino['quantita']; ?></p>
        <p class="disponibileN"><?php echo $panino['disponibilita']; ?></p>
        <p class="nomiN"><?php echo $panino['nome']; ?></p>
    <?php endforeach; ?>
    <p id="acaso">O</p>
</body>
</html>