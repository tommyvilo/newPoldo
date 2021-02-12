<?php require_once("config.php");?>
<?php require_once(ROOT_PATH . "/admin_functions.php");?>
<?php
    require_once __DIR__ . '/vendor/autoload.php';
    $ct=getNumberOrderUser();
    $classi=getOrderUser();
    $mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/tmp']);
    //$mpdf->use_kwt = true;
    $stylesheet = file_get_contents('pdf.css'); // external css
    $mpdf->WriteHTML($stylesheet,1);
    $ct1=0;
    foreach($classi as $classe){
        $ct1++;
        $mpdf->WriteHTML('<h2>BAR POLDO - ' . date("d/m/Y") .'</h2>');
        $mpdf->WriteHTML('<h1>Ordinazione '.$classe["username"].'</h1>');
        $mpdf->WriteHTML('<br>');
        $mpdf->WriteHTML('<table>');
        $mpdf->WriteHTML('<tr>');
        $mpdf->WriteHTML('<th>Panino</th>');
        $mpdf->WriteHTML('<th>Quantità</th>');
        $mpdf->WriteHTML('<th>totPrezzo</th>');
        $mpdf->WriteHTML('</tr>');

        $ordini=getOrderByClass($classe["username"]);
        foreach ($ordini as $ordine){
            $mpdf->WriteHTML('<tr>');
            $mpdf->WriteHTML('<td>'.$ordine["id_p"].'</td>');
            $mpdf->WriteHTML('<td>'.$ordine["quantity"].'pz</td>');
            $costo=getCostbyID_p($ordine["id_p"],$ordine["quantity"]);
            $mpdf->WriteHTML('<td>€'.$costo.'</td>');
            $mpdf->WriteHTML('</tr>');
        }

        $mpdf->WriteHTML('<tr>');
        $mpdf->WriteHTML('<td></td>');
        $mpdf->WriteHTML('<td></td>');
        $mpdf->WriteHTML('<td><hr></td>');
        $mpdf->WriteHTML('</tr>');
        $mpdf->WriteHTML('<tr>');
        $mpdf->WriteHTML('<td></td>');
        $mpdf->WriteHTML('<td></td>');
        $costo=getTotalCost($classe["username"]);
        $mpdf->WriteHTML('<td>€'.$costo.'</td>');
        $mpdf->WriteHTML('</tr>');
        $mpdf->WriteHTML('</table>');
        $mpdf->WriteHTML('<br>');
        if($ct!=$ct1){
            $mpdf->AddPage();
        }


        //$mpdf->WriteHTML('<h2>'.$classe["username"].'</h2>');
    }
    $mpdf->SetTitle("POLDO_".date("d/m/Y"));
    $mpdf->Output("POLDO_".date("d/m/Y").".pdf",'D');


