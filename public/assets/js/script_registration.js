let pseudoElement = document.querySelector('#pseudo');
let pseudoHelp = document.querySelector('#pseudoHelp');
let emailElement = document.querySelector('#email');
let emailHelp = document.querySelector('#emailHelp');
let password1 = document.querySelector('#password');
let password2 = document.querySelector('#password2');
let passwordCheck = document.querySelector('#passwordCheck');

// liste des regex
const regexPseudo = /^[a-zA-Z0-9_-]{3,16}$/;
const regexMail = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,5}$/;
const regexPassword = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/;

// constante pour le pseudo
const checkLastname = () => {
    pseudoElement.classList.remove('border-danger', 'border-success', 'border-3')
    // permet de remove les class ajouté à bootstrap au moment de l'input 
    pseudoHelp.classList.add('d-none');
    // ajout de la classe d-none pour enlevé le message 

    if (pseudoElement.value== '') {
        return
    }
// permet de réinitialisé le champ si il est vide, return sert à stoppé la boucle si rien n'est écrit

    // refait une nouvelle instance à chaque input (évite le true/false/true/false ...)
    let isValid = regexPseudo.test(pseudoElement.value)

    if (isValid == false) {
        pseudoElement.classList.add('border-danger', 'border-3')
        pseudoHelp.classList.remove('d-none');
    } else {
        pseudoElement.classList.add('border-success', 'border-3')
        pseudoHelp.classList.add('d-none');
    }
}

//constante pour l'email
const checkEmail = () => {
    emailElement.classList.remove('border-danger', 'border-success', 'border-3')
    emailHelp.classList.add('d-none');

    if (emailElement.value== '') {
        return
    }

    let regexInstance = new RegExp(regexMail)
    let isValid = regexInstance.test(emailElement.value)

    if (isValid == false) {
        emailElement.classList.add('border-danger', 'border-3')
        emailHelp.classList.remove('d-none');
    } else {
        emailElement.classList.add('border-success', 'border-3')
        emailHelp.classList.add('d-none');
    }
}

// constante pour les mots de passe
const validPassword = () => {
    password2.classList.remove('border-danger', 'border-success', 'border-3')
    password1.classList.remove('border-danger', 'border-success', 'border-3')
    passwordCheck.classList.add('d-none');

    if (password1.value == '' && password2.value == '') {
        return
    }
    let regexInstance = new RegExp(regexPassword)
    let isPasswordValid = regexInstance.test(password1.value)

    if (password1.value != password2.value) {
        password2.classList.add('border-danger', 'border-3')
        passwordCheck.classList.remove('d-none');
    } else {
        password2.classList.add('border-success', 'border-3')
        password1.classList.add('border-success', 'border-3')
        passwordCheck.classList.add('d-none');
    }

}

// écouteur d'évènements à l'appui de la touche du clavier
pseudoElement.addEventListener('keyup', checkLastname);
emailElement.addEventListener('keyup', checkEmail);
password1.addEventListener('keyup', validPassword);
password2.addEventListener('keyup', validPassword);