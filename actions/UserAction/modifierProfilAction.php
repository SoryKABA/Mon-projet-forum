<?php
function security($donnee)
{
    $donnee = htmlspecialchars($donnee);
    $donnee = trim($donnee);
    $donnee = strip_tags($donnee);
    $donnee = stripcslashes($donnee);
    return $donnee;
}
if (isset($_POST['valide'])) {
    if (isset($_POST['nom_profil']) && !empty($_POST['nom_profil']) && isset($_POST['prenom_profil']) && !empty($_POST['prenom_profil']) && isset($_POST['photo_profil'])) {
        $profilname = security($_POST['nom_profil']);
        $profilfirstname = security($_POST['prenom_profil']);
        $image = $_FILES['photo_profil']['name'];
        $dossier = '../actions/images/';
        $getId = $_GET['id'];
            if (isset($image) || !empty($image)) {
                $error = [];
                if ($_FILES['photo_profil']['size'] <= 3000000)
                {
                    // Testons si l'extension est autorisée
                    // $infosfichier = pathinfo($_FILES['photo']['name']);
                    $extensions = array('.png', '.gif', '.jpg', '.jpeg');
                    $extension = strrchr($_FILES['photo_profil']['name'], '.');
                    if (in_array($extension, $extensions))
                    {
                        // On peut valider le fichier et le stocker définitivement
                        move_uploaded_file($_FILES['photo_profil']['tmp_name'], $dossier . basename($image));
                        //echo "L'envoi a bien été effectué !";
                    }else{
                        $error['image'] = 'Vous devez uploader un fichier de type png, gif, jpg ou jpeg...';
                    }
                }else {
                    $error['image'] = 'Votre fichier ne doit pas dépasser 3Mo maximum !';
                }
            }
        $updateProfil = $bdd->prepare('UPDATE users SET nom = ?, prenom = ?, photo = ? WHERE id_user = ?');
        if ($updateProfil->execute(array($profilname, $profilfirstname, $image, $getId))) {
           //header('Location: ../views/profilUser.php?id='.$getId);
        }

    }
}
