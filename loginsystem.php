<!DOCTYPE html>
<html lang="en">
<head>
	<?php include("assets/php/meta.php"); ?>
	<title>index</title>
</head>
<body>
	<?php include("assets/php/header.php"); ?>
		<main>
		<?php
			if (isset($_SESSION['userId'])) {
				echo '<p>Your are logged in!</p>';
			}
		?>
	</main>
	<?php include("assets/php/signup.php"); ?>
	<?php include("assets/php/footer.php"); ?>
</body>
</html>