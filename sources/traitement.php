<?php
require 'config.php';
require 'classes/Reservation.php';
require 'classes/DataReservation.php';

// Traitement premiere page //
// if (isset($_POST['nombrePlaces']) && isset($_POST['tarifReduit']) && isset($_POST['choixJour']) && !empty($_POST['nombrePlaces']) && !empty($_POST['tarifReduit']) && !empty($_POST['choixJour']) && isset($_POST['pass1jour']) && !empty($_POST['pass1jour']) && isset($_POST['pass2jour']) && !empty($_POST['pass2jour']) && isset($_POST['pass3jour']) && !empty($_POST['pass3jour'])) {

//     $nombreReservation = is_numeric($_POST['nombrePlaces']);
//     $tarifReduit = $_POST['tarifReduit'];
//     $date = $_POST['choixJour'];
//     $formule = $_POST['pass1jour'] || $_POST['pass2jour'] || $_POST['pass3jour'];
// } else {

//     header('location:../index.php?erreur=' . ERREUR_CHAMP_VIDEUN);
// }

// Traitement deuxieme page //
// 1) Vérifier si les champs sont isset et empty 
if (isset($_POST["tenteNuit1"]) && isset($_POST["tenteNuit2"]) && isset($_POST["tenteNuit3"]) && isset($_POST["vanNuit1"]) && isset($_POST["vanNuit2"]) && isset($_POST["vanNuit3"]) && isset($_POST["enfants"]) && isset($_POST["nombreCasquesEnfants"]) && isset($_POST["NombreLugesEte"]) && !empty($_POST["tenteNuit1"]) && !empty($_POST["tenteNuit2"]) && !empty($_POST["tenteNuit3"]) && !empty($_POST["vanNuit1"]) && !empty($_POST["vanNuit2"]) && !empty($_POST["vanNuit3"]) && !empty($_POST["enfants"]) && !empty($_POST["nombreCasquesEnfants"]) && !empty($_POST["NombreLugesEte"]))
// 2) si oui $variable = value 
{
    $tente = $_POST["tenteNuit1"] || $_POST["tenteNuit2"] || $_POST["tenteNuit3"];
    $camion = $_POST["vanNuit1"] || $_POST["vanNuit2"] || $_POST["vanNuit3"];
    $enfants = $_POST["enfants"];
    $casques = $_POST["nombreCasquesEnfants"];
    $luge = $_POST["NombreLugesEte"];

}
// 3) si non $variable = value = null/none
else {
    $tente = "";
    $camion = "";
    $enfants = "";
    $casques = "";
    $luge = "";
}
var_dump($tente)



// if (isset($_POST['tenteNuit1']) && isset($_POST['tenteNuit2']) && isset($_POST['tenteNuit3']) && isset($_POST['tente3Nuits']) && isset($_POST['vanNuit1']) && isset($_POST['vanNuit2']) && isset($_POST['vanNuit3']) && isset($_POST['van3Nuits']) && isset($_POST['enfantsOui']) && isset($_POST['enfantsNon']) && isset($_POST['nombreCasquesEnfants']) && isset($_POST['NombreLugesEte']) && !empty($_POST['tenteNuit1']) && !empty($_POST['tenteNuit2']) && !empty($_POST['tenteNuit3']) && !empty($_POST['tente3Nuits']) && !empty($_POST['vanNuit1']) && !empty($_POST['vanNuit2']) && !empty($_POST['vanNuit3']) && !empty($_POST['van3Nuits']) && !empty($_POST['enfantsOui']) && !empty($_POST['enfantsNon']) && !empty($_POST['nombreCasquesEnfants']) && !empty($_POST['NombreLugesEte'])) {

//     $tente = $_POST[''] || $_POST['tenteNuit2'] || $_POST['tenteNuit3'] || $_POST['tente3Nuits'];
//     $camion = $_POST['vanNuit1'] || $_POST['vanNuit2'] || $_POST['vanNuit3'] || $_POST['van3Nuits'];
//     $enfants = $_POST['enfantsOui'] || $_POST['enfantsNon'];
//     $casques = $_POST['nombreCasquesEnfants'];
//     $luge = $_POST['NombreLugesEte'];
// } else {
//     header('location:../index.php?erreur=' . ERREUR_UNCHECKED);
// }


// Traitement troisieme page // 
if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['telephone']) && isset($_POST['adressePostale']) && !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['telephone']) && !empty($_POST['adressePostale'])) {

    $nom = htmlentities($_POST['nom']);
    $prenom = htmlentities($_POST['prenom']);
    $adresse = htmlentities($_POST['adressePostale']);

    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $mail = htmlentities($_POST['email']);
    } else {
        header('location:../index.php?erreur=' . ERREUR_MAIL);
        die;
    }
    if (strlen($_POST['telephone']) === 10 && is_numeric($_POST['telephone'])) {
        $tel = ($_POST['telephone']);
    } else {
        header('location:../index.php?erreur=' . ERREUR_TELEPHONE);
    }

    $reservation = new Reservation($id, $nombreReservation, $formule, $date, $tarifReduit, $tente, $camion, $enfants, $casques, $luge, $nom, $prenom, $mail, $tel, $adresse);

    $datareservation = new DataReservation();
} else {
    header('location:../index.php?erreur=' . ERREUR_CHAMP_VIDETROIS);
    die;
}
