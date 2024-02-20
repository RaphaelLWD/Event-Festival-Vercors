/**
 * [afficherChoix Permet d'afficher le contenu des choix disponibles si la case est cochée]
 *
 * @return  {[Boolean]}  [return Retourne true si la cas est cochée, false sinon]
 */
// Mes sections
let reservation = document.querySelector('#reservation');
let option = document.querySelector('#options');
let coordonnees = document.querySelector('#coordonnees');
// Mes boutons d'action
let suivantOption = document.querySelector('#boutonSuivant');
let suivantCoordonnees = document.querySelector('#boutonCoordonnees');
let afficher = TRUE;
suivantOption.addEventListener("click", suivant);
suivantCoordonnees.addEventListener("click", suivant);

function afficherUniquementReservation() {
    if (reservation ==  ) {

    }
    reservation.classList.remove('displayNone');
    option.classList.add('displayNone');
    coordonnees.classList.add('displayNone');
}
function suivant() {

}
