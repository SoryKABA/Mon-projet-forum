<?php
 require('../database.php');

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $getId = $_GET['id'];
    $Affpub = $bdd->prepare('SELECT * FROM publications WHERE id_pub = ?');
    $Affpub->execute(array($getId));
    if ($Affpub->rowCount() > 0) {
        $delete = $bdd->prepare('DELETE FROM publications WHERE id_pub = ?');
        //var_dump($delete->execute(array($getId)));
        if ($delete->execute(array($getId))) {
            header('Location: ../../views/Mes_pubs.php');
        }  
    }
}