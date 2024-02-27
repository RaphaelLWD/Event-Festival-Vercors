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
                    Acceuille
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
    <div class="tickets">
        <h2>Toutes les reservations </h2>
        <?php
        $row = 1;
        $handle = fopen("./sources/csv/reservation.csv", "r");
        while (($fichier = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $ligne = count($fichier);
            echo "<p>Reservation : <br/></p>\n";
            $row++;
            for ($c = 0; $c < $ligne; $c++) {
                echo "<div class='test'> $fichier[$c] </div> <br/>\n";
            }
        }
        fclose($handle);

        ?>

        <?php ?>
    </div>
</body>

</html>