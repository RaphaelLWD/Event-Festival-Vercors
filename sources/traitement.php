<?php
require 'config.php';
require 'classes/Reservation.php';
require 'classes/DataReservation.php';

// Traitement premiere page //

if (isset($_POST['nombrePlaces']) && !empty($_POST['nombrePlaces']) && is_numeric($_POST['nombrePlaces'])) {
    $nombreReservation = ($_POST['nombrePlaces']);
} else {
    header('location:../index.php?erreur=' . ERREUR_RESERVATION);
    die;
};

if (isset($_POST['tarifReduit']) && !empty($_POST['tarifReduit'])) {

    $tarifReduit = $_POST['tarifReduit'];

    if (isset($_POST['passjourReduit1']) || isset($_POST['passjourReduit2']) || isset($_POST['passjourReduit3'])) {

        $formule = $_POST['passjourReduit1'] || $_POST['passjourReduit2'] || $_POST['passjourReduit3'];

        if (isset($_POST['choixJour1']) || isset($_POST['choixJour2']) || isset($_POST['choixJour3']) || isset($_POST['choixJour12']) || isset($_POST['choixJour23'])) {

            $date = $_POST['choixJour1'] || $_POST['choixJour2'] || $_POST['choixJour3'] || $_POST['choixJour12'] || $_POST['choixJour23'];
        } else {
            header('location:../index.php?erreur=' . ERREUR_DATE);
        }
    } else {
        header('location:../index.php?erreur=' . ERREUR_TARIF_REDUIT_FORMULE);
    }
} elseif (isset($_POST['passSelection1']) || isset($_POST['passSelection2']) || isset($_POST['passSelection3']) && empty($_POST['tarifReduit'])) {

    $tarifReduit = "";
    $formule = $_POST['passSelection1'] || $_POST['passSelection2'] || $_POST['passSelection3'];

    if (isset($_POST['choixJour1']) || isset($_POST['choixJour2']) || isset($_POST['choixJour3']) || isset($_POST['choixJour12']) || isset($_POST['choixJour23'])) {

        $date = $_POST['choixJour1'] || $_POST['choixJour2'] || $_POST['choixJour3'] || $_POST['choixJour12'] || $_POST['choixJour23'];
    } else {
        header('location:../index.php?erreur=' . ERREUR_DATE);
    }
} else {
    header('location:../index.php?erreur=' . ERREUR_FORMULE);
}

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
    if (strlen($_POST['telephone']) == 10 && is_numeric($_POST['telephone'])) {
        $tel = ($_POST['telephone']);
    } else {
        header('location:../index.php?erreur=' . ERREUR_TELEPHONE);
    }

    $reservation = new Reservation($nombreReservation, $formule, $date, $tarifReduit, $tente, $camion, $enfants, $casques, $luge, $nom, $prenom, $mail, $tel, $adresse);

    $datareservation = new DataReservation();

    if ($datareservation->enregistrerTicketR($reservation)) {
        header('location:../recapTicket.php');
    };
} else {
    header('location:../index.php?erreur=' . ERREUR_CHAMP_VIDETROIS);
    die;
}
