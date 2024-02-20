function pass1Option() {
  let checkbox1 = document.getElementById("pass1jour");
  let pass1 = document.getElementById("pass1jourDate");

  if (checkbox1.checked) {
    pass1.style.display = "flex";
  } else {
    pass1.style.display = "none";
  }
}

function pass2Option() {
  let checkbox2 = document.getElementById("pass2jours");
  let pass2 = document.getElementById("pass2joursDate");

  if (checkbox2.checked) {
    pass2.style.display = "flex";
  } else {
    pass2.style.display = "none";
  }
}

function passROption() {
  let checkboxR = document.getElementById("tarifReduit");
  let passR = document.getElementById("tarifReduitChoix");

  if (checkboxR.checked) {
    passR.style.display = "flex";
  } else {
    passR.style.display = "none";
  }
}

function enfantOption() {
  let checkboxEnfantO = document.getElementById("enfantO");
  let checkboxEnfantN = document.getElementById("enfantN");
  let optionEnfant = document.getElementById("optionEnfant");

  if (checkboxEnfantO.checked) {
    optionEnfant.style.display = "flex";
  } else if (checkboxEnfantN.checked) {
    optionEnfant.style.display = "none";
  } else {
    optionEnfant.style.display = "none";
  }
}
