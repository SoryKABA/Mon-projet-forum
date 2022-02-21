<?php require('../actions/publishActions/responseAction.php'); ?>
<!DOCTYPE html>
<html lang="en">
<?php include('../includes/head.php'); ?>
<body>
<?php include('../includes/navbar.php'); ?> <br>
    <div class="container my-5">
        <div class="card">
            <div class="card-header">
                <p class="card-title"><?= $publish['nom_auteur']; ?> <?= $publish['prenom_auteur']; ?></p>
                <div class="title"><?= $publish['titre']; ?> </div>
            </div>
            <div class="card-body">
                <p class="fs-3"><?= $publish['descriptions']; ?> </p>
                <div class="card-text"><?= $publish['contenus']; ?> </div>
            </div>
            <div class="card-footer">
                <p><?= $publish['date_pub']; ?></p>
            </div>
        </div>
    </div>
    <div class="container my-3" style="widh:60vw;">
         <h3 class="fs-3 text-center">Les réponses</h3><br>
        <?php
            while ($response = $AfficherReponse->fetch()) {
                ?>
                    <div class="card">
                        <div class="card-header">
                            <p class="card-title fs-4"><?php if (!empty($response['photo_auteur'])) { ?> <img src="../actions/images/<?= $response['photo_auteur']; ?>" style="width:50px; height:50px; border-radius: 50%;" alt="">
                            <?php
                            } ?>
                                 <?= $response['nom_auteur']; ?> <?= $response['prenom_auteur']; ?></p>
                        </div>
                        <div class="card-body">
                            <div class="card-text"><?= $response['contenu_reponse']; ?> </div>
                        </div>
                        <div class="card-footer">
                            <p><?= $response['date_rep']; ?></p>
                        </div>
                    </div><br>
                <?php
            }
        ?>
    </div>
    <div class="container">
        <form action="" method="POST">
            <div class="mb-3">
                <div class="row g-3">
                    <div class="col-12">
                        <label for="" class="form-label">Répondre</label>
                        <textarea name="message"  class="form-control"></textarea>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-success" name="validate">Envoyer</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>