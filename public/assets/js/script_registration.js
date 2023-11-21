let usernameElement = document.querySelector('#username');
let usernameHelp = document.querySelector('#usernameHelp');
let mailElement = document.querySelector('#mail');
let mailHelp = document.querySelector('#mailHelp');
let password1 = document.querySelector('#password');
let password2 = document.querySelector('#password2');
let passwordCheck = document.querySelector('#passwordCheck');

// liste des regex
const regexUsername = /^[a-zA-Z0-9_-]{3,16}$/;
const regexMail = /^[\w\.\-]+@[\w\-]+\.[a-z]{2,5}$/;
const regexPassword = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{12,}$/;

// constante pour le pseudo
const checkLastname = () => {
    usernameElement.classList.remove('border-danger', 'border-success', 'border-3')
    // permet de remove les class ajouté à bootstrap au moment de l'input 
    usernameHelp.classList.add('d-none');
    // ajout de la classe d-none pour enlevé le message 

    if (usernameElement.value== '') {
        return
    }
// permet de réinitialisé le champ si il est vide, return sert à stoppé la boucle si rien n'est écrit

    // refait une nouvelle instance à chaque input (évite le true/false/true/false ...)
    let isValid = regexUsername.test(usernameElement.value)

    if (isValid == false) {
        usernameElement.classList.add('border-danger', 'border-3')
        usernameHelp.classList.remove('d-none');
    } else {
        usernameElement.classList.add('border-success', 'border-3')
        usernameHelp.classList.add('d-none');
    }
}

//constante pour l'email
const checkMail = () => {
    mailElement.classList.remove('border-danger', 'border-success', 'border-3')
    mailHelp.classList.add('d-none');

    if (mailElement.value== '') {
        return
    }

    let regexInstance = new RegExp(regexMail)
    let isValid = regexInstance.test(mailElement.value)

    if (isValid == false) {
        mailElement.classList.add('border-danger', 'border-3')
        mailHelp.classList.remove('d-none');
    } else {
        mailElement.classList.add('border-success', 'border-3')
        mailHelp.classList.add('d-none');
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
    let isPassword1Valid = regexInstance.test(password1.value);
    let doPasswordsMatch = password1.value === password2.value;

    if (!isPassword1Valid || !doPasswordsMatch) {
        password2.classList.add('border-danger', 'border-3');
        passwordCheck.classList.remove('d-none');
    } else {
        password2.classList.add('border-success', 'border-3');
        password1.classList.add('border-success', 'border-3');
        passwordCheck.classList.add('d-none');
    }

}

// écouteur d'évènements à l'appui de la touche du clavier
usernameElement.addEventListener('keyup', checkLastname);
mailElement.addEventListener('keyup', checkMail);
password1.addEventListener('keyup', validPassword);
password2.addEventListener('keyup', validPassword);