<?php require('../actions/publishActions/publish_action.php');
      require('../actions/UserAction/securityAction.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php include('../includes/head.php'); ?>
<body>
   <?php include('../includes/navbar.php'); ?>
   <div class="container bg-success my-2">
       <?php
            if (!empty($success)) {
            ?>
            <p style="color: #fef; text-align: center;"><?= $success; ?> </p>
            <?php
            }
       ?>
   </div> 
   <div class="container my-4" style="width: 60vw;">
       <form action="" method="POST"  class="float-center">
           <div class="mb-3">
               <label for="" class="form-label">Titre de publication</label>
               <input type="text" class="form-control" name="title">
           </div>
           <div class="mb-3">
               <label for="" class="form-label">Description</label>
               <textarea name="description" class="form-control"></textarea>
           </div>
           <div class="mb-3">
               <label for="" class="form-label">Contenu</label>
               <textarea name="content" class="form-control"></textarea>
           </div>
           <div class="mb-3">
               <button type="submit" class="btn btn-primary" name="validate">Publier</button>
            </div>
       </form>
   </div>
</body>
</html>