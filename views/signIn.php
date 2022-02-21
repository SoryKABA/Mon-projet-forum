<?php require('../actions/UserAction/signInAction.php'); ?>
<!DOCTYPE html>
<html lang="en">
<?php include '../includes/head.php'; ?>
<link rel="stylesheet" href="../assets/style.css">
<body>
    <?php include '../includes/navbar.php'; ?>

    <div class="bg-danger container my-4 rounded">
        <?php 
            if (!empty($error)) {
                foreach ($error as $value) {
                ?>
                  <p class="text-center" style="color: #fef;"><?= $value;?> </p>
                <?php
                }
            }
        ?>
    </div>
    <div class="container my-4">
        <div class="div rounded my-5">
            <p class="fs-3">Connectez-vous !</p>
            <form action="" method="POST" class="my-3">
                <div class="input-group mb-3"> 
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                    <input type="email" class="form-control" name="username" placeholder="Votre login">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                    <input type="password" class="form-control" name="password" placeholder="Mot de passe">
                </div>
                <button type="submit" class="btn btn-primary" name="valider">Se connecter</button>
            </form>
            <a href="signUp.php"><p>Je n'ai pas de compte, je m'inscris</p></a>
        </div>
    </div>
</body>
</html>