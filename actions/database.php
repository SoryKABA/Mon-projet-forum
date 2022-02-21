<?php
session_start();
try {
    $bdd = new PDO("mysql:host=localhost;dbname=Forum_Kaba; charset=utf8;", 'root', '');
} catch (Exception $e) {
    die('Erreur de connexion à la base de données'.$e->getMessage());
}