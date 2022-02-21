<?php
    require('../actions/UserAction/profilUserAction.php');
    require('../actions/UserAction/securityAction.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php include('../includes/head.php'); ?>
<body>
    <?php include('../includes/navbar.php'); ?><br><br>
    <div class="container my-4">
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th>IP</th>
                    <th>PHOTO</th>
                    <th>NOM</th>
                    <th class="text-uppercase">prénom</th>
                    <th>E-MAIL</th>
                    <th>MESSAGE</th>
                    <th>BANNIR</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while ($user = $selectUser->fetch()) {
                        ?>
                            <tr>
                                <td><?= $user['id_user']; ?> </td>
                                <td> <?php if (!empty($user['photo'])) {
                                    ?>
                                     <img src="../actions/images/<?= $user['photo']; ?>" style="width:70px; height:70px; border-radius:50%;" alt="">
                                    <?php
                                } ?> </td>
                                
                                    <td><a href="userMessages.php?id=<?= $user['id_user']; ?>" class="text-decoration-none link-light">
                                        <?= $user['nom']; ?></a>
                                    </td>
                                    <td><a href="userMessages.php?id=<?= $user['id_user']; ?>" class="text-decoration-none link-light">
                                        <?= $user['prenom']; ?></a>
                                    </td>
                                    <td><a href="userMessages.php?id=<?= $user['id_user']; ?>" class="text-decoration-none link-light">
                                        <?= $user['email']; ?></a>
                                    </td>
                                
                                <td><a href="" class="link-light"><i class="fas fa-sms"></i></a> </td>
                                <td>
                                    <a href="../actions/UserAction/deleteUser.php?id=<?= $user['id_user']; ?>" class="link-light" onclick="return confirm('Voulez-vous vraiment bannir cet utilisateur ?')">
                                        <i class="far fa-trash-alt"></i>
                                    </a> 
                                </td>
                            </tr>
                        <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>