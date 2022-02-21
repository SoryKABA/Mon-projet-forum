<?php

require('../actions/database.php');
require "../actions/PHPMailer/PHPMailerAutoload.php";
function security($donnee)
{
    $donnee = htmlspecialchars($donnee);
    $donnee = trim($donnee);
    $donnee = strip_tags($donnee);
    $donnee = stripcslashes($donnee);
    return $donnee;
}
if (isset($_POST['validate'])) {
    $error = array();
    // if (isset($_POST['lastname']) AND isset($_POST['firstname']) AND isset($_POST['email']) AND isset($_POST['image']) AND isset($_POST['password']) AND isset($_POST['confirme'])) {
    //     if (!empty($_POST['lastname']) && !empty($_POST['firstname']) && !empty($_POST['email'])) {
            $lastname = security($_POST['lastname']);
            $firstname = security($_POST['firstname']);
            $email = $_POST['email'];
            $image = $_FILES['image']['name'];
            $password = $_POST['password'];
            $confirme = $_POST['confirme'];

            $dossier = '../actions/images/';
            if (!empty($image)) {
                if ($_FILES['image']['size'] <= 3000000)
                {
                    // Testons si l'extension est autorisée
                    // $infosfichier = pathinfo($_FILES['photo']['name']);
                    $extensions = array('.png', '.gif', '.jpg', '.jpeg');
                    $extension = strrchr($_FILES['image']['name'], '.');
                    if (in_array($extension, $extensions))
                    {
                        // On peut valider le fichier et le stocker définitivement
                        move_uploaded_file($_FILES['image']['tmp_name'], $dossier . basename($image));
                        //echo "L'envoi a bien été effectué !";
                    }else{
                        $error['image'] = 'Vous devez uploader un fichier de type png, gif, jpg ou jpeg...';
                    }
                }else {
                    $error['image'] = 'Votre fichier ne doit pas dépasser 3Mo maximum !';
                }
            }
            if (empty($lastname)) {
                $error['lastname'] = 'Le champ nom ne doit pas être vide ';
            }
            if (empty($firstname)) {
                $error['firstname'] = "Le champ prénom ne doit être vide !";
            }
            if (empty($email)) {
                $error['email'] = "Le champ email est obligatoire !";
            }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error['email'] = 'Veuillez mettre un bon email';
            }
            if (empty($password)) {
                $error['password'] = 'Le champ de mot de passe ne doit pas être vide !';
            }
            if (!empty($password)) {
                if (strlen($password) < 8) {
                    $error['password'] = 'Le mot de passe doit être au minimum 8 caractères !';
                }
            }
            if (empty($confirme)) {
                $error['confirme'] = 'Veuillez remplir le champ de confirmation de mot de passe';
            }
            if (!empty($confirme)) {
                if ($confirme != $password) {
                    $error['confirme'] = 'Les deux mot de passe ne correspondent pas';
                }
            }
            //var_dump($error);
            if (empty($error)) {
                $key = rand(1000000, 90000000);
                $selectUsers = $bdd->prepare('SELECT email FROM users WHERE email = ?');
                $selectUsers->execute(array($email));
                if ($selectUsers->rowCount() == 0) {
                    $insertUser = $bdd->prepare('INSERT INTO users(nom, prenom, email, cle, confirm_cle, photo, password) VALUES(?, ?, ?, ?, ?, ?, ?)');
                    $verify = $insertUser->execute(array($lastname,
                                           $firstname,
                                           $email,
                                           $key,
                                           0,
                                           $image,
                                           password_hash($password, PASSWORD_DEFAULT))
                                );
                    if ($verify) {
                        $success = "Un lien de validation vous a été envoyé sur votre adresse mail !";
                    }
                    $selectUser = $bdd->prepare('SELECT * FROM users WHERE email = ?');
                    $selectUser->execute(array($email));
                    if ($selectUser->rowCount() > 0) {
                        $infoUser = $selectUser->fetch();
                        $_SESSION['id'] = $infoUser['id_user'];
                        $_SESSION['nom'] = $infoUser['nom'];
                        $_SESSION['prenom'] = $infoUser['prenom'];
                        $_SESSION['email'] = $infoUser['email'];
                        $_SESSION['photo'] = $infoUser['photo'];

                        //require "PHPMailer/PHPMailerAutoload.php";

                            function smtpmailer($to, $from, $from_name, $subject, $body)
                            {
                                $mail = new PHPMailer();
                                $mail->IsSMTP();
                                $mail->SMTPAuth = true; 
                        
                                $mail->SMTPSecure = 'ssl'; 
                                $mail->Host = 'smtp.gmail.com';
                                $mail->Port = 465;  
                                $mail->Username = 'skabaisidk@groupeisi.com';
                                $mail->Password = 'Sorykaba10';   
                        
                        //   $path = 'reseller.pdf';
                        //   $mail->AddAttachment($path);
                        
                                $mail->IsHTML(true);
                                $mail->From="skabaisidk@groupeisi.com";
                                $mail->FromName=$from_name;
                                $mail->Sender=$from;
                                $mail->AddReplyTo($from, $from_name);
                                $mail->Subject = $subject;
                                $mail->Body = $body;
                                $mail->AddAddress($to);
                                if(!$mail->Send())
                                {
                                    $error ="Please try Later, Error Occured while Processing...";
                                    return $error; 
                                }
                                else 
                                {
                                    $error = "Thanks You !! Your email is sent.";  
                                    return $error;
                                }
                            }
                            
                            $to   = $email;
                            $from = 'skabaisidk@groupeisi.com';
                            $name = 'Sory KABA';
                            $subj = 'Email de validation de compte';
                            $msg = "Veuillez cliquez sur ce <a href='http://localhost/Forum_Kaba/views/validation.php?id=".$_SESSION['id']."&cle=".$key."'>lien de confirmation</a> pour valider votre inscription";
                            
                            $error=smtpmailer($to,$from, $name ,$subj, $msg);
                    
                }else {
                    echo 'Ce compte existe déjà !';      
                }
            }

                

                
            }
    //     }
    // }
}