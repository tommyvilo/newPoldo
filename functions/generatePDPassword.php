<?php require_once("config.php");?>
<?php require_once(ROOT_PATH . "/admin_functions.php");?>
<?php
require_once __DIR__ . '/vendor/autoload.php';
function stampaPDF($users,$arrayPSW){

    $mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/tmp']);

    $stylesheet = file_get_contents('pdf.css'); // external css
    $mpdf->WriteHTML($stylesheet,1);
    $ct=count($users);
    $ct1=0;
    foreach($users as $user){
        $ct1++;

        $mpdf->WriteHTML('<h2>BAR POLDO - CREDENZIALI DI ACCESSO </h2>');
        $mpdf->WriteHTML('<br>');
        $mpdf->WriteHTML("NOME UTENTE: ".$user["username"]);
        $mpdf->WriteHTML('<br>');
        $mpdf->WriteHTML("PASSWORD: ".$arrayPSW[$ct1-1]);

        if($ct!=$ct1){
            $mpdf->AddPage();
        }


        //$mpdf->WriteHTML('<h2>'.$classe["username"].'</h2>');
    }
    $mpdf->SetTitle("PASSWORD_POLDO");
    $mpdf->Output("PASSWORD_POLDO".".pdf",'D');}


