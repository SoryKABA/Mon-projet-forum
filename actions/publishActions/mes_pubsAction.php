<?php
require('../actions/database.php');

$affUser = $bdd->prepare("SELECT * FROM publications WHERE id_auteur = ? ORDER BY id_pub DESC");
$affUser->execute(array($_SESSION['id']));
