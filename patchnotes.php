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
            <h1 id="titoloUser" >Patch Notes</h1>
            <hr style="background-color: orange; height: 3px;">
            <ul>
                <li><h1>Poldo Versione 2.0.4:</h1></li>
                <br>
                <p>[Aggiunta]Tabelle che segnano i record della classe</p>
                <p>[Aggiunta]Categorie per ogni panino in modo da fornire maggiori informaszioni sul prodotto</p>
                <p>[Aggiunta]Ricerca tipizzata per panini in base (prezzo,nome,categorie)</p>
                <p>[BugFix]Fixati problemi di calcolo sei conti</p>
                <p>[Aggiunta]Categorie dei panini</p>
                <br>
                <li><h1>Poldo Versione 2.0.3:</h1></li>
                <br>
                <p>[Modifica]Finazlizzagione grafiche generali del sito</p>
                <p>[BugFix]Problematiche relative al login e altre problematiche relative alla compatibilità su sistemi mobile  </p>
                <p>[Aggiunta] possibilità di stampare la lista panini in PDF</p>
                <br>
                <li><h1>Poldo Versione 2.0.2:</h1></li>
                <br>
                <p>[Modificato] modifica e finalizzazione parte admin e ordinazione panini </p>
                <p>[Aggiunta] parte gestionale personale ATA </p>
                <br>
                <li><h1>Poldo Versione 2.0.1:</h1></li>
                <br>
                <p>[Modificato] Finalizzazione del sistema di login e di ordinazione</p>
                <p>[Aggiunta] Creazione parte back per gli amministratore e sistemi account </p>
                <br>
                <li><h1>Poldo Versione 2.0.2:</h1></li>
                <br>
                <p>[Modificato] implementazione grafica panini e priama abbozza grafica del sistema ordinazioni  </p>
                <p>[Aggiunta] Sistema carrello </p>
                <br>
                <li><h1>Poldo Versione 2.0.1:</h1></li>
                <br>
                <p>[Modificato] Miglioramento e sitsitemazione pagina login</p>
                <p>[Aggiunta] Creazione e aggiunta lista panini </p>
                <br>
                <li><h1>Poldo Versione 2.0:</h1></li>
                <br>
                <p>[Aggiunta] Creazione e reinderizzamento del login </p>
                <p>*Nuova gestione* </p>
                <br>
                <li><h1>Poldo Versione 1.3.1:</h1></li>
                <br>
                <p>[Modificato] hosting e dominio poldo</p>
                <p>[Aggiunto] indirizzo e-mail di contatto sul footer del login</p>
                <p>[Modificata] la guida con i nuovi adattamenti per Poldo esterno</p>
                <p>[BugFix] Sistema offline la domenica</p>
                <p>[BugFix] Panini eliminati non più disponibili</p>
                <p>[Aggiunta] modalità responsive per tablet e smartphone</p>
                <br>
                <li><h1>Poldo Versione 1.3.0:</h1></li>
                <br>
                <p>[Aggiunta] distribuzione intelligente</p>
                <p>[Aggiunto] possibilità di indicare dove prelevare i panini alle 3° ora per un determinato giorno (Poldo si ricorderà di questa scelta per le prossime settimane)</p>
                <p>[Modificata] la lista di selezione: più user friendly</p>
                <p>[Modificata] espanso grafico a mese intero</p>
                <p>[Modificato] il grefico, rimosse le domeniche</p>
                <p>[Bug Fix] lista ordinabile anche la domenica</p>
                <p>[Aggiunta] nuovo panino (contraddistinto dal simbolo "new")</p>
                <p>[Aggiunta] accessibilità a Poldo dall’esterno con mobile</p>
                <p>[Aggiunto] numero di utenti in linea, in credits</p>
                <p>[Modificata] la pagina per le impostazioni utente con l’aggiunta di un flag per abilitare o disabilitare la distribuzione intelligente</p>
                <p>[BugFix] versione Poldo EasterEgg</p>
                <p>[Modificata] la sezione credits</p>
                <p>[Modificato] easter egg</p>
                <p>[Aggiunto] form contatti</p>
                <p>[Bug Fix] errore variabile sec_blocco JS</p>
                <p>[Bug Fix] IE < 9 non più supportato</p>
                <br>
                <li><h1>Poldo Versione 1.2.1:</h1></li>
                <br>
                <p>[Bug fix] Modifica quantità AJAX non funzionante</p>
                <p>[Bug fix] Pop-up blocco liste non funzionante</p>
                <p>[Bug fix] Ottimizzazione codice controllo sessione</p>
                <br>
                <li><h1>Poldo Versione 1.2.0:</h1></li>
                <br>
                <p>[Modifica] al Web Server: cambiato il server interno</p>
                <p>[Bug fix] Elimina panini nelle liste non funzionante</p>
                <p>[Bug fix] select:focus sulle combo</p>
                <p>[Aggiunto] il timeout sessione di 900 secondi</p>
                <p>[Bug fix] Login non case sensitive</p>
                <p>[Bug fix] Grafico non corretto</p>
                <p>[Modifica] ai punti del grafico: più marcati</p>
                <p>[Aggiunta] versione in credits</p>
                <p>[Aggiunto] uppercase nome utente loggato</p>
                <p>[Bug fix] Problema elimina lista e elimina panino explorer</p>
                <p>[Aggiunto] pop-up quando mancano 2 minuti al blocco</p>
                <p>[Aggiunto] pop-up quando mancana 1 minuto al blocco</p>
                <p>[Aggiunto] pop-up quando le liste vengono bloccate</p>
                <p>[Aggiunto] pop-up quando scade la sessione</p>
                <p>[Bug fix] Listino, inserite le varie brioches</p>
                <p>[Aggiunto] uno sfondo alle righe “on mause over” tabelle</p>
                <p>[Aggiunta] possibilità dell’amministratore di attivare/disattivare account</p>
                <p>[Aggiunta] guida utente</p>
                <br>
                <li><h1>Poldo Versione 1.0:</h1></li>
                <p>*Inizio Changelog</p>

            </ul>
            <a id="about" href="funzionalita.php">Vuoi vedere cosa posso fare? Dai un'occhiata alle Funzionalità!</a>
        </div>
        <?php include(ROOT_PATH . "/sections/footer_section.html"); //incorporo il menu ?>
    </div>

    <script src="js/classie.js"></script>
    <script src="js/main3.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    </body>
</html>


