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

    <!-- Premier Bloc -->
    <fieldset id="reservation" style="display:block">

      <legend>Réservation</legend>

      <h3>Nombre de réservation(s) :</h3>
      <input type="number" name="nombrePlaces" id="NombrePlaces" min="1">
      <?php
      if ($code_erreur === 2) { ?>
        <div class="message echec">
          Vous devez entrer un nombre de réservations.
        </div>
      <?php } ?>

      <h3>Réservation(s) en tarif réduit (sur présentation des pièces justificatives)
        <div class="cadre">
          <div class="infos">
            <span>Sur présentation des pièces justificatives :<br>
              _pièce d'identité<br>
              _carte mobilité inclusion
              _attestation chômage
            </span>
          </div>
          <span class="logoI">&#x1F6C8</span>
        </div>
      </h3>



      <input type="checkbox" name="tarifReduit" id="tarifReduit" onchange="passROption()">
      <?php
      if ($code_erreur === 8) { ?>
        <div class="message echec">
          Choisir une formule et une date.
        </div>
      <?php } ?>
      <label for="tarifReduit">Ma réservation sera en tarif réduit</label>

      <h3>Choisissez votre formule :</h3>
      <div class="colone">
        <div>
          <input type="checkbox" name="passSelection1" id="pass1jour" onchange="pass1Option()">
          <label for="pass1jour">Pass 1 jour : 40€</label>
        </div>

        <?php
        if ($code_erreur === 7) { ?>
          <div class="message echec">
            Vous devez choisir une formule.
          </div>
        <?php } ?>

        <div>
          <input type="checkbox" name="passSelection2" id="pass2jours" onchange="pass2Option()">
          <label for="pass2jours">Pass 2 jours : 70€</label>
        </div>

        <div>
          <input type="checkbox" name="passSelection3" id="pass3jours">
          <label for="pass3jours">Pass 3 jours : 100€</label>
        </div>

      </div>

      <!-- tarifs réduits : à n'afficher que si tarif réduit est sélectionné -->

      <section id="tarifReduitChoix" class="hidden">
        <div class="colone">
          <h3>Formules réduites :</h3>
          <div>
            <input type="checkbox" name="passjourReduit1" id="pass1jourReduit" onchange="pass1ROption()">
            <label for=" pass1jour">Pass 1 jour : 25€</label>
          </div>

          <div>
            <input type="checkbox" name="passjourReduit2" id="pass2joursReduit" onchange="pass2ROption()">
            <label for=" pass2jours">Pass 2 jours : 50€</label>
          </div>

          <div>
            <input type="checkbox" name="passjourReduit3" id="pass3joursReduit">
            <label for="pass3jours">Pass 3 jours : 65€</label>
          </div>

        </div>
      </section>




      <!-- Si case cochée, afficher le choix des jours -->
      <section id="pass1jourDate" class="hidden">
        <div class="colone">
          <h4>Veuillez selectionner une date :</h4>
          <div>
            <input type="checkbox" name="choixJour1" id="choixJour1">
            <label for="choixJour1">Pass pour la journée du 01/07</label>
          </div>

          <div>
            <input type="checkbox" name="choixJour2" id="choixJour2">
            <label for="choixJour2">Pass pour la journée du 02/07</label>
          </div>

          <div>
            <input type="checkbox" name="choixJour3" id="choixJour3">
            <label for="choixJour3">Pass pour la journée du 03/07</label>
          </div>


      </section>

      <!-- Si case cochée, afficher le choix des jours -->
      <section id="pass2joursDate" class="hidden">
        <div class="colone">
          <h4>Veuillez selectionner une date :</h4>
          <div>
            <input type="checkbox" name="choixJour12" id="choixJour12">
            <label for="choixJour12">Pass pour deux journées du 01/07 au 02/07</label>
          </div>

          <div>
            <input type="checkbox" name="choixJour23" id="choixJour23">
            <label for="choixJour23">Pass pour deux journées du 02/07 au 03/07</label>
          </div>

        </div>

      </section>

      <div id="boutonSuivant" type="submit" name="submit1" onclick="nextFieldset('options')">
        <p class="bouton">Suivant</p>
      </div>

    </fieldset>

    <!-- Second bloc -->
    <fieldset id="options" style="display:none">

      <legend>Options</legend>


      <h3>Réserver un emplacement de tente : </h3>
      <div class="colone">
        <div>
          <input type="checkbox" id="tenteNuit1" name="tenteNuit1">
          <label for="tenteNuit1">Pour la nuit du 01/07 (5€)</label>
        </div>

        <div>
          <input type="checkbox" id="tenteNuit2" name="tenteNuit2">
          <label for="tenteNuit2">Pour la nuit du 02/07 (5€)</label>
        </div>

        <div>
          <input type="checkbox" id="tenteNuit3" name="tenteNuit3">
          <label for="tenteNuit3">Pour la nuit du 03/07 (5€)</label>
        </div>

        <div>
          <input type="checkbox" id="tente3Nuits" name="tente3Nuits">
          <label for="tente3Nuits">Pour les 3 nuits (12€)</label>
        </div>

      </div>


      <h3>Réserver un emplacement de camion aménagé : </h3>

      <div class="colone">
        <div>
          <input type="checkbox" id="vanNuit1" name="vanNuit1">
          <label for="vanNuit1">Pour la nuit du 01/07 (5€)</label>
        </div>

        <div>
          <input type="checkbox" id="vanNuit2" name="vanNuit2">
          <label for="vanNuit2">Pour la nuit du 02/07 (5€)</label>
        </div>

        <div>
          <input type="checkbox" id="vanNuit3" name="vanNuit3">
          <label for="vanNuit3">Pour la nuit du 03/07 (5€)</label>
        </div>

        <div>
          <input type="checkbox" id="van3Nuits" name="van3Nuits">
          <label for="van3Nuits">Pour les 3 nuits (12€)</label>
        </div>

      </div>


      <h3>Venez-vous avec des enfants ?</h3>
      <input type="checkbox" name="enfantsOui" id="enfantO" onchange="enfantOption()"><label for="enfants">Oui</label>
      <input type="checkbox" name="enfants" onchange="enfantOption()"><label for="enfantsNon" id="enfantN">Non</label>

      <!-- Si oui, afficher : -->
      <section id="optionEnfant" class="hidden">
        <div class="colone">
          <h4>Voulez-vous louer un casque antibruit pour enfants* (2€ / casque) ?</h4>
          <label for="nombreCasquesEnfants">Nombre de casques souhaités :</label>
          <input type="number" name="nombreCasquesEnfants" id="nombreCasquesEnfants" min="0">
          <p>*Dans la limite des stocks disponibles.</p>
        </div>
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

    <!-- Troisieme bloc -->
    <fieldset id="coordonnees" style="display:none">

      <legend>Coordonnées</legend>

      <div class="colone coordonne">

        <div class="marginInput">
          <label for="nom">Nom :</label>
          <input type="text" name="nom" id="nom">
        </div>

        <div class="marginInput">
          <label for="prenom">Prénom :</label>
          <input type="text" name="prenom" id="prenom">
        </div>

        <div class="marginInput">
          <label for="email">Email :</label>
          <input type="email" name="email" id="email">
        </div>

        <div class="marginInput">
          <label for="telephone">Téléphone :</label>
          <input type="tel" name="telephone" id="telephone" maxlength="10">
        </div>

        <div class="marginInput">
          <label for="adressePostale">Adresse Postale :</label>
          <input type="text" name="adressePostale" id="adressePostale">
        </div>

      </div>

      <input type="submit" name="soumission" class="bouton reserver" value="Réserver">

    </fieldset>

  </form>

</body>
<script src="./JavaScript/animationQuestion.js"></script>
<script src="./JavaScript/verificationCheckbox.js"></script>

</html>