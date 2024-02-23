<?php
$code_erreur = null;
if (isset($_GET['erreur'])) {
  $code_erreur = (int) $_GET['erreur'];
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulaire de réservation Music Vercos Festival</title>
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
    <img class="logo" src="./Medias/logoVercors.png">
  </div>
</header>




<body>
  <form action="sources/traitement.php" id="inscription" method="POST">
    <fieldset id="reservation" style="display:block">
      <legend>Réservation</legend>
      <h3>Nombre de réservation(s) :</h3>
      <input type="number" name="nombrePlaces" id="NombrePlaces" min="1">
      <?php
      if ($code_erreur === 1) { ?>
        <div class="message echec">
          Vous devez entrer un nombre de réservations.
        </div>
      <?php } ?>
      <h3>Réservation(s) en tarif réduit (sur présentation des pièces justificatives)</h3>
      <input type="checkbox" name="tarifReduit" id="tarifReduit" class="checkbox1" onchange="passROption()">
      <?php
      if ($code_erreur === 3) { ?>
        <div class="message echec">
          Choisir une formule.
        </div>
      <?php } ?>
      <?php
      if ($code_erreur === 2) { ?>
        <div class="message echec">
          Choisir une date.
        </div>
      <?php } ?>
      <label for="tarifReduit">Ma réservation sera en tarif réduit</label>

      <h3>Choisissez votre formule :</h3>

      <input type="checkbox" name="passSelection1" id="pass1jour" class="checkbox1" onchange="pass1Option()">
      <?php
      if ($code_erreur === 3) { ?>
        <div class="message echec">
          Choisir une formule.
        </div>
      <?php } ?>

      <label for="pass1jour">Pass 1 jour : 40€</label>

      <!-- Si case cochée, afficher le choix du jour -->
      <section id="pass1jourDate" class="hidden">

        <input type="checkbox" name="choixJour1" id="choixJour1" class="checkbox2">
        <label for="choixJour1">Pass pour la journée du 01/07</label>
        <input type="checkbox" name="choixJour2" id="choixJour2" class="checkbox2">
        <label for="choixJour2">Pass pour la journée du 02/07</label>
        <input type="checkbox" name="choixJour3" id="choixJour3" class="checkbox2">
        <label for="choixJour3">Pass pour la journée du 03/07</label>
      </section>


      <input type="checkbox" name="passSelection2" id="pass2jours" class="checkbox1" onchange="pass2Option()">

      <label for="pass2jours">Pass 2 jours : 70€</label>

      <!-- Si case cochée, afficher le choix des jours -->
      <section id="pass2joursDate" class="hidden">

        <input type="checkbox" name="choixJour12" id="choixJour12" class="checkbox2">


        <label for="choixJour12">Pass pour deux journées du 01/07 au 02/07</label>
        <input type="checkbox" name="choixJour23" id="choixJour23" class="checkbox2">
        <label for="choixJour23">Pass pour deux journées du 02/07 au 03/07</label>
      </section>



      <input type="checkbox" name="passSelection3" id="pass3jours" class="checkbox1">

      <label for="pass3jours">Pass 3 jours : 100€</label>


      <!-- tarifs réduits : à n'afficher que si tarif réduit est sélectionné -->
      <section id="tarifReduitChoix" class="hidden">

        <input type="checkbox" name="passjourReduit1" id="pass1jourReduit" class="checkbox3">
        <label for="pass1jour">Pass 1 jour : 25€</label>
        <input type="checkbox" name="passjourReduit2" id="pass2joursReduit" class="checkbox3">
        <label for="pass2jours">Pass 2 jours : 50€</label>
        <input type="checkbox" name="passjourReduit3" id="pass3joursReduit" class="checkbox3">
        <label for="pass3jours">Pass 3 jours : 65€</label>

      </section>
      <div id="boutonSuivant" type="submit" name="submit1" onclick="nextFieldset('options')">
        <p class="bouton">Suivant</p>
      </div>
      <?php
      if ($code_erreur === 4) { ?>
        <div class="message echec">
          Réservation incomplète, veuillez sélectionner tous les champs requis.
        </div>
      <?php } ?>

    </fieldset>
    <fieldset id="options" style="display:none">
      <legend>Options</legend>
      <h3>Réserver un emplacement de tente : </h3>
      <input type="checkbox" id="tenteNuit1" name="tenteNuit1" class="tenteNuit">
      <label for="tenteNuit1">Pour la nuit du 01/07 (5€)</label>
      <input type="checkbox" id="tenteNuit2" name="tenteNuit2" class="tenteNuit">
      <label for="tenteNuit2">Pour la nuit du 02/07 (5€)</label>
      <input type="checkbox" id="tenteNuit3" name="tenteNuit3" class="tenteNuit">
      <label for="tenteNuit3">Pour la nuit du 03/07 (5€)</label>
      <input type="checkbox" id="tente3Nuits" name="tente3Nuits" class="tenteNuit">
      <label for="tente3Nuits">Pour les 3 nuits (12€)</label>

      <h3>Réserver un emplacement de camion aménagé : </h3>
      <input type="checkbox" id="vanNuit1" name="vanNuit1" class="vanNuit">
      <label for="vanNuit1">Pour la nuit du 01/07 (5€)</label>
      <input type="checkbox" id="vanNuit2" name="vanNuit2" class="vanNuit">
      <label for="vanNuit2">Pour la nuit du 02/07 (5€)</label>
      <input type="checkbox" id="vanNuit3" name="vanNuit3" class="vanNuit">
      <label for="vanNuit3">Pour la nuit du 03/07 (5€)</label>
      <input type="checkbox" id="van3Nuits" name="van3Nuits" class="vanNuit">
      <label for="van3Nuits">Pour les 3 nuits (12€)</label>

      <h3>Venez-vous avec des enfants ?</h3>
      <input type="checkbox" name="enfantsOui" id="enfantO" onchange="enfantOption()" class="enfant"><label for="enfants">Oui</label>
      <input type="checkbox" name="enfants" onchange="enfantOption()" class="enfant"><label for="enfantsNon" id="enfantN">Non</label>

      <!-- Si oui, afficher : -->
      <section id="optionEnfant" class="hidden">
        <h4>Voulez-vous louer un casque antibruit pour enfants* (2€ / casque) ?</h4>
        <label for="nombreCasquesEnfants">Nombre de casques souhaités :</label>
        <input type="number" name="nombreCasquesEnfants" id="nombreCasquesEnfants" min="0">
        <p>*Dans la limite des stocks disponibles.</p>
      </section>

      <h3>Profitez de descentes en luge d'été à tarifs avantageux !</h3>
      <label for="NombreLugesEte">Nombre de descentes en luge d'été :</label>
      <input type="number" name="NombreLugesEte" id="NombreLugesEte">

      <div id="boutonCoordonnees" type="submit" name="submit2" onclick="nextFieldset('coordonnees')">
        <p class="bouton">Suivant</p>
      </div>
      <?php

      ?>

    </fieldset>
    <fieldset id="coordonnees" style="display:none">
      <legend>Coordonnées</legend>
      <label for="nom">Nom :</label>
      <input type="text" name="nom" id="nom" required>
      <label for="prenom">Prénom :</label>
      <input type="text" name="prenom" id="prenom" required>
      <label for="email">Email :</label>
      <input type="email" name="email" id="email" required>
      <?php
      if ($code_erreur === 5) { ?>
        <div class="message echec">
          Choisir un email valable.
        </div>
      <?php } ?>
      <label for="telephone">Téléphone :</label>
      <input type="tel" name="telephone" id="telephone" maxlength="10" required>
      <?php
      if ($code_erreur === 6) { ?>
        <div class="message echec">
          Choisir un numero de téléphone valable.
        </div>
      <?php } ?>
      <label for="adressePostale">Adresse Postale :</label>
      <input type="text" name="adressePostale" id="adressePostale" required>
      <input type="submit" name="soumission" class="bouton reserver" value="Réserver">
      <?php
      if ($code_erreur === 4) { ?>
        <div class="message echec">
          Veuillez remplir tous les champs disponible.
        </div>
      <?php } ?>
    </fieldset>

  </form>

</body>
<script src="./JavaScript/animationQuestion.js"></script>
<script src="./JavaScript/verificationCheckbox.js"></script>

</html>