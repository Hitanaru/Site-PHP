<?php

if (isset($_POST['login-submit'])) {

	require 'dbh.inc.php';

	$mailuid = $_POST['mailuid']; // On récupère mailuid dans une variable 
	$password = $_POST['pwd']; // On récupère password dans une variable

	if (empty($mailuid) || empty($password)) { // On check si $mailuid ou $password sont vide et si c'est le cas on renvoie vers la page d'accueil avec une erreur de parametres vide (empty fields)
		header("Location: ../../../index.php?error=emptyfields");
		exit();
	}
	else {
		$sql = "SELECT * FROM users WHERE uidUsers=? OR emailUsers=?;";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			header("Location: ../../../index.php?error=sqlerror");
			exit();
		}
		else {
			mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt); // $result égale les données dans la base de données
			if ($row = mysqli_fetch_assoc($result)) {
				$pwdCheck = password_verify($password, $row['pwdUsers']); // Check si le password dans le login correspond au même que le password enregister dans la bdd avec signup
				if ($pwdCheck == false) {
					header("Location: ../../../index.php?error=wrongpwd");
					exit();
				}
				elseif($pwdCheck == true) {
					session_start();
					$_SESSION['userId'] = $row['idUsers'];
					$_SESSION['userUid'] = $row['uidUsers'];
					header("Location: ../../../index.php?login=success");
					exit();
				}
				else {
					header("Location: ../../../index.php?error=wrongpwd");
					exit();
				}
	
			}
			else {
				header("Location: ../../../index.php?error=nouser");
				exit();

			}
		}
	}

}
else {
	header("Location: ../../../index.php");
	exit();
}