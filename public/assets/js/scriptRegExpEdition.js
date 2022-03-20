// regex
const regexPseudo = /^[0-9a-zA-Zçéàïîüûëêè'_-]{3,10}$/;
const regexEmail = /^[a-zA-Z0-9.!#$%&çéàïîüûëêè'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA -Z0-9-]{0,61}[a-zA-Z0-9]) ?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{ 0,61}[a-zA-Z0-9]) ?)*$/;
const regexPassword = /^[a-zA-Z0-9.!#$%&çéàïîüûëêè'*+\/=?^_`{|}~-]{5,15}$/;

// Variables
let form = document.querySelector('#editionForm');


// RegExp Email
function validateEmail() {
    if (regexEmail.test(form.inputEmail.value) != true) {
        alertEmail.innerHTML = ('Veuillez vérifier le format de l\'email');
        inputEmail.classList.add("alertColor");
    }
}

// RegExp Password
function validatePassword() {
    if (regexPassword.test(form.inputPassword.value) != true) {
        alertPassword.innerHTML = ('Votre mot de passe doit contenir entre 5 et 15 caractères');
        inputPassword.classList.add("alertColor");
    }
}

// Password == PasswordConfirm
function passwordPasswordConfirm() {
    if (inputPassword.value != inputPasswordConfirm.value || inputPasswordConfirm.value == 0) {
        alertPasswordConfirm.innerHTML = ('La confirmation doit être identique au mot de passe');
        inputPasswordConfirm.classList.add("alertColor");
    }
}

// clear alert
function clearAlert() {
    alertEmail.innerHTML = ('');
    alertPassword.innerHTML = ('');
    alertPasswordConfirm.innerHTML = ('');
}


// bouton pour lancer les fonctions au clic
editionBtn.onclick = () => {
    clearAlert();
    validateEmail();
    validatePassword();
    passwordPasswordConfirm();
}

inputEmail.onclick = () => {
    inputEmail.classList.remove("alertColor");
};

inputPassword.onclick = () => {
    inputPassword.classList.remove("alertColor");
};

inputPasswordConfirm.onclick = () => {
    inputPasswordConfirm.classList.remove("alertColor");
};