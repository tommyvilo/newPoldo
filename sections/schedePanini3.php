<?php require_once("../config.php");?>
<?php //include(ROOT_PATH . "/sections/head_section.html"); //incorporo il tag head ?>
<?php require_once(ROOT_PATH . "/functions/viewPanini.php");?>


</head>
<body style="background-color: white;">
<?php header("location: schedePanini3.php?nome=".$_GET['nome']); ?>
<?php $panini=getPaniniCercati($_GET['nome']); ?>
<?php foreach ($panini as $panino): ?>
    <p class="quantitaN"><?php echo $panino['quantita']; ?></p>
    <p class="nomiN"><?php echo $panino['nome']; ?></p>
<?php endforeach; ?>
</body>
</html>
