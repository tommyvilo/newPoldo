<?php session_start();?>
<?php require_once("config.php");?>
<?php include(ROOT_PATH . "/sections/head_section.html"); //incorporo il tag head ?>
<?php require_once(ROOT_PATH . "/functions/public_functions.php");?>
<?php require_once(ROOT_PATH . "/functions/admin_functions.php");?>
<link rel="stylesheet" type="text/css" href="style/seller.css" />

</head>

<body>

<div class="container">
    <?php include(ROOT_PATH . "/sections/menu_sectionSeller.php"); //incorporo il menu ?>
    <div class="bordi">
        <h5 id="subtitle"  style="font-size: 6.5vh;text-align: left;margin-top: 5vh;">INSIGHT</h5>
        <hr style="background-color: orange; height: 3px;">

        <table id="checkBox2" >
            <td>
                <table id="insight">
                    <thead>
                    <td id="td1">VISITE PAGINA LOGIN</td>
                    <td id="td2">LOGIN EFFETTUATI</td>
                    </thead>
                    <tbody>
                    <th id="th1"><?php echo getVisualLogin();?></th>
                    <th id="th2"><?php echo getVisualIndex();?></th>
                    </tbody>
                </table>
            </td>
        </table>
    </div>
</div>





<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script>

</script>
</body>
</html>

