<?php
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../config/regex.php';
// require_once __DIR__ . '/../config/init.php';

session_start();

try {
    $title = 'DofusUniverse - Connexion';
    $errors = [];
    if ($_SERVER["REQUEST_METHOD"] == 'POST') {
        //récupération et validation du pseudo
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($username)) {
            $errors['username'] = 'Veuillez entre votre pseudo';
        } else {
            $isOk = filter_var($username, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => '/' . REGEX_PSEUDO . '/')));
            if ($isOk == false) {
                $errors['username'] = 'Le champs n\'est pas valide';
            }
        }
        //récupération et validation du mot de passe
        $password = filter_input(INPUT_POST, 'password', FILTER_DEFAULT);
        $password = $_POST['password'];
        if (empty($password)) { 
            $errors['password'] = 'Veuillez entrer votre mot de passe';
        } else {
            $isOk = filter_var($password, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => '/' . REGEX_PASSWORD . '/')));
            if ($isOk == false) {
                $errors['password'] = 'Mot de passe non valide';
            } else {
                //fonction permettant de hashé le mot de passe (il est encrypté, qui sera toujours un string de 60 caractères de long)
                $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            }
        }

        $loggedInUser = User::authenticate($username, $password);

        //password_verify -> permet de récup le mdp de l'user et de le comparé avec le mdp haché en BDD
        if ($loggedInUser && password_verify($password, $loggedInUser->password)) {
            // récupe de l'ID de l'utilisateur pour récupérer ses informations depuis la BDD
            $id_users = $loggedInUser->id_users;
    
            $getAllUser = User::get($id_users);
    
            $_SESSION['username'] = $getAllUser->username;
            $_SESSION['id_users'] = $getAllUser->id_users;
            $_SESSION['role'] = $getAllUser->role;

            header("location: accueil_controller.php");
            die;
        } else {
            throw new Exception("Nom d'utilisateur ou mot de passe incorrect");
        }
    }

} catch (\Throwable $th) {
    $error = $th->getMessage();
    include __DIR__ . '/../views/templates/header.php';
    include __DIR__ . '/../views/templates/error.php';
    include __DIR__ . '/../views/templates/footer.php';
    die;
}


include __DIR__ . '/../views/templates/header.php';
include __DIR__ . '/../views/connexion.php';
include __DIR__ . '/../views/templates/footer.php';
