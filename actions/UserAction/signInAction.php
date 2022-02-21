<?php
require('../actions/database.php');
if (isset($_POST['valider'])) {
   $error = [];
    if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])) {
        $login = $_POST['username'];
        $password = $_POST['password'];

        $requet = $bdd->prepare('SELECT * FROM users WHERE email = ?');
        $requet->execute(array($login));
        
        if ($requet->rowCount() > 0) {
            //var_dump();
            $infoUser = $requet->fetch();
           if (password_verify($password, $infoUser['password'])) {
               if ($infoUser['confirm_cle'] == 1) {

                    $_SESSION['auth'] = true;
                    $_SESSION['id'] = $infoUser['id_user'];
                    $_SESSION['nom'] = $infoUser['nom'];
                    $_SESSION['prenom'] = $infoUser['prenom'];
                    $_SESSION['email'] = $infoUser['email'];
                    $_SESSION['photo'] = $infoUser['photo'];
                    header('Location: index.php');
               }else {
                   $error['confirm_cle'] = "Echec d'inscription !";
               }
           }else {
                $error['password'] = "Login ou mot de passe incorrect ";
           }
        }else {
            $error['login'] = "Login ou mot de passe incorrect ";
        }
        
    }else {
        $error = "Les champs ne doivent pas être vides ";
    }
}