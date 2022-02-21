<?php require('../actions/publishActions/publishAction.php') ?>
<!DOCTYPE html>
<html lang="en">
<?php include('../includes/head.php'); ?>
<body>
    <?php include('../includes/navbar.php'); ?>
    <div class="container my-5">
        <?php
            while ($publish = $affPub->fetch()) {
                ?>
                <div class="card">
                    <div class="card-header">
                        <p class="card-title fs-4"><?php if (!empty($publish['photo_auteur'])) { ?> <img src="../actions/images/<?= $publish['photo_auteur']; ?>" style="width:50px; height:50px; border-radius: 50%;" alt="">
                            <?php
                            } ?>
                             <?= $publish['nom_auteur']; ?> <?= $publish['prenom_auteur']; ?></p>
                        <div class="title"><?= $publish['titre']; ?> </div>
                    </div>
                    <div class="card-body">
                        <p class="fs-3"><?= $publish['descriptions']; ?> </p>
                        <div class="card-text"><?= $publish['contenus']; ?> </div>
                    </div>
                    <div class="card-footer d-flex flex-row justify-content-between">
                        <a href="responses.php?id=<?= $publish['id_pub'];?>" class="text-end text-decoration-none btn btn-info btn-sm" data-bs-toggle="tooltip" title="Cliquez pour voir toutes les réponses" style="color: #fef; font-size:18px;">Accéder à la pub</a>
                        <p><?= $publish['date_pub']; ?></p>
                    </div>
                </div><br>
                <?php
                
            }
        ?>
    </div>
</body>
</html>