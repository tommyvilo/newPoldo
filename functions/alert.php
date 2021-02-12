<?php
require_once(config.php);

$_SESSION['message']='';
if($username==''){$sgrevo ='Manca un campo';}
elseif(!strcmp($password,$password1) && $rowcount==
    $sgrevo = 'Utente registrato con successo';
}
elseif($rowcount!=0){$sgrevo ='Utente gia registrato';}
elseif(strcmp($password,$password1)){$sgrevo ='Le password non corrispondono';}
$_SESSION['message']=$sgrevo;