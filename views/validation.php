<?php
require('../actions/database.php');

if (!empty($_GET['id']) AND !empty($_GET['cle'])) {
    $getId = $_GET['id'];
    $getCle = $_GET['cle'];

    $userSelect = $bdd->prepare('SELECT * FROM users WHERE id_user = ? AND cle = ?');
    $userSelect->execute(array($getId, $getCle));

    if ($userSelect->rowCount() > 0) {
        $infoUser = $userSelect->fetch();

        if ($infoUser['confirm_cle'] != 1) {
            $updateUser = $bdd->prepare('UPDATE users SET confirm_cle = ? WHERE id_user = ?');
            $updateUser->execute(array(1, $getId));
            $_SESSION['cle'] = $getCle;
            header('Location: signIn.php');
        }else {
            $_SESSION['id'] = $getId;
            $_SESSION['cle'] = $getCle;
            header('Location: indexe.php');
        }
    }
}