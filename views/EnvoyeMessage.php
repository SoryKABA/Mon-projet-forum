<?php
    require('../actions/PublishActions/messageAction.php');
    require('../actions/UserAction/securityAction.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php include('../includes/head.php'); ?>
<body>
    <?php include('../includes/navbar.php'); ?><br><br>
    <div class="container" style="width:75vw;">
        <form action="" method="POST">
            <div class="mb-3">
                <div class="row">
                    <div class="col-8 my-2">
                        <label for="" class="form-label">Ecrire un message</label>
                        <textarea name="message" class="form-control"></textarea>
                    </div>
                    <div class="col-3 my-5">
                        <button type="submit" class="btn btn-primary btn-lg" name="validate"><i class="far fa-paper-plane"></i></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <section class="container">
    <?php
      while ($sms = $messageSource->fetch()) {
          if ($sms['id_destinataire'] == $_SESSION['id']) {
        ?>
        <div class="card" style="width: 40vw;">
            <div class="card-header">
                <div class="card-title">
                    <img src="../actions/images/<?= $sms['photo_source']; ?>" alt="" style="width:40px; height: 40px; border-radius: 50%;"> <?= $sms['prenom_source']; ?> <?= $sms['nom_source']; ?>
                </div>
            </div>
            <div class="card-body">
                <div class="card-text">
                    <?= $sms['contenu_message']; ?>
                </div>
            </div>
            <div class="card-footer">
                <p class="card-text">
                    <?= $sms['date_message']; ?>
                </p>
            </div>
        </div><br>
        <?php
          }elseif ($sms['id_destinataire'] == $getId) {
         ?> 
          <div class="card" style="float:right; width: 35vw;">
                <div class="card-header">
                    <div class="card-title">
                        <img src="../actions/images/<?= $sms['photo_source']; ?>" alt="" style="width:40px; height: 40px; border-radius: 50%;"> <?= $sms['prenom_destinataire']; ?> <?= $sms['nom_destinataire']; ?>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card-text">
                        <?= $sms['contenu_message']; ?>
                    </div>
                </div>
                <div class="card-footer">
                    <p class="card-text">
                        <?= $sms['date_message']; ?>
                    </p>
                </div>
            </div><br>
        <?php    
          } 
      }
    ?>
    </section>
</body>
</html>