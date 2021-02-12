
<?php //session_start();?>
<?php require_once("config.php");?>
<?php include(ROOT_PATH . "/sections/head_section.html"); //incorporo il tag head ?>
<?php require_once(ROOT_PATH . "/functions/saluto.php");?>
<?php require_once(ROOT_PATH . "/functions/public_functions.php");?>
<link rel="stylesheet" type="text/css" href="style/clock.css" />
</head>

<p id="count"><?php header("refresh: 1");echo getCountdown(); ?></p>

<body>
</body>
</html>
