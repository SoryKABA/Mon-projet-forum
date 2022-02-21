<?php

require('../database.php');

if ($_SESSION['email'] == 'rosticogna@vusra.com') {
    //var_dump($_GET['id']);
    if (isset($_GET['id'])) {
        $getId = $_GET['id'];
        var_dump($_GET['id']);
        $AffUser = $bdd->prepare('SELECT * FROM users WHERE id_user = ?');
        $AffUser->execute(array($getId));
        if ($AffUser->rowCount() > 0) {
            $deleteUser = $bdd->prepare('DELETE FROM users WHERE id_user = ?');
            //var_dump($deleteUser->execute(array($getId)));
            if ($deleteUser->execute(array($getId))) {
                header('Location: ../../views/users.php');
            }
        }
 }
 if (!empty($_GET['id'])) {
    if (isset($_GET['idp'])) {
        $getMessageId = $_GET['idp'];
        $AffMessage = $bdd->prepare('SELECT * FROM publications WHERE id_pub = ?');
        $AffMessage->execute(array($getMessageId));
        if ($AffMessage->rowCount() > 0) {
            $deleteMessage = $bdd->prepare('DELETE FROM publications WHERE id_pub = ?');
            //var_dump($deleteUser->execute(array($getId)));
            if ($deleteMessage->execute(array($getMessageId))) {
                header('Location: ../../views/userMessages.php?id='.$getId);
            }
        }
    }
}
}else {
    echo "Désolé ! vous n'avez pas le droit de bannir un utilisateur ";
}