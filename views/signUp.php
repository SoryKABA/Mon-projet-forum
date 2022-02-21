<?php require('../actions/UserAction/signUpAction.php'); ?>
<!DOCTYPE html>
<html lang="en">
    <?php include '../includes/head.php'; ?>
<body>
    <?php include '../includes/navbar.php'; ?>
    <div class="bg-danger container my-4 rounded">
    <?php
        if (!empty($error)) {
            foreach ($error as $value) {
            ?>
                <ul>
                    <li class="list-item" style="color: #fef;"><?= $value; ?></li>
                </ul>
            <?php    
            }
        }
    ?>
    </div>
    <div class="bg-success container my-4 rounded">
        <?php
            if(!empty($success)){
                ?>
                <p class="text-center" style="color: #fef;"><?= $success;?> </p>
                <?php
            }
        ?>
    </div>
    <div class="container my-4">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-6">
                    <label for="" class="form-label">Nom</label>
                    <input type="text" name="lastname" class="form-control">
                </div>
                <div class="col-6">
                    <label for="" class="form-label">Prénom</label>
                    <input type="text" name="firstname" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="" class="form-label">E-mail</label>
                    <input type="email" name="email" id="" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Photo de profil</label>
                    <input class="form-control" type="file" name="image" id="formFile">
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label for="" class="form-label">Mot de passe</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="col-6">
                    <label for="" class="form-label">Confirmation</label>
                    <input type="password" name="confirme" class="form-control">
                </div>
            </div><br>
            <div class="col-10">
                <button type="submit" class="btn btn-primary" name="validate">Valider</button>
            </div>
        </form>
        <a href="signIn.php"><p>J'ai déjà un compte, je me connecte</p></a>
    </div>
</body>
</html>
<!-- <span class="input-group-text" id="basic-addon1">@</span> -->