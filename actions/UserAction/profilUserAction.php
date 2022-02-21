<?php
require('../actions/database.php');

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $getId = $_GET['id'];

    $profilUser = $bdd->prepare('SELECT * FROM users WHERE id_user = ?');
    $profilUser->execute(array($getId));
}

$selectUser = $bdd->query('SELECT * FROM users');