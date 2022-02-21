<?php

require('../actions/database.php');
if (isset($_GET['id']) AND !empty($_GET['id'])) {
    $getId = $_GET['id'];

    $AffPub = $bdd->prepare('SELECT * FROM publications WHERE id_pub = ?');
    $AffPub->execute(array($getId));
    if ($AffPub->rowCount() > 0) {
        $infopub = $AffPub->fetch();
    }
}else {
    echo "Aucun utilisateur trouvé !";
}
