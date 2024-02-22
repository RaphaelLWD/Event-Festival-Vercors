<?php
require 'config.php';
require 'classes/Reservation.php';
require 'classes/DataReservation.php';

if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['telephone']) && isset($_POST['adressePostale']) && !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['telephone']) && !empty($_POST['adressePostale'])) {

    $nom = htmlentities($_POST['nom']);
    $prenom = htmlentities($_POST['prenom']);
    $adresse = htmlentities($_POST['adressePostale']);
    $telephone = is_numeric($_POST['telephone']);

    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $email = htmlentities($_POST['email']);
    } else {
        header('location:../index.php?erreur=' . ERREUR_EMAIL);
        die;
    }

    $user = new User($nom, $prenom, $mail, $password);
    $Database = new Database();
} else {
    header('location:../index.php?erreur=' . ERREUR_NOM);
    die;
}
