<?php
if (isset($_POST['signup-submit'])) { // Quand on clique sur le bouton dans signup.php
	
	require 'dbh.inc.php'; // Contient la page permettant de nous connecter à la bdd 

	$username = $_POST['uid']; // récupère uid du formulaire dans signup et le met dans $username
	$email = $_POST['mail']; // récupère mail du formulaire dans signup et le met dans $email
	$password = $_POST['pwd']; // récupère pwd du formulaire dans signup et le met dans $password
	$passwordRepeat = $_POST['pwd-repeat']; // récupère pwd-repeat du formulaire dans signup et le met dans $passwordRepeat

	if(empty($username) ||  empty($email) || empty($password) || empty($passwordRepeat)) {
		header("Location: ../../../loginsystem.php?error=emptyfields&uid=".$username."&mail=".$email); // envoie les donnees $username et $email dans l'url si un champ est vide
		exit(); // On ne veut pas continuer le script si l'utilisateur fait une erreur
	}
	elseif(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^.*$/", $username)) {
		header("Location: ../../../loginsystem.php?error=invalidmailuid");  // Si on a une mauvaise adresse email ET un mauvais username, preg_match effectue une recherche de correspondance avec une expression rationnelle standard ("/^[a-zA-Z0-9]*$/")
		exit();
	}
	elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		header("Location: ../../../loginsystem.php?error=invalidmail&uid=".$username); // Si on a une mauvaise adresse mail, on récupère quand même $username dans l'url pour éviter de le réécrire
		exit();
	}
	elseif(!preg_match("/^.*$/", $username)) { // ^ indique le début de la chaine, [] sont les choses que l'on autorisent à être écritent, $ indique la fin de la chaine, 
		header("Location: ../../../loginsystem.php?error=invaliduid&mail=".$email); // Si on a un mauvais username, on récupère quand même $email dans l'url pour éviter de le réécrire
		exit();
	}
	elseif ($password !== $passwordRepeat) {
		header("Location: ../../../loginsystem.php?error=passwordcheck&uid=".$username."&mail=".$email);
		exit(); // Si le password et le passwordRepeat ne sont pas identiques, on récupère aussi l'username et le mail dans l'url
	}
	else {
		$sql = "SELECT uidUsers, emailUsers FROM users WHERE uidUsers= ? AND emailUsers=?"; // Requête préparée avec le placeholder ? c'est plus safe que de mettre la variable ($nom2delavariable), on va récupérer uidUsers et emailUsers pour ensuite voir si ils existent déjà ou pas
		$stmt = mysqli_stmt_init($conn); // stmt = statement, mysqli_stmt_init initialise une commande mysql et retourne un objet à utiliser avec mysqli_stmt_prepare()
		if (!mysqli_stmt_prepare($stmt, $sql)) { // Si la requête à fail
			header("Location: ../../../loginsystem.php?error=sqlerror");
			exit();
		}
		else { // si la requete a réussi
			mysqli_stmt_bind_param($stmt, "ss", $username, $email); // s pour string, un seul car un seul paramètre ( uidUsers = ?)
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt); // mysqli_stmt_get_result récupère un jeu de résultats depuis une requête préparée, en gros il récup ce qu'il y a dans la bdd et l'insert dans $stmt
			while ($row = mysqli_fetch_array($result)) {
				$check_username = $row['uidUsers'];
				$check_email = $row['emailUsers'];
			}

			$check_u = $username == $check_username;
			$check_e = $email == $check_email;
				if ($check_u = $check_u  && !$check_e) {
					header("Location: ../../../loginsystem.php?error=usertaken");
					
					exit();
				}
				elseif (!$check_u && $check_e = $check_e) {
					header("Location: ../../../loginsystem.php?error=emailtaken");
					exit();
				}
				elseif ($check_u = $check_u && $check_e = $check_e) {
					header("Location: ../../../loginsystem.php?error=userandemailtaken");
					exit();
				}
				

			else {

				$sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers) VALUES (?, ?, ?)";
				$stmt = mysqli_stmt_init($conn); // stmt = statement
				if (!mysqli_stmt_prepare($stmt, $sql)) {
					header("Location: ../../../loginsystem.php?error=sqlerror");
					exit();
				}
				else {
					$hashedPwd = password_hash($password, PASSWORD_DEFAULT);

					mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd); // s pour string, trois car trois paramètres dans le INSERT
					mysqli_stmt_execute($stmt);
					header("Location: ../../../loginsystem.php?signup=success");
					exit();
				}
			}

		}
	}
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
	
}

else {
	header("Location: ../../../loginsystem.php");
	exit();

}
