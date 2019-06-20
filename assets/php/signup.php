<main>
		<section class="signup">
			<h1>Signup</h1>
			<?php
			if (isset($_GET['signup']) == "success") {
				echo '<p class="signupsuccess">Signup succesfull!</p>';
			}
			elseif (isset($_GET['error'])) {
				if ($_GET['error'] == "emptyfields") {
					echo '<p class ="signuperror">Fill in all fields</p>';
				}
				elseif ($_GET['error'] == "invaliduidmail") {
					echo '<p class ="signuperror">Invalide username and e-mail</p>';
				}
				elseif ($_GET['error'] == "invaliduid") {
					echo '<p class ="signuperror">Invalide username</p>';
				}
				elseif ($_GET['error'] == "invalidmail") {
					echo '<p class ="signuperror">Invalide e-mail</p>';
				}
				elseif ($_GET['error'] == "passwordcheck") {
					echo '<p class ="signuperror">Passwords are not the same</p>';
				}
				elseif ($_GET['error'] == "usertaken") {
					echo '<p class ="signuperror">Username is already taken</p>';
				}
				elseif ($_GET['error'] == "emailtaken") {
					echo '<p class ="signuperror">Email is already taken</p>';
				}
				elseif ($_GET['error'] == "userandemailtaken") {
					echo '<p class ="signuperror">Username and email are already taken</p>';
				}
			}
			?>
			<form action="assets/php/includes/signup.inc.php" method="post">
				<input type="text" name="uid" placeholder="Username"><br>
				<input type="text" name="mail" placeholder="E-mail"><br>
				<input type="password" name="pwd" placeholder="Password"><br>
				<input type="password" name="pwd-repeat" placeholder="Repeat password"><br><br>
				<button type="submit" name="signup-submit">Signup</button>
			</form>
		</section>
	</main>

	
