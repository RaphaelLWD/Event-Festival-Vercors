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
  <script src="./javascript/modal.js" defer></script>

</head>
<header></header>
<div class="bandeau">
  <img class="logo" src="./Medias/logoVercors.png">
</div>




<body>
  <form action="sources/traitement.php" id="inscription" method="POST">
    <fieldset id="reservation" style="display:block">
      <legend>Réservation</legend>
      <h3>Nombre de réservation(s) :</h3>
      <input type="number" name="nombrePlaces" id="NombrePlaces" min="1">
      <h3>Réservation(s) en tarif réduit (sur présentation des pièces justificatives)</h3>
      <input type="checkbox" name="tarifReduit" id="tarifReduit" onchange="passROption()">
      <label for="tarifReduit">Ma réservation sera en tarif réduit</label>

      <h3>Choisissez votre formule :</h3>
      <input type="checkbox" name="passSelection" id="pass1jour" onchange="pass1Option()">
      <label for="pass1jour">Pass 1 jour : 40€</label>

      <!-- Si case cochée, afficher le choix du jour -->
      <section id="pass1jourDate" class="hidden">
        <input type="checkbox" name="passSelection" id="choixJour1">
        <label for="choixJour1">Pass pour la journée du 01/07</label>
        <input type="checkbox" name="passSelection" id="choixJour2">
        <label for="choixJour2">Pass pour la journée du 02/07</label>
        <input type="checkbox" name="passSelection" id="choixJour3">
        <label for="choixJour3">Pass pour la journée du 03/07</label>
      </section>

      <input type="checkbox" name="passSelection" id="pass2jours" onchange="pass2Option()">
      <label for="pass2jours">Pass 2 jours : 70€</label>

      <!-- Si case cochée, afficher le choix des jours -->
      <section id="pass2joursDate" class="hidden">
        <input type="checkbox" name="passSelection" id="choixJour12">
        <label for="choixJour12">Pass pour deux journées du 01/07 au 02/07</label>
        <input type="checkbox" name="passSelection" id="choixJour23">
        <label for="choixJour23">Pass pour deux journées du 02/07 au 03/07</label>
      </section>


      <input type="checkbox" name="passSelection" id="pass3jours">
      <label for="pass3jours">Pass 3 jours : 100€</label>


      <!-- tarifs réduits : à n'afficher que si tarif réduit est sélectionné -->
      <section id="tarifReduitChoix" class="hidden">
        <input type="checkbox" name="passSelection" id="pass1jourReduit">
        <label for="pass1jour">Pass 1 jour : 25€</label>
        <input type="checkbox" name="passSelection" id="pass2joursReduit">
        <label for="pass2jours">Pass 2 jours : 50€</label>
        <input type="checkbox" name="passSelection" id="pass3joursReduit">
        <label for="pass3jours">Pass 3 jours : 65€</label>
      </section>
      <!-- FACULTATIF : ajouter un pass groupe (5 adultes : 150€ / jour) uniquement pass 1 jour -->
      <input type="checkbox" name="passSelection" id="passGroupe">
      <label for="passGroupe">Pass Groupe 5 personnes : 150€ / jour</label>

      <section id="passGroupeChoisi" class="hidden">
        <!-- tarifs groupe selon nombres de jours: à n'afficher que si tarif groupe est sélectionné -->
        <input type="checkbox" name="passSelection" id="passGroupe1jour">
        <label for="passGroupe1jour">Pass Groupe une journée : 150€</label>

        <section id="passGroupe1jourDate" class="displayNone displayBlock">
          <input type="checkbox" name="passSelection" id="choixGroupeJour1">
          <label for="choixGroupeJour1">Pass pour la journée du 01/07</label>
          <input type="checkbox" name="passSelection" id="choixGroupeJour2">
          <label for="choixGroupeJour2">Pass pour la journée du 02/07</label>
          <input type="checkbox" name="passSelection" id="choixGroupeJour3">
          <label for="choixGroupeJour3">Pass pour la journée du 03/07</label>
        </section>

        <input type="checkbox" name="passSelection" id="passGroupe2jour">
        <label for="passGroupe2jours">Pass Groupe 2 jours : 300€</label>

        <section id="passGroupe2joursDate" class="displayNone displayBlock">
          <input type="checkbox" name="passSelection" id="choixGroupeJour12">
          <label for="choixGroupeJour12">Pass pour deux journées du 01/07 au 02/07</label>
          <input type="checkbox" name="passSelection" id="choixGroupeJour23">
          <label for="choixGroupeJour23">Pass pour deux journées du 02/07 au 03/07</label>
        </section>

        <input type="checkbox" name="passSelection" id="passGroupe3jour">
        <label for="passGroupe3jours">Pass Groupe 3 jours : 450€</label>
      </section>
      <div id="boutonSuivant" type="submit" name="submit1" onclick="nextFieldset('options')">
        <p class="bouton">Suivant</p>
      </div>
      <?php

      ?>
    </fieldset>
    <fieldset id="options" style="display:none">
      <legend>Options</legend>
      <h3>Réserver un emplacement de tente : </h3>
      <input type="checkbox" id="tenteNuit1" name="tenteNuit1">
      <label for="tenteNuit1">Pour la nuit du 01/07 (5€)</label>
      <input type="checkbox" id="tenteNuit2" name="tenteNuit2">
      <label for="tenteNuit2">Pour la nuit du 02/07 (5€)</label>
      <input type="checkbox" id="tenteNuit3" name="tenteNuit3">
      <label for="tenteNuit3">Pour la nuit du 03/07 (5€)</label>
      <input type="checkbox" id="tente3Nuits" name="tente3Nuits">
      <label for="tente3Nuits">Pour les 3 nuits (12€)</label>

      <h3>Réserver un emplacement de camion aménagé : </h3>
      <input type="checkbox" id="vanNuit1" name="vanNuit1">
      <label for="vanNuit1">Pour la nuit du 01/07 (5€)</label>
      <input type="checkbox" id="vanNuit2" name="vanNuit2">
      <label for="vanNuit2">Pour la nuit du 02/07 (5€)</label>
      <input type="checkbox" id="vanNuit3" name="vanNuit3">
      <label for="vanNuit3">Pour la nuit du 03/07 (5€)</label>
      <input type="checkbox" id="van3Nuits" name="van3Nuits">
      <label for="van3Nuits">Pour les 3 nuits (12€)</label>

      <h3>Venez-vous avec des enfants ?</h3>
      <input type="checkbox" name="enfantsOui" id="enfantO" onchange="enfantOption()"><label for="enfantsOui">Oui</label>
      <input type="checkbox" name="enfantsNon" onchange="enfantOption()"><label for="enfantsNon" id="enfantN">Non</label>

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
      <input type="text" name="nom" id="nom">
      <?php
      if ($code_erreur === 2) { ?>
        <div class="message echec">
          Veuillez blablala.
        </div>
      <?php } ?>
      <label for="prenom">Prénom :</label>
      <input type="text" name="prenom" id="prenom">
      <label for="email">Email :</label>
      <input type="email" name="email" id="email">
      <label for="telephone">Téléphone :</label>
      <input type="tel" name="telephone" id="telephone" maxlength="10">
      <label for="adressePostale">Adresse Postale :</label>
      <input type="text" name="adressePostale" id="adressePostale">

      <input type="submit" name="soumission" class="bouton" value="Réserver">

    </fieldset>

  </form>

</body>
<script src="./JavaScript/animationQuestion.js"></script>

</html>