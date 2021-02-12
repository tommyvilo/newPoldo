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
            <h1 id="titoloUser" >Funzionalità</h1>
            <hr style="background-color: orange; height: 3px;">
            <ul>
                <h1>Implementate:</h1>
                <br>
                <p>[Utente] Timer scadenza/ordinazione panini</p>
                <p>[Utente] Sezione ordinazione panini</p>
                <p>[Utente] Gestione ordine tramite carrello</p>
                <p>[Utente] Bottoni gestionali veloci in schermata home per un movimento rapido nel cambio di pagine</p>
                <p>[Utente] Scoreboard delle classi che spendono più soldi</p>
                <p>[Utente] Scheda panino con ingredienti,disponibilità,prezzo,e possibilità di aggiungere o rimuovere</p>
                <p>[Utente] Modificare la password dell' account</p>
                <p>[Utente] Vedere i crediti del sito</p>
                <p>[Utente] Vedere le patchnotes del sito</p>
                <p>[Utente] Vedere la guida del sito</p>
                <p>[Utente] Ricerca panini</p>
                <p>[Utente] Pagina account</p>
                <p>[Utente] Sistemare prenotazioni panini</p>
                <p>[Utente] Aggiungere le coroncine alla classifica</p>
                <p>[Utente] Finire aggiungi panini</p>
                <p>[Venditore] Vedere le ordinazioni delle classi</p>
                <p>[Venditore] Stampare un pdf con tutti gli ordini</p>
                <p>[Venditore] Gestire tutte le proprietà dei panini(disponibilità,prezzo,ingredienti...)</p>
                <p>[Venditore] Vedere data ora e gradi</p>
                <p>[Venditore] Collegarsi alle app del marconi</p>
                <p>[Venditore] Gestire il suo account</p>
                <p>[Venditore] Finire la gestione della disponibilità dei panini</p>
                <p>[Venditore-Utente] Sistemare grafica per tablet</p>
                <p>[Venditore] Gestire tutti gli utenti(nome,password,classificazione)</p>
                <p>[Venditore] Gestire il suo account</p>
                <p>[Venditore] Collegarsi alle app del marconi</p>
                <p>[Venditore] Vedere data ora e gradi</p>
                <p>[Venditore] Aggiungere i controlli dei ruoli</p>
                <p>[Venditore] Finire modifica panini</p>
                <br>
                <h1>Da Implementare:</h1>
                <br>
                <p>[Utente] Panini preferiti</p>
                <p>[Utente] Salvataggio panini prenotati nei cookie ( ma non ordinati )</p>
                <p>[Venditore] Divide mansioni paninare ( paninare low - paninare hight )</p>
                <p>[Utente] Fare in modo che index scorra a blocchi</p>
                <br>
            </ul>
            <a id="about" href="about.php">Dai un'occhiata alla Pagina About!</a>
        </div>
        <?php include(ROOT_PATH . "/sections/footer_section.html"); //incorporo il menu ?>
    </div>
    <script src="js/classie.js"></script>
    <script src="js/main3.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    </body>
</html>


