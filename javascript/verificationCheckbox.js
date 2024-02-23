const choixFormule = document.querySelectorAll('.checkbox1'); // Comprends Pass 1 Pass 2 Pass 3 et Tarif reduit
const choixDate = document.querySelectorAll('.checkbox2');  // Comprends date 1 date 2 date 3 date 4 et 5 
const choixFormuleReduit = document.querySelectorAll('.checkbox3'); // Comprends les différents pass mais en reduit
const choixDateReduit = document.querySelectorAll('.checkbox4');   // Comprends les différentes dates mais en reduit

choixFormule.forEach(formule => {
    formule.addEventListener('change', function () {
        if (this.checked) {
            choixFormule.forEach(autresFormule => {
                if (autresFormule !== this) {
                    autresFormule.checked = false;
                }
            })
        }
    })
});
choixDate.forEach(date => {
    date.addEventListener('change', function () {
        if (this.checked) {
            choixDate.forEach(autresDate => {
                if (autresDate !== this) {
                    autresDate.checked = false;
                }
            })
        }
    })
})
choixFormuleReduit.forEach(formuleReduit => {
    formuleReduit.addEventListener('change', function () {
        if (this.checked) {
            choixFormuleReduit.forEach(autresFormuleReduit => {
                if (autresFormuleReduit !== this) {
                    autresFormuleReduit.checked = false;
                }
            })
        }
    })
})
choixDateReduit.forEach(dateReduit => {
    dateReduit.addEventListener('change', function () {
        if (this.checked) {
            choixDateReduit.forEach(autresDateReduit => {
                if (autresDateReduit !== this) {
                    autresDateReduit.checked = false;
                }
            })
        }
    })
});

const choixTente = document.querySelectorAll('.tenteNuit');
const choixVan = document.querySelectorAll('.vanNuit');
const enfants = document.querySelectorAll('.enfant');

choixTente.forEach(tente => {
    tente.addEventListener('change', function () {
        choixTente.forEach(autreschoix => {
            if (autreschoix !== this) {
                autreschoix.checked = false;
            }
        })
    })
})
choixVan.forEach(van => {
    van.addEventListener('change', function () {
        choixVan.forEach(autreschoix => {
            if (autreschoix !== this) {
                autreschoix.checked = false;
            }
        })
    })
})
enfants.forEach(enfant => {
    enfant.addEventListener('change', function () {
        enfants.forEach(autreschoix => {
            if (autreschoix !== this) {
                autreschoix.checked = false;
            }
        })
    })
})