<?php
if(isset ($_POST["nom"]) && !empty($_POST["nom"])){
    $nom = htmlentities(($_POST["nom"]));

}else{
    header("location:./index.php?erreur=". ERREUR_NOM);
    die;
}