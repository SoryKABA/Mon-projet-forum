<?php
session_start();
if ($_SESSION['auth']) {
    $_SESSION = array();
    session_destroy();

    header('Location: ../../views/signIn.php');
}else {
    echo "Désolé vous n'êtes pas connecté !";
    header('Location: ../../views/signIn.php');
}
