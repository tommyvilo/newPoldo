<!DOCTYPE HTML>
<html lang="it">
    <head>
    <?php session_start();?>
    <?php require_once("config.php");?>
    <?php include(ROOT_PATH . "/sections/head_section.html"); //incorporo il tag head ?>
    <?php require_once(ROOT_PATH . "/functions/public_functions.php");?>
    <?php require_once(ROOT_PATH . "/functions/admin_functions.php");?>
    <?php require_once(ROOT_PATH . "/functions/viewPanini.php");?>
        <link rel="stylesheet" type="text/css" href="style/guida_css.css" />

    </head>
    <body>

        <div class="container">
            <?php include(ROOT_PATH . "/sections/menu_section.php"); //incorporo il menu ?>
            <div class="bordi">
                <h1 id="titoloUser" >About</h1>
                <hr style="background-color: orange; height: 3px;">
                <ul>
                <li id="about" ><p>Poldo 2.0 è una creazione di un gruppo di strudenti della classe 5Fi (2020/2021) dell' ITI Marconi di Verona:<br><?php echo getCredits(); ?></p></li>
                <li id="about" ><p>Il progetto è stato sviluppato sotto la supervisione dei professori Nicola Drago e Patrizia Montagni.</p></li>
                <li id="about" ><p>L'utilizzo di questa applicazione al posto della lista cartacea è stato autorizzato dalla dirigenza mediante l'avv.154 in data 13/1/2014 per tutte le classi dell'Istituto.</p></li>
                <li id="about" ><p>Si ricorda che Poldo non &#232 adibito ad accettare i pagamenti delle liste ma solo le ordinazioni degli alimenti. Resta comunque vincolante il pagamento dei prodotti prenotati.</p></li>


                </ul>
                <a id="about" href="patchnotes.php">Vuoi vedere cosa c'è di nuovo? Dai un'occhiata alle PatchNotes!</a>
            </div>

            <?php include(ROOT_PATH . "/sections/footer_section.html"); ?>

        </div>
        <script src="js/classie.js"></script>
        <script src="js/main3.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    </body>
</html>


