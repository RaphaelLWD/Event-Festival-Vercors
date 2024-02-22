function nextFieldset(Id) {

    let fieldsetSuivant = document.getElementById(Id);
    let fieldsetActuel = fieldsetSuivant.previousElementSibling;

    fieldsetSuivant.style.display = 'block';
    fieldsetActuel.style.display = 'none';
}


