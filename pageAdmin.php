<?php
require 'sources/classes/Reservation.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="./styles/style.css">
    <!-- Typographie -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans+Narrow:wght@400;700&display=swap" rel="stylesheet">
    <!-- Typographie -->
    <link rel="shortcut icon" type="image/png" href="Medias/favicon.ico" />
    <script src="./javascript/modal.js" defer></script>
</head>
<header>
    <div class="bandeau">
        <div class="navBarre">
            <img class="logo" src="./Medias/logoVercors.png">
            <div class="navBouttons"><a href="./index.php">
                    ACCUEIL
                </a>
            </div>
            <div class="navBouttons"><a href="./pageAdmin.php">
                    ADMIN
                </a>
            </div>
            <div class="navBouttons"><a href="./login.php">
                    CONNEXION
                </a>
            </div>
        </div>
    </div>
</header>

<body>
    <div class="center">

        <div class="tickets">
            <h2>Toutes les reservations :</h2>
            <?php
            $row = 1;
            $handle = fopen("./sources/csv/reservation.csv", "r");
            while (($fichier = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $ligne = count($fichier);
                if ($row > 1) {
                    echo "<div class=ticketsAdmin><p>Numéro de commande : #" . $fichier[0] . "</p>";
                    echo "<p>Nom : " . $fichier[1] . "</p>";
                    echo "<p>Prénom : " . $fichier[2] . "</p>";
                    echo "<p>Mail : " . $fichier[3] . "</p>";
                    echo "<p>Téléphone : " . $fichier[4] . "</p>";
                    echo "<p>Adresse : " . $fichier[5] . "</p>";
                    echo "<p>Nombre de réservations : " . $fichier[6] . "</p>";
                    echo "<p>Tarif réduit : " . $fichier[7] . "</p>";
                    echo "<p>Formule : " . $fichier[8] . "</p>";
                    echo "<p>Date : " . $fichier[9] . "</p>";
                    echo "<p>Tente: " . $fichier[10] . "</p>";
                    echo "<p>Camion : " . $fichier[11] . "</p>";
                    echo "<p>Enfants : " . $fichier[12] . "</p>";
                    echo "<p>Nombre de casques : " . $fichier[13] . "</p>";
                    echo "<p>Nombre de descente en luge : " . $fichier[14] . "</p>";
                    echo "<p>Total réglé : " . $fichier[15] . "</p></div>";
                }

                $row++;
            }
            fclose($handle);

            ?>

            <?php ?>
        </div>
    </div>

</body>

</html>