<?php
    require('../actions/UserAction/profilUserAction.php');
    require('../actions/UserAction/securityAction.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php include('../includes/head.php'); ?>
<body>
    <?php include('../includes/navbar.php'); ?><br><br>
    <div class="container my-4" style="width:60vw;">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>PHOTO</th>
                    <th>NOM</th>
                    <th class="text-uppercase">prénom</th>
                    <th>MESSAGE</th>
                </tr>
            </thead>
            <tbody>
            <?php
                while ($user = $selectUser->fetch()) {
                ?>
               <tr>
                    <td> <?php if (!empty($user['photo'])) {
                        ?>
                         <img src="../actions/images/<?= $user['photo']; ?>" style="width:70px; height:70px; border-radius:50%;" alt="">
                        <?php
                    } ?> </td>
                    <td><?= $user['nom']; ?></td>
                    <td><?= $user['prenom']; ?></td>
                    <td><a href="EnvoyeMessage.php?id=<?= $user['id_user']; ?>" class="link-dark link-lg"><i class="fas fa-sms"></i></a> </td>
                </tr>
                <?php
                }
          ?>
            </tbody>
        </table>
    </div>
</body>
</html>