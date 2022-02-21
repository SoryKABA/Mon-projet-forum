<?php
    require('../actions/UserAction/profilUserAction.php');
    require('../actions/UserAction/modifierProfilAction.php');
    require('../actions/UserAction/securityAction.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php include('../includes/head.php'); ?>
<body>
    <?php include('../includes/navbar.php'); ?><br><br>
    <div class="container" style="width:50vw;">
        <?php
            while ($profil = $profilUser->fetch()) {
            ?>
                <div class="card">
                    <div class="card-header">
                        <div class="card-title"><?php if (!empty($profil['photo'])) {?>
                            <img src="../actions/images/<?= $profil['photo'] ?>" style="width:70px; height:70px; border-radius:50%;" alt=""><?php
                        } ?>    
                            <?= $profil['email']; ?> </div>
                    </div>
                    <div class="card-body">
                        <div class="card-text"><strong>NOM : </strong>  <?= $profil['nom']; ?> </div>
                        <div class="card-text"><strong class="text-uppercase">Prénom : </strong>  <?= $profil['prenom']; ?> </div>
                    </div>
                    <div class="card-footer">
                        <a href="profilModifier.php?id=<?= $profil['id_user']; ?>" class="btn btn-success btn-sm" style="color: #fef; font-size:18px;">Modifier</a>
                    </div>
                </div>
            <?php
            }
        ?>
    </div>  
</body>
</html>