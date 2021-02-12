<?php //session_start();?>
<?php require_once("config.php");?>
<?php include(ROOT_PATH . "/sections/head_section.html"); //incorporo il tag head ?>
<?php require_once(ROOT_PATH . "/functions/saluto.php");?>
<?php require_once(ROOT_PATH . "/functions/admin_functions.php");?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <title>es 2 - JQUERY</title>
    <link rel="stylesheet" type="text/css" href="style/prova.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Yusei+Magic&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


    <script>
        $(document).ready(function(){
            $("button").click(function(){  //funzione jquery che entra in azione quando button viene cliccato
                var $p = $("#div2");      //questa funzione sposta in div e cambia il suo colore
                $("div").animate({right: '+=1000px', backgroundColor: "green",color:"yellow"},2000)
                    .animate({top: '+=250px',backgroundColor:"darksalmon",color:"pink"},1000)
                    .animate({right: '-=1000px',backgroundColor:"#1f6b6b",color:"008B8B"},2000)
                    .animate({top: '-=250px',backgroundColor:"#e2d918",color:"black"},1000);
            });
        });

        setInterval(function(){ getUsers(); }, 1000);



        function getUsers()
        {
            var data1=1;
            var $p = $("#IL");
            $.ajax({
                url: "getTheOrder.php",
                async: true ,
                type: 'POST',
                success: function(data) {
                    $p.html(data1);
                }
            });
        }



    </script>
</head>
<body>
<h1 id="titolo" >ESERCIZIO 2</h1>
<button id="move" >CLICCAMI</button>
<center> <div id="div2">
        <p id="IL" >IL</p><p id="CUBO" >CUBO</p>
    </div></center>
</body>
</html></html>