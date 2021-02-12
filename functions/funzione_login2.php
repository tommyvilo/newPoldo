<?php

$username="";
$password="";

if (isset($_POST['loginBTN'])) {
		$username = esc($_POST['username']);
		$password = esc($_POST['password']);

		if (empty($username)) { array_push($errors, "Nome utente non inserito"); }
		if (empty($password)) { array_push($errors, "Password non inserita"); }
		if (empty($errors)) {
			//$password = md5($password); // encrypt password
			$sql = "SELECT * FROM utenti WHERE username='$username' LIMIT 1";

			$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) > 0) {
				// get id of created user
				$reg_user_id = mysqli_fetch_assoc($result); 

				// put logged in user into session array
				//$_SESSION['user'] = getUserById($reg_user_id); 

				// if user is admin, redirect to admin area
				if ( in_array($_SESSION['user']['role'], ["Admin", "Author"])) {
					$_SESSION['message'] = "Accesso effettuato con successo";
					// redirect to admin area
					header('location: admin/dashboard.php');
					exit(0);
				} else {
					$_SESSION['message'] = "Accesso effettuato con successo";
					// redirect to public area
					header('location: index.php');				
					exit(0);
				}
			} else {
				array_push($errors, 'Le credenziali immesse non sono corrette');
			}
		}
	}
?>