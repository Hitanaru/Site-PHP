<style>
#form
{
	background-image: url(assets/img/img7.jpg);
	background-size: cover;
	padding: 0 15% 1px 15%;	
}


</style>

<div id="form">
	<form action="assets/php/traitement.php" method="post" enctype="multipart/form-data">
	<h1> Create your article </h1>		
	  <div class="form-group">
	    <label for="firstName">First name</label>
	    <input type="text" class="form-control" name="firstName" id="firstName" required pattern="\S+.*" maxlength="100" />
	  </div>

	  <div class="form-group">
	    <label for="lastName">Last name</label>
	    <input type="text" class="form-control" name="lastName" id="lastName" required pattern="\S+.*" maxlength="100">
	  </div>

	  <div class="form-group">
		  <label for="email">Email address</label>
	      <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" required pattern="\S+.*" maxlength="100">
	  </div>

	  <div class="form-group">
	    <label for="message">Message</label>
	    <textarea class="form-control" id="message" name="message" rows="3" required pattern="\S+.*" maxlength="500"></textarea>
	  </div>

	  <div class="form-group">
       	<input type="file" class="form-control-file" name="fichier" id="fichier" required>
  	  </div>

  	  <div class="form-group">
  	  	<input type="submit" value="Send">
  	  </div>
	</form>
</div>

