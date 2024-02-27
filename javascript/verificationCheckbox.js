// Écouteurs d'événements pour les choix de pass (1 jour, 2 jours, 3 jours)
const formule = document.querySelectorAll('.checkbox1');
formule.forEach(pass => {
    pass.addEventListener('change', function () {
        if (this.checked) {
            formule.forEach(autresPass => {
                if (autresPass !== this) {
                    autresPass.checked = false;
                }
            });
        }
    });
});

// Écouteurs d'événements pour les choix de date
const dates = document.querySelectorAll('.checkbox2');
dates.forEach(date => {
    date.addEventListener('change', function () {
        if (this.checked) {
            dates.forEach(autresDates => {
                if (autresDates !== this) {
                    autresDates.checked = false;
                }
            });
        }
    });
});

// Écouteurs d'événements pour les choix de pass réduit
const tarifReduit = document.querySelectorAll('.checkbox3');
tarifReduit.forEach(passReduit => {
    passReduit.addEventListener('change', function () {
        if (this.checked) {
            tarifReduit.forEach(autresPassReduit => {
                if (autresPassReduit !== this) {
                    autresPassReduit.checked = false;
                }
            });
            passes.forEach(pass => pass.checked = false);
        }
    });
});

// Écouteurs d'événements pour les choix de date de pass réduit
const passReduitDates = document.querySelectorAll('.checkbox4');
passReduitDates.forEach(passReduitDate => {
    passReduitDate.addEventListener('change', function () {
        if (this.checked) {
            passReduitDates.forEach(autresPassReduitDate => {
                if (autresPassReduitDate !== this) {
                    autresPassReduitDate.checked = false;
                }
            });
        }
    });
});

const choixTente = document.querySelectorAll('.tenteNuit');
const choixVan = document.querySelectorAll('.vanNuit');
const enfants = document.querySelectorAll('.enfant');

//  Ecouteurs d'événements pour les tentes
choixTente.forEach(tente => {
    tente.addEventListener('change', function () {
        choixTente.forEach(autreschoix => {
            if (autreschoix !== this) {
                autreschoix.checked = false;
            }
        })
    })
})
//  Ecouteurs d'événements pour les van
choixVan.forEach(van => {
    van.addEventListener('change', function () {
        choixVan.forEach(autreschoix => {
            if (autreschoix !== this) {
                autreschoix.checked = false;
            }
        })
    })
})
//  Ecouteurs d'événements pour les enfants
enfants.forEach(enfant => {
    enfant.addEventListener('change', function () {
        enfants.forEach(autreschoix => {
            if (autreschoix !== this) {
                autreschoix.checked = false;
            }
        })
    })
})