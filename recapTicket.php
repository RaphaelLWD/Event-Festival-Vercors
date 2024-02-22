<?php
require 'src/classes/Reservation.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RecapTicket</title>
</head>

<body>
    <div>
        <h2>Voici votre récap </h2>
        <?php foreach ($reservations as $reservation) { ?>
            <tr>
                <td><?= $reservation->getId() ?></td>
                <td><?= $reservation->getNom() ?></td>
                <td><?= $reservation->getPrenom() ?></td>
                <td><?= $reservation->getMail() ?></td>
                <td><?= $reservation->getTel() ?></td>
                <td><?= $reservation->getAdresse() ?></td>
                <td><?= $reservation->getNombreReservation() ?></td>
                <td><?= $reservation->getFormule() ?></td>
                <td><?= $reservation->getTarifReduit() ?></td>
                <td><?= $reservation->getDate() ?></td>
                <td><?= $reservation->getTente() ?></td>
                <td><?= $reservation->getCamion() ?></td>
                <td><?= $reservation->getEnfants() ?></td>
                <td><?= $reservation->getCasques() ?></td>
                <td><?= $reservation->getLuge() ?></td>
                <td><button onclick="location.href='src/suppression?suppression=<?= $utilisateur->getId() ?>'">🗑️ Supprimer</button></td>
            </tr>
        <?php } ?>
    </div>
</body>

</html>