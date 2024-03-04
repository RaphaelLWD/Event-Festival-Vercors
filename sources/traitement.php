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
} else {
    $tarifReduit = "";
}

if (isset($_POST['passSelection1']) && !empty($_POST['passSelection1'])) {
    $formule = $_POST['passSelection1'];

    if (isset($_POST['choixJour1']) && !empty($_POST['choixJour1'])) {
        $date = $_POST['choixJour1'];
    } elseif (isset($_POST['choixJour2']) && !empty($_POST['choixJour2'])) {
        $date = $_POST['choixJour2'];
    } elseif (isset($_POST['choixJour3']) && !empty($_POST['choixJour3'])) {
        $date = $_POST['choixJour3'];
    } else {
        header('location:../index.php?erreur=' . ERREUR_DATE);
        die;
    }
} elseif (isset($_POST['passSelection2']) && !empty($_POST['passSelection2'])) {
    $formule = $_POST['passSelection2'];

    if (isset($_POST['choixJour12']) && !empty($_POST['choixJour12'])) {
        $date = $_POST['choixJour12'];
    } elseif (isset($_POST['choixJour23']) && !empty($_POST['choixJour23'])) {
        $date = $_POST['choixJour23'];
    } else {
        header('location:../index.php?erreur=' . ERREUR_DATE);
        die;
    }
} elseif (isset($_POST['passSelection3']) && !empty($_POST['passSelection3'])) {
    $formule = $_POST['passSelection3'];
    $date = "";
} elseif (isset($_POST['passjourReduit1']) && !empty($_POST['passjourReduit1'])) {
    $formule = $_POST['passjourReduit1'];

    if (isset($_POST['choixJour1']) && !empty($_POST['choixJour1'])) {
        $date = $_POST['choixJour1'];
    } elseif (isset($_POST['choixJour2']) && !empty($_POST['choixJour2'])) {
        $date = $_POST['choixJour2'];
    } elseif (isset($_POST['choixJour3']) && !empty($_POST['choixJour3'])) {
        $date = $_POST['choixJour3'];
    } else {
        header('location:../index.php?erreur=' . ERREUR_DATE);
        die;
    }
} elseif (isset($_POST['passjourReduit2']) && !empty($_POST['passjourReduit2'])) {
    $formule = $_POST['passjourReduit2'];

    if (isset($_POST['choixJour12']) && !empty($_POST['choixJour12'])) {
        $date = $_POST['choixJour12'];
    } elseif (isset($_POST['choixJour23']) && !empty($_POST['choixJour23'])) {
        $date = $_POST['choixJour23'];
    } else {
        header('location:../index.php?erreur=' . ERREUR_DATE);
        die;
    }
} elseif (isset($_POST['passjourReduit3']) && !empty($_POST['passjourReduit3'])) {
    $formule = $_POST['passjourReduit3'];
    $date = "";
} else {
    header('location:../index.php?erreur=' . ERREUR_FORMULE);
    die;
}


// Traitement deuxieme page //
if (isset($_POST["tenteNuit1"]) || isset($_POST["tenteNuit2"]) || isset($_POST["tenteNuit3"]) || isset($_POST["tente3Nuits"])) {
    $tente = $_POST["tenteNuit1"] || $_POST["tenteNuit2"] || $_POST["tenteNuit3"] || $_POST["tente3Nuits"];
} else {
    $tente = "";
}

if (isset($_POST["vanNuit1"]) || isset($_POST["vanNuit2"]) || isset($_POST["vanNuit3"]) || isset($_POST["van3Nuits"])) {
    $camion = $_POST["vanNuit1"] || $_POST["vanNuit2"] || $_POST["vanNuit3"] || $_POST["van3Nuits"];
} else {
    $camion = "";
}

if (isset($_POST["enfantsOui"]) && !empty($_POST["enfantsOui"])) {
    $enfants = $_POST["enfantsOui"];
} elseif (isset($_POST["enfants"]) && !empty($_POST["enfants"])) {
    $enfants = "";
} else {
    $enfants = "";
}

if (isset($_POST["nombreCasquesEnfants"]) || !empty($_POST["nombreCasquesEnfants"])) {
    $casques = $_POST["nombreCasquesEnfants"];
} else {
    $casques = "";
}

if (isset($_POST["NombreLugesEte"]) && !empty($_POST["NombreLugesEte"])) {
    $luge = $_POST["NombreLugesEte"];
} else {
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
        $tel = htmlspecialchars($_POST['telephone']);
    } else {
        header('location:../index.php?erreur=' . ERREUR_TELEPHONE);
        die;
    }

    $reservation = new Reservation($nombreReservation, $formule, $date, $tarifReduit, $tente, $camion, $enfants, $casques, $luge, $nom, $prenom, $mail, $tel, $adresse);

    $datareservation = new DataReservation();

    if ($datareservation->enregistrerTicketR($reservation)) {
        header('location:../recapTicket.php');
    };
} else {
    header('location:../index.php?erreur=' . ERREUR_CHAMP_VIDE);
    die;
}
