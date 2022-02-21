<?php
    require('../actions/publishActions/userMessagesAction.php');
    require('../actions/UserAction/securityAction.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php include('../includes/head.php'); ?>
<body>
<?php include('../includes/navbar.php'); ?><br><br>
  <div class="container" style="width:80vw;">
  <?php
    while ($messages = $userMessages->fetch()) {
        ?>
        <div class="card" style="width: 70vw;">
        <div class="card-header">
            <div class="card-title">
                <img src="../actions/images/<?= $messages['photo_auteur']; ?>" alt="" style="width:40px; height: 40px; border-radius: 50%;"> <?= $messages['prenom_auteur']; ?> <?= $messages['nom_auteur']; ?>
                <p class="card-text"><?= $messages['titre']; ?> </p>
            </div>
        </div>
        <div class="card-body">
            <div class="card-text">
                <h3><?= $messages['descriptions']; ?> </h3>
                <?= $messages['contenus']; ?>
            </div>
        </div>
        <div class="card-footer d-flex flex-row justify-content-between">
            <a href="../actions/UserAction/deleteUser.php?idp=<?= $messages['id_pub']; ?>" class="text-end text-decoration-none btn btn-info btn-sm" onclick="return confirm('Voulez-vous vraiment supprimer cette publication ?')" style="color: #fef; font-size:18px;">Supprimer</a>
            <p><?= $messages['date_pub']; ?></p>
        </div>
    </div><br>
        <?php
    }
  ?>
  </div>
</body>
</html>