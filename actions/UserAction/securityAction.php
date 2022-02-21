<?php
if (!$_SESSION['auth']) {
    header('Location: ../views/signIn.php');
}