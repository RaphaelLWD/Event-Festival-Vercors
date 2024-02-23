<?php
require 'sources/classes/Reservation.php';
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
        <?php
        $row = 1;
        $handle = fopen("./sources/csv/reservation.csv", "r");
        while (($fichier = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $ligne = count($fichier);
            echo "<p> Votre reservation : <br/></p>\n";
            $row++;
            for ($c = 0; $c < $ligne; $c++) {
                echo $fichier[$c] . "<br/>\n";
            }
        }
        fclose($handle);
        // } else {
        //     echo "<p>incapable de trouver le fichier csv</p>";
        // }
        ?>

        <?php ?>
    </div>
</body>

</html>