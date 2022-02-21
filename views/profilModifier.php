<?php
    require('../actions/UserAction/profilUserAction.php');
    require('../actions/UserAction/modifierProfilAction.php');
    require('../actions/UserAction/securityAction.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php include('../includes/head.php'); ?>
<body>
    <?php include('../includes/navbar.php'); 
        $profil = $profilUser->fetch();
    ?><br><br>
    <div class="container bg-danger">
        <?php
            if (!empty($error)) {
               foreach ($error as $value) {
            ?>
            <ul class="list" style="color: #fef;">
                <li class="list-item"> <?= $value; ?> </li>
            </ul>
            <?php
            }
        }
        var_dump($image);
        ?>
    </div>
    <div class="container" style="width:60vw;">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-12">
                    <label for="" class="form-label">Nom</label>
                    <input type="text" name="nom_profil" value="<?= $profil['nom']; ?>" class="form-control">
                </div>
                <div class="col-12">
                    <label for="" class="form-label">Prénom</label>
                    <input type="text" name="prenom_profil" value="<?= $profil['prenom']; ?>" class="form-control">
                </div>
                <div class="col-12">
                    <label for="" class="form-label">Photo de profil</label>
                    <input type="file" name="photo_profil" value="<?php if (!empty($profil['photo'])) { echo $profil['photo'];} ?>" class="form-control">
                </div><br><br>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary" name="valide">Enregistrer</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>