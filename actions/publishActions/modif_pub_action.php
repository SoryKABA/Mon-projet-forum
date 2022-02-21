<?php
if (isset($_POST['validate'])) {
    if (!empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['content'])) {
        $title = htmlspecialchars($_POST['title']);
        $description = nl2br(htmlspecialchars($_POST['description']));
        $content = nl2br(htmlspecialchars($_POST['content']));
        $modify = $bdd->prepare('UPDATE publications SET titre = ?, descriptions = ?, contenus = ? WHERE id_pub = ?');
        $verify = $modify->execute(array($title, $description, $content, $getId));
        
        if ($verify) {
             echo "Modification reussie !";
            header('Location: ../views/mes_pubs.php');
        }
    }
}