<?php
require('../actions/database.php');

if ($_SESSION['email'] == 'rosticogna@vusra.com') {
    if (isset($_GET['id'])) {
        $getId = $_GET['id'];
        $userMessages = $bdd->prepare('SELECT * FROM publications WHERE id_auteur = ?');
        $userMessages->execute(array($getId));
    }
}