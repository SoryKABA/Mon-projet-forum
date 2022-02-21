<?php
require('../actions/database.php');
if (isset($_GET['id']) AND !empty($_GET['id'])) {
    $getId = $_GET['id'];
    $SelectPub = $bdd->prepare('SELECT * FROM publications WHERE id_pub = ?');
    $SelectPub->execute(array($getId));

    $publish = $SelectPub->fetch();
    if ($_SESSION['auth']) {
        $selectUser = $bdd->prepare('SELECT * FROM users WHERE email = ?');
        $selectUser->execute(array($_SESSION['email']));
        if ($selectUser->rowCount() > 0) {
            if (isset($_POST['validate'])) {
                if (isset($_POST['message']) && !empty($_POST['message'])) {
                    $date = date('F j, Y, g:i a');
                    $userId = $_SESSION['id'];
                    $userLastname = $_SESSION['nom'];
                    $userFirstname = $_SESSION['prenom'];
                    $message = $_POST['message'];
                    $photo = $_SESSION['photo_auteur'];
                    $insertResponse = $bdd->prepare('INSERT INTO reponses(contenu_reponse, id_pub, id_auteur, nom_auteur, prenom_auteur, photo_auteur, date_rep) VALUES(?, ?, ?, ?, ?, ?, ?)');
                    $insertResponse->execute(array($message,
                                                    $getId,
                                                    $userId,
                                                    $userLastname,
                                                    $userFirstname,
                                                    $photo,
                                                    $date));
                }
            }
           
        }else{
            $requet = "Désolé ! vous devez vous inscrire pour pouvoir répondre à une publication "; 
        }

    }
    
    $AfficherReponse = $bdd->prepare('SELECT * FROM reponses WHERE id_pub = ? ORDER BY id_rep DESC');
    $AfficherReponse->execute(array($getId));
}
