<?php
require __DIR__ . '/../config/regex.php';

$errors = [];

if($_SERVER["REQUEST_METHOD"] == 'POST') {
    //récupération et validation du pseudo
    $pseudo = filter_input(INPUT_POST, 'pseudo', FILTER_SANITIZE_SPECIAL_CHARS);
    if (empty($pseudo)) {
        $errors['pseudo'] = 'Veuillez obligatoirement entrer un pseudo';
    } else {
        $isOk = filter_var($pseudo, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => '/' . REGEX_PSEUDO . '/')));
        if ($isOk == false) {
            $errors['pseudo'] = 'Le champs n\'est pas valide';
        }
    }
    // récupération et validation de l'email
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL,); //nettoie la chaine de caractère de l'email
    if (empty($email)) {
        $errors['email'] = 'Veuillez obligatoirement entrer un email';
    } else {
        $isOk = filter_var($email, FILTER_VALIDATE_EMAIL); //renvoi l'email ou false
        if ($isOk === false) {
            $errors['email'] = 'l\'email n\'est pas valide';
        }
    }
    //récupération et validation du mot de passe
    $password = filter_input(INPUT_POST, 'password', FILTER_DEFAULT);
    $password2 = filter_input(INPUT_POST, 'password2', FILTER_DEFAULT);
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    if (empty($password) || (empty($password2))) { // l'opérateur || correspond à 'OU'
        $errors['password'] = 'Veuillez obligatoirement entrer un mot de passe et sa confirmation';
    } else {
        $isOk = filter_var($password, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => '/' . REGEX_PASSWORD . '/')));
        if ($isOk == false) {
            $errors['password'] = 'Mot de passe non valide (Veuillez respecter la structure ci-dessus)';
        } elseif ($password !== $password2) {
            $errors['password'] = 'Les mots de passe ne sont pas identiques';
        } else {
            //fonction permettant de hashé le mot de passe (il est encrypté, qui sera toujours un string de 60 caractères de long)
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        }
    }
}



include __DIR__ . '/../views/templates/header.php';
include __DIR__ . '/../views/inscription.php';
include __DIR__ . '/../views/templates/footer.php';