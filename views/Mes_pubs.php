<?php require('../actions/publishActions/mes_pubsAction.php');
      require('../actions/UserAction/securityAction.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php include('../includes/head.php'); ?>
<body>
    <?php include('../includes/navbar.php'); ?>
    <div class="container my-5">
        <p class="fs-2 text-center">Mes publications</p><br>
        <?php
            while ($publish = $affUser->fetch()) {
                ?>
                <div class="card">
                    <div class="card-header">
                        <div class="title"><?= $publish['titre']; ?> </div>
                    </div>
                    <div class="card-body">
                        <p class="fs-3"><?= $publish['descriptions']; ?> </p>
                        <div class="card-text"><?= $publish['contenus']; ?> </div>
                    </div>
                    <div class="card-footer">
                        <a href="modifierPub.php?id=<?= $publish['id_pub'];?>" class="text-decoration-none btn btn-info btn-sm">Modifier</a>
                        <a href="../actions/publishActions/supprimerPub_action.php?id=<?= $publish['id_pub'];?>" class="text-decoration-non btn btn-danger btn-sm" onclick="return confirm('Voulez-vous vraiment supprimer cette publication ?')">Supprimer</a>
                        <p><?= $publish['date_pub']; ?></p>
                    </div>
                </div><br>
                <?php
                
            }
        ?>
    </div>
</body>
</html>