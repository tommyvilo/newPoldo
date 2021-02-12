<?php
require_once("config.php");
$guardaloo=0;
$cliccato=0;
echo $_POST['record'];
echo $_GET['arrayD'];
if(isset($_POST['record'])) {

    $username=$_POST['username'];   //Assegna alla variabile il dato che post ha preso dalle caselle di testo
    $username=$conn -> real_escape_string($username);
	$password= md5($_POST['password']);
	$password1= md5($_POST['password1']);
	unset($_SESSION['message']);
	$sgrevo = '';
	$role = $_POST['role'];
	$query = "SELECT username FROM utenti WHERE username='$username'";
	$result = $conn->query($query);
	$rowcount = mysqli_num_rows($result);
	$_SESSION['message']='';
    
	if($username=='')
    {
    	$sgrevo ='CAMPO MANCANTE';
        setcookie('ALLERT', '1', strtotime("+1 year"), '/');
    }
	else if(!strcmp($password,$password1) && $rowcount==0)
    {
    	$query = "INSERT INTO utenti (username, password, role, somma_spesa,spesa_grande, online) VALUES ('$username','$password','$role',0,0,0)";
    	$result = $conn->query($query); //arrivato qui ho inserito l'utente
    	$sgrevo = $username.$password.$password1;
        setcookie('ALLERT', '0', strtotime("+1 year"), '/');
	}
	else if($rowcount!=0)
    {
    	$sgrevo ='UTENTE GIA REGISTRATO';
        setcookie('ALLERT', '1', strtotime("+1 year"), '/');

    }
	else if(strcmp($password,$password1))
    {
    	$sgrevo ='LE PASSWORD NON CORRISPONDO';
        setcookie('ALLERT', '1', strtotime("+1 year"), '/');
    }
	$_SESSION['message']=$sgrevo;
    $cliccato=1;
    //header("location: ../manageUser.php");
}


elseif(isset($_GET["arrayD"]))
{
    $array=explode(",",$_GET["arrayD"]);
    foreach ($array as $element)
    {
        $query="DELETE FROM utenti WHERE username='$element'";
        $result = $conn->query($query);
        setcookie('ALLERT', '-1', strtotime("+1 year"), '/');
        echo "fammoc";

        header("location: ../manageUser.php");
    }
}



