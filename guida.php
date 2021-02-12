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
            <h1 id="titoloUser" >Guida Utente</h1>
            <hr style="background-color: orange; height: 3px;">
            <ul>
                <h1>Cos'è Poldo?</h1>
                <p style="text-align: left;">Poldo è una web application basata su PHP e MySql.
                    Ciò comporta che non sia necessaria alcuna installazione di software particolari,
                    eccetto un comune Browser. Poldo è stato testato con Chrome e Firefox e gli sviluppatori
                    ne garantiscono il perfetto funzionamento con entrambi.
                    Poldo è ben funzionante anche dai dispositivi mobile e dai tablet grazie alla programmazione responsive</p>
                <br>
                <h1>In che orari funziona?</h1>
                <p>Attualmente è impostato un blocco dopo le 8:30 ma per maggiori dettagli è consigliato consultare nel sito l’apposita dicitura.
                    Oltre questo orario l’utente potrà solo visualizzare ciò che ha ordinato.
                    Quando mancheranno due minuti al blocco delle liste, il sistema notificherà all’utente che il tempo per la compilazione sta per scadere.
                    Quando mancherà un minuto invece, gli utenti che stanno compilando la lista saranno in grado di modificare le quantità fino al blocco delle prenotazioni, per tutti gli altri, il sistema chiuderà preventivamente le liste.
                    <br>
                    <br>
                    <div style="text-align: center;"><img src="../images/timer.PNG"></div>
                    <br>
                    <br>
                <p>L'orario delle prenotazioni sarà continuamente aggiornato dal timer presente nella schermata home.</p>
                </p>
                <br>
                <h1>Login</h1>
                <p>L’interfaccia di Login è semplice ed intuitiva:
                    per accedere è necessario possedere le credenziali comunicate dall’amministratore o impostate dall’utente stesso.
                    L’username è sempre la classe, se non in casi eccezionali.
                    La password, al primo accesso, è quella scritta nel biglietto consegnato il primo giorno di scuola.
                    Essendo stata generata automaticamente non è necessario cambiarla, anche se è consigliato di farlo essendo difficile da ricordare.
                    <br>
                    <br>
                    <div style="text-align: center;"><img src="../images/login.PNG"></div>
                    <br>
                </p>
                <br>
                <h1>Come ordino un panino?</h1>
                <p>Per poter ordinare un panino basta entrare nella sezione " >ordina " dal menù a tendina.
                    Una volta entrati ci si porranno davati la pagina con tutti i panini forniti  di illustrazioni e descrizione.
                    <br>
                    <br>
                    <div style="text-align: center;"><img src="../images/Panino_Sample.PNG"></div>
                    <br>
                    <br>
                    <p>Per ogni panino sarà fornita inoltre la disponibilità attuale e la possibilità di aggiungere o rimuovere i panini dal carrello</p>
                    <br>
                    <br>
                    <div style="text-align: center;"><img src="../images/ordinazione.PNG"></div>
                    <br>
                    <br>
                    <p>Per confermare l' ordine basta controllarlo tramite il piccolo carrello in basso a destra e inviare la conferma tramite il piccolo pulsante che ti anticipa il costo totale</p>
                <br>
                <h1>Cosa indicano le categorie dei panini?</h1>
                <p>Le bandierine che appaiono sopra ad un panino permettono di conoscerne le sue caratteristiche.
                    Ecco quì una breve legenda:
                    <br>
                    <br>
                <div style="text-align: center;"><img src="../images/caldoFreddo0.PNG" style="height: 10vw;"></div>
                <br>
                <br>
                <p style="text-align: center;">I panini con questa bandiera sono panini caldi</p>
                <br>
                <br>
                <div style="text-align: center;"><img src="../images/caldoFreddo1.PNG" style="height: 10vw;"></div>
                <br>
                <br>
                <p style="text-align: center;">I panini con questa bandiera sono panini freddi(temperatura ambiente)</p>
                <br>
                <br>
                <div style="text-align: center;"><img src="../images/DS1.PNG" style="height: 10vw;"></div>
                <br>
                <br>
                <p style="text-align: center;">I panini con questa bandiera sono panini salati</p>
                <br>
                <br>
                <div style="text-align: center;"><img src="../images/DS0.PNG" style="height: 10vw;"></div>
                <br>
                <br>
                <p style="text-align: center;">I panini con questa bandiera sono panini dolci</p>
                <br>
                <br>
                <div style="text-align: center;"><img src="../images/categoria1.PNG" style="height: 10vw;"></div>
                <br>
                <br>
                <p style="text-align: center;">I panini con questa bandiera sono panini contenenti alimenti piccanti</p>
                <br>
                <br>
                <div style="text-align: center;"><img src="../images/categoria2.PNG" style="height: 10vw;"></div>
                <br>
                <br>
                <p style="text-align: center;">I panini con questa bandiera sono panini vegetariani</p>
                <br>
                <br>
                <div><img src="../images/categoria3.PNG" style="height: 10vw;"></div>
                <br>
                <br>
                <p style="text-align: center;">I panini con questa bandiera sono panini Gluten Free</p>
                <br>
                <br>
                <h1>Cosa serve la sezione carrello?</h1>
                <p>La sezione carrello serve a gestire e modificare gli ordini già effettuati rimuovendo prodotti ordinati per sbaglio o soltanto per avere
                    un estratto conto specifico della spesa ordinata.</p>
                    <br>
                    <br>
                    <div style="text-align: center;"><img src="../images/dispon.PNG"></div>
                    <br>
                    <br>

            </ul>
            </div>
        <?php include(ROOT_PATH . "/sections/footer_section.html"); //incorporo il menu ?>
    <script src="js/classie.js"></script>
    <script src="js/main3.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

    </body>
</html>


