<?php 
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../config/regex.php';
require_once __DIR__ . '/../config/init.php';

try {
    $title = "DofusUniverse - Modification utilisateur";
    $errors = [];
    //intval -> permet de nettoyer un entier
    $id_users = intval(filter_input(INPUT_GET, 'id_users', FILTER_SANITIZE_NUMBER_INT));
        //permet ici de filtrer le paramètre d'url id_users
    $userObj = User::get($id_users);
    //pour appelé la méthode static -> appel de la classe avec :: nom de la fonction
    //variable qui appel la classe et sa méthode -> récupére l'id de l'utilisateur

    if ($_SERVER["REQUEST_METHOD"] == 'POST') {
        //récupération et validation du pseudo
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($username)) {
            $errors['username'] = 'Veuillez obligatoirement entrer un pseudo';
        } else {
            $isOk = filter_var($username, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => '/' . REGEX_PSEUDO . '/')));
            if ($isOk == false) {
                $errors['username'] = 'Le champs n\'est pas valide';
            }
        }
        // récupération et validation de l'email
        $mail = filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_EMAIL,); //nettoie la chaine de caractère de l'email
        if (empty($mail)) {
            $errors['mail'] = 'Veuillez obligatoirement entrer un email';
        } else {
            $isOk = filter_var($mail, FILTER_VALIDATE_EMAIL); //renvoi l'email ou false
            if ($isOk === false) {
                $errors['mail'] = 'l\'email n\'est pas valide';
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
        // //récupération et validation de l'image de l'utilisateur
        try {
            //condition si une image est déjà enregistrée à un véhicule et le modifié ensuite
            $userPicture = $_FILES['picture'];
            //$userPicture contient un tableau de 6 valeurs
            if (!empty($userPicture['name'])) {
                if ($userPicture['error'] != 0) {
                    throw new Exception("Fichier non envoyé", 1);
                }
                if (!in_array($userPicture['type'], AUTHORIZED_IMAGE_FORMAT)) {
                    throw new Exception("Mauvaise extension de fichier", 2);
                }
                if ($userPicture['size'] >= FILE_SIZE) {
                    throw new Exception("Taille du fichier dépassé", 3);
                }
                //permet de recup l'extension -> $extension contient png
                $extension = pathinfo($userPicture['name'], PATHINFO_EXTENSION);
                //$fileName -> renomme le fichier, uniqid se base sur le timestamp donc id unique
                //et permet de récupérer le nom du fichier
                $fileName = uniqid('img_') . '.' . $extension;
                //$from contient le nom temporaire du fichier
                $from = $userPicture['tmp_name'];
                $to = __DIR__ . '/../public/uploads/users/' . $fileName;
                //déplace un fichier d'un endroit à un autre
                move_uploaded_file($from, $to);
                //@ permet de passer outre si il y a une erreur
                @unlink(__DIR__ . '/../public/uploads/users/' . $userObj->picture);
            }
        } catch (\Throwable $th) {
            $errors['picture'] = $th->getMessage();
        }
        if (empty($errors)) {
            $newUser = new User();
            //nouvel instance de l'objet issu de la classe Vehicle
            //on hydrate l'objet de toute les propriété
            $newUser->setUsername($username);
            $newUser->setMail($mail);
            $newUser->setPassword($hashedPassword);
            $newUser->setPicture($fileName);
            $newUser->setId_users($id_users);
            //on hydrate l'objet de toute les propriété
            $saved = $newUser->update();
        }
            //$saved -> réponse de la méthode en question -> ici retourne un booléen
            if ($saved == true) {
                //permet la redirection à la liste des catégories à la modification
                header('location: /controllers/user_profil_controller.php');
                die;
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
include __DIR__ . '/../views/user_update_profil.php';
include __DIR__ . '/../views/templates/footer.php';