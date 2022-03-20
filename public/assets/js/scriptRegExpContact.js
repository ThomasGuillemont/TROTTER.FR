// regex
const regexEmail = /^[a-zA-Z0-9.!#$%&çéàïîüûëêè'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA -Z0-9-]{0,61}[a-zA-Z0-9]) ?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{ 0,61}[a-zA-Z0-9]) ?)*$/;
const regexPassword = /^[a-zA-Z0-9.!#$%&çéàïîüûëêè'*+\/=?^_`{|}~-]{5,15}$/;
const regexFormControlTextarea = /^[a-zA-Z0-9.!#$%&çéàïîüûùëêè,;:"()_\R '*+\/=?^_`{|}~-]{5,100}$/;

// Variables
let form = document.querySelector('#contactForm');


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

// RegExp formControlTextarea
function validateformControlTextarea() {
    // text wrap
    inputTextarea = form.formControlTextarea.value.replace(/(\r\n|\n|\r)/gm, "");
    if (regexFormControlTextarea.test(inputTextarea) != true) {
        alertMessage.innerHTML = ('Oups, vous avez oublié votre message');
        formControlTextarea.classList.add("alertColor");
    }
}


// clear alert
function clearAlert() {
    alertEmail.innerHTML = ('');
    alertPassword.innerHTML = ('');
    alertMessage.innerHTML = ('');
}


// bouton pour lancer les fonctions au clic
contactBtn.onclick = () => {
    clearAlert();
    validateEmail();
    validatePassword();
    validateformControlTextarea();
}

inputEmail.onclick = () => {
    inputEmail.classList.remove("alertColor");
};

inputPassword.onclick = () => {
    inputPassword.classList.remove("alertColor");
};

formControlTextarea.onclick = () => {
    formControlTextarea.classList.remove("alertColor");
};