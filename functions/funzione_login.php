<?php
$username='';
$password='';
require_once("config.php");
//session_start();

if(isset($_POST['loginBTN']))
{            //IsSet serve a controllare se il bottone è stato cliccato
    $username=$_POST['username'];   //Assegna alla variabile il dato che post ha preso dalle caselle di testo
    $password=$_POST['password'];

    if(empty($username)){ echo "Username non impostato, riprova.";}
    //Controllo se l'username è stato inserito
    elseif(empty($password)){ echo "Password non impostata, riprova.";}
    //Controllo se la password è stata inserita
    else
    {
        $sql="SELECT * FROM 'utenti' WHERE username='$username' LIMIT 1";
        $result= mysqli_query($conn,$sql); //questo esegue questa stringa $conn variabile presa dall'require_once del config.php
        //Logga nel database e assegna l'istruzione (solo stringa), va trasformata in array

        if($result=mysqli_fetch_assoc($result))
        {
            $check=password_verify($password,$result['password']);

            if($check==true)
            {
                header("location: ../ciao.html");
                exit(0);
            }
        }
        header("location: ../index.php");
        exit(0);
    }
}
?>