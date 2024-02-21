console.log("hello");
// let suivantOption = document.querySelector('.boutonSuivant');
// let suivantCoordonnees = document.querySelector('.boutonCoordonnees');
// suivantOption.addEventListener('click', nextOption());
// suivantCoordonnees.addEventListener('click', nextCoordonnees());
let formulaireReservation = document.querySelector('#reservation');
let formulaireOption = document.querySelector('#options');
let formulaireCoordonnees = document.querySelector('#coordonnees');

function nextOption() {

    formulaireReservation.style.display = 'none';
    formulaireOption.style.display = 'block';
    formulaireCoordonnees.style.display = 'none';
}

function nextCoordonnees() {

    formulaireReservation.style.display = 'none';
    formulaireOption.style.display = 'none';
    formulaireCoordonnees.style.display = 'block';
}

