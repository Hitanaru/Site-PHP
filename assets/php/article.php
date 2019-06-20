<?php
    try
    {    
        // On se connecte à MySQL
        $bdd = new PDO('mysql:host=localhost;dbname=loginsystem;charset=utf8', 'root', '');
    }
    catch(Exception $e)
    {
        // En cas d'erreur, on affiche un message et on arrête tout
            die('Erreur : '.$e->getMessage());
    }

    //$id = 0;
    $articlesParPage = 5;
    $articlesTotalReq = $bdd->query('SELECT id FROM article');
    $articlesTotal = $articlesTotalReq->rowCount();
    $pageTotales = ceil($articlesTotal/$articlesParPage);

    if(isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page'] <= $pageTotales) {
      $_GET['page'] = intval($_GET['page']);
      $articleCourant = $_GET['page'];
    }
    else {
      $articleCourant = 1;
    }

    
    


    $depart = ($articleCourant-1)*$articlesParPage;
    $requete = $bdd->query('SELECT id, firstName, lastName, email, message, files_url FROM article ORDER BY id DESC LIMIT '.$depart.','.$articlesParPage);

    while ($donnees = $requete->fetch())
    {
    ?>
    <div class="container_article">
        <div class="article">
            <a href="assets/php/<?php echo $donnees['files_url']?>">
            <img src="assets/php/<?php echo $donnees['files_url']?>" class="image_size"></a><br />

        	<?php echo
                  '<div class="firstName_div">'.
                  (htmlspecialchars($donnees['firstName'])). '<br>' .
                  '</div>'.
                  '<div class="lastName_div">'.
        		  (htmlspecialchars($donnees['lastName'])). '<br>' .
                  '</div>'.
                  '<div class="email_div">'.
        		  (htmlspecialchars($donnees['email'])). '<br>' .
                  '</div>'.
                  '<div class="message_div">'.
        		  (htmlspecialchars($donnees['message'])). '<br>'.
                  '</div>' 
                  ?>



        </div>
    </div>
    <?php
    }
    for($i=1;$i<=$pageTotales;$i++) {
      if($i == $articleCourant) {
        echo $i.' ';
      }
      else {
        echo '<a " href="articles.php?page='.
      $i.'">'.$i.'</a>';
      }
    }
    $requete->closeCursor(); // Termine le traitement de la requête
    ?>
