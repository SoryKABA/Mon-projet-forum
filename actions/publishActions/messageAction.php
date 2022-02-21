<?php

require('../actions/database.php');
if (isset($_GET['id']) AND !empty($_GET['id'])) {
    $getId = $_GET['id'];
    $destinataire = $bdd->prepare('SELECT * FROM users WHERE id_user = ?');
    $destinataire->execute(array($getId));
    $infoDestinataire = $destinataire->fetch();

    //$id_destinataire = $infoDestinataire['id_user'];
    $nom_destinataire = $infoDestinataire['nom'];
    $prenom_destinataire = $infoDestinataire['prenom'];
    $photo_destinataire = $infoDestinataire['photo'];
    //var_dump($infoDestinataire);

    if (isset($_POST['validate'])) {
        if ( !empty($_POST['message'])) {
            var_dump($_POST['message']);
            $message_source = nl2br(htmlspecialchars($_POST['message']));
            $id_source = $_SESSION['id'];
            $nom_source = $_SESSION['nom'];
            $prenom_source = $_SESSION['prenom'];
            $photo_source = $_SESSION['photo'];
            //$heure = date('H') - 1;
            $date = date('d/m/Y H:i');
    
            $insertMessage = $bdd->prepare('INSERT INTO messages(contenu_message, id_source, nom_source, prenom_source, photo_source, id_destinataire, nom_destinataire, prenom_destinataire, photo_destinaire, confirm, date_message) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
            $verifyInsert = $insertMessage->execute(array($message_source,
                                             $id_source,
                                             $nom_source,
                                             $prenom_source,
                                             $photo_source,
                                             $getId,
                                             $nom_destinataire,
                                             $prenom_destinataire,
                                             $photo_destinataire,
                                             0,
                                             $date));
            //var_dump($verifyInsert);                               
            // if ($verifyInsert) {
            //    echo "Enregistré avec succès !";
            // }
        }
        
    }

    $messageSource = $bdd->prepare('SELECT * FROM messages WHERE id_source = ? AND id_destinataire = ? || id_source = ? AND id_destinataire = ? ORDER BY id_message ');
    $messageSource->execute(array($_SESSION['id'], $getId, $getId, $_SESSION['id']));

}
