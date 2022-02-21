<?php

require('../actions/database.php');
// Afficher les publications

$affPub = $bdd->query("SELECT * FROM publications ORDER BY id_pub DESC");
//$affPub->execute();


if (isset($_POST['search']) AND !empty($_POST['search'])) {
    $search = $_POST['search'];
    $affPub = $bdd->query('SELECT * FROM publications WHERE titre LIKE "%'.$search.'%" || descriptions LIKE "%'.$search.'%" || contenus LIKE "%'.$search.'%"');  
}
// Afficher les utilisateurs
$affUser = $bdd->prepare('SELECT * FROM users');
$affUser->execute();

// $infoUser = $affUser->fetch();

// if ($publish['id_auteur'] == $infoUser['id_user']) {
//     $photo_user = $infoUser['photo'];
// }

