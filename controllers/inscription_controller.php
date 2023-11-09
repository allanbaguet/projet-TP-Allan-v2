<?php
require_once __DIR__ . '/../config/regex.php';
require_once __DIR__ . '/../models/User.php';



try {
    $errors = [];
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
        // try {
        //     $userPicture = $_FILES['picture'];
        //     if ($userPicture['error'] != 0) {
        //         throw new Exception("Fichier non envoyé", 2);
        //     }
        //     if (!in_array($userPicture['type'], AUTHORIZED_IMAGE_FORMAT)) {
        //         throw new Exception("Mauvaise extension de fichier", 3);
        //     }
        //     if ($userPicture['size'] > FILE_SIZE) {
        //         throw new Exception("Taille du fichier dépassé", 4);
        //     }
        //     //permet de recup l'extension -> $extension contient png
        //     $extension = pathinfo($userPicture['name'], PATHINFO_EXTENSION);
        //     //$fileName -> renomme le fichier, uniqid se base sur le timestamp donc id unique
        //     //et permet de récupérer le nom du fichier
        //     $fileName = uniqid('img_') . '.' . $extension;
        //     //$from contient le nom temporaire du fichier
        //     $from = $userPicture['tmp_name'];
        //     $to = __DIR__ . '/../../../public/uploads/users/' . $fileName;
        //     //déplace un fichier d'un endroit à un autre
        //     move_uploaded_file($from, $to);
        // } catch (\Throwable $th) {
        //     $errors['picture'] = $th->getMessage();
        // }
        if (empty($errors)) {
            $newUser = new User();
            //nouvel instance de l'objet issu de la classe Vehicle
            //on hydrate l'objet de toute les propriété
            $newUser->setUsername($username);
            $newUser->setMail($mail);
            $newUser->setPassword($hashedPassword);
            // $newUser->setId_users($id_users);
            //on hydrate l'objet de toute les propriété
            $saved = $newUser->insert();
            //$saved -> réponse de la méthode en question -> ici retourne un booléen
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
include __DIR__ . '/../views/inscription.php';
include __DIR__ . '/../views/templates/footer.php';
