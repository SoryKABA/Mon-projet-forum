<?php 
      require('../actions/publishActions/modifyPubAction.php');
      require('../actions/publishActions/modif_pub_action.php');
      require('../actions/UserAction/securityAction.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php include('../includes/head.php'); ?>
<body>
   <?php include('../includes/navbar.php');
     
   ?> 
   <div class="container my-4" style="width: 60vw;">
       <form action="" method="POST"  class="float-center">
           <div class="mb-3">
               <label for="" class="form-label">Titre de publication</label>
               <input type="text" class="form-control" name="title" value="<?= $infopub['titre']; ?>">
           </div>
           <div class="mb-3">
               <label for="" class="form-label">Description</label>
               <textarea name="description" class="form-control"><?= $infopub['descriptions']; ?></textarea>
           </div>
           <div class="mb-3">
               <label for="" class="form-label">Contenu</label>
               <textarea name="content" class="form-control"><?= $infopub['contenus']; ?></textarea>
           </div>
           <div class="mb-3">
               <button type="submit" class="btn btn-primary" name="validate">Mettre à jour</button>
            </div>
       </form>
   </div>
</body>
</html>