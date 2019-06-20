<?php
    try
    {    
        // On se connecte à MySQL
        $bdd = new PDO('mysql:host=localhost;dbname=loginsystem;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
    }
    catch(Exception $e)
    {
        // En cas d'erreur, on affiche un message et on arrête tout
            die('Erreur : '.$e->getMessage());
    }

    if(!empty($_FILES))
    {
        $file_name = $_FILES['fichier']['name'];
        $file_type = $_FILES['fichier']['type'];
        $file_extension = strrchr($file_name, ".");
        $file_tmp_name = $_FILES['fichier']['tmp_name'];
        $file_dest = "files/" . $file_name;
        $extensions_autorisees = array('.jpg','.JPG', '.png', '.PNG', '.jpeg', '.JPEG');

        if(in_array($file_extension, $extensions_autorisees))
        {
            if(move_uploaded_file($file_tmp_name, $file_dest))
            {
            	if ($_FILES["fichier"]["size"] < 5000000)
            	{      
                $req = $bdd->prepare('INSERT INTO article(firstName, lastName, email, message, name, files_url) VALUES(?, ?, ?, ?, ?, ?)');
                $req->execute(array($_POST['firstName'], $_POST['lastName'],$_POST['email'], $_POST['message'], $file_name, $file_dest));
                echo "Fichier envoyé avec succès";
            	}
                
            }
            else 
            {
                echo "Une erreur est surevenu lors de l'envoi du fichier";
            }

        }
        else
        {
            echo 'Seuls les fichiers jpg sont autorisees';
        }

        echo 'Nom: '.$file_name.'<br>';
        echo 'Type: '.$file_type.'<br>';
        echo 'Extension: ' .$file_extension;
    }
    

    header('Location: ../../articles.php');
?>
