<?php
	session_start();
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="description" content="This is an example of a meta description. This will often show up in search results.">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login system</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">

</head>
<body>

<header>
	<div class="header-login">
		<?php
			if (isset($_SESSION['userId'])) {
				echo '<nav class="navbar navbar-expand-sm navbar-dark bg-secondary logout-submit">
						<form action="assets/php/includes/logout.inc.php" method="post">
					  	<button type="submit" name="logout-submit">Logout</button>
					  	</form>
					  </nav>';
			}
			else {
				echo '<nav class="navbar navbar-expand-sm navbar-dark bg-secondary login-submit">
						<button class="navbar-toggler" data-toggle="collapse" data-target="#collapse_target">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse" id="collapse_target">
							<form action="assets/php/includes/login.inc.php" method="post" class="ml-auto">
								<ul class="navbar-nav login-nav">
									<li class="nav-item input-item">
										<input type="text" name="mailuid" placeholder="Username/E-mail...">
									</li>
									<li class="nav-item input-item">
										<input type="password" name="pwd" placeholder="Password...">
									</li>
									<li class="nav-item login-item">
										<button type="submit" name="login-submit" class="login-button">Login</button>
									</li>
									<li class="nav-item signup-item">
										<a href="loginsystem.php">Signup</a>
									</li>
								</ul>
							</form>
						</div>
					  </nav>';
				
			}
		?>
		
			
		
	</div>
</header>

<div class="header">
	<nav class="navbar navbar-expand-sm navbar-dark bg-dark ">
		<a href="index.php" class="navbar-brand offset-2 cats"><img src="assets/img/catlogo.png"></a>
		<button class="navbar-toggler" data-toggle="collapse" data-target="#navbarMenu">
			<span class="navbar-toggler-icon"></span>
		</button> 
		<div class="collapse navbar-collapse offset-2" id="navbarMenu">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a href="index.php" class="nav-link">Home</a>
				</li>
				<li class="nav-item">
					<a href="articles.php" class="nav-link">Articles</a>
				</li>
				<li class="nav-item">
					<a href="form.php" class="nav-link">Form</a>
				</li>
			</ul>
		</div>					
	</nav>
</div>


</body>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
