<?php
require('../actions/database.php');
function security($donnee)
{
    $donnee = htmlspecialchars($donnee);
    $donnee = trim($donnee);
    $donnee = strip_tags($donnee);
    $donnee = stripcslashes($donnee);
    return $donnee;
}
if (isset($_POST['validate'])) {
    if (isset($_POST['title']) && !empty($_POST['title']) && isset($_POST['description']) && !empty($_POST['description']) && isset($_POST['content']) && !empty($_POST['content'])) {
        $title = security($_POST['title']);
        $description = nl2br(security($_POST['description']));
        $content = nl2br(security($_POST['content']));
        
        $insertPub = $bdd->prepare('INSERT INTO publications(titre, descriptions, contenus, id_auteur, nom_auteur, prenom_auteur, photo_auteur) VALUES(?, ?, ?, ?, ?, ?, ?)');
        $test = $insertPub->execute(array($title, 
                                          $description, 
                                          $content, 
                                          $_SESSION['id'], 
                                          $_SESSION['nom'], 
                                          $_SESSION['prenom'],
                                          $_SESSION['photo_auteur']
                                        )
                                    );
        //var_dump($test);
        if ($test) {
            $success = "Votre publication a été publiée avec succès !";
        }
    }else {
        echo "Aucun champ ne doit être vide ";
    }
}