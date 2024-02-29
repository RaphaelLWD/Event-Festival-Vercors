<?php
require 'sources/classes/Reservation.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Récapitulatif</title>
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
                    Accueil
                </a>
            </div>
            <div class="navBouttons"><a href="./pageAdmin.php">
                    Admin
                </a>
            </div>
            <div class="navBouttons"><a href="./login.php">
                    Connexion
                </a>
            </div>
        </div>
    </div>
</header>

<body>
    <div class="center">
        <div class="tickets">
            <h2>Voici le récapitulatif de votre commande:</h2>
        </div>
        <div class="tickets">
            <?php
            $row = 1;
            $handle = fopen("./sources/csv/reservation.csv", "r");
            while (($fichier = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $ligne = count($fichier);
                $row++;
                for ($c = 0; $c < $ligne; $c++) {
                    echo $fichier[$c] . "<br/>\n";
                }
            }
            fclose($handle);
            ?>

            <?php ?>
        </div>
    </div>
</body>

</html>