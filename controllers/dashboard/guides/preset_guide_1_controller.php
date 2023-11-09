<?php
require_once __DIR__ . '/../../../config/regex.php';
require_once __DIR__ . '/../../../models/Guide.php';
require_once __DIR__ . '/../../../models/User.php';


try {
    $errors = [];
    $getUserList = User::get_all();
    if ($_SERVER["REQUEST_METHOD"] == 'POST') {
        //récupération et validation du titre du donjon
        $main_title = filter_input(INPUT_POST, 'main_title', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($main_title)) {
            $errors['main_title'] = 'Veuillez obligatoirement entrer le titre du donjon';
        } else {
            $isOk = filter_var($main_title, FILTER_DEFAULT);
            if ($isOk == false) {
                $errors['main_title'] = 'Ce champs n\'est pas valide';
            }
        }
        //récupération et validation du texte principal du donjon
        $main_text = filter_input(INPUT_POST, 'main_text', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($main_text)) {
            $errors['main_text'] = 'Veuillez obligatoirement entrer le texte principal';
        } else {
            $isOk = filter_var($main_text, FILTER_DEFAULT);
            if ($isOk == false) {
                $errors['main_text'] = 'Ce champs n\'est pas valide';
            }
        }
        //récupération et validation du descriptif du donjon
        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($description)) {
            $errors['description'] = 'Veuillez obligatoirement entrer la description du donjon';
        } else {
            $isOk = filter_var($description, FILTER_DEFAULT);
            if ($isOk == false) {
                $errors['description'] = 'Ce champs n\'est pas valide';
            }
        }
        //récupération et validation de l'ID du user
        $id_users = intval(filter_input(INPUT_POST, 'type', FILTER_SANITIZE_NUMBER_INT));
        // if (!User::get($id_users)) {
        //     $errors['id_users'] = 'Catégorie inexistante';
        // }
        // //récupération et validation de l'image de la voiture
        //$picture contient un tableau de 6 valeurs
        try {
            $guidePicture = $_FILES['picture'];
            if (empty($guidePicture)) {
                throw new Exception("Veuillez renseigner un fichier", 1);
            }
            if ($guidePicture['error'] != 0) {
                throw new Exception("Fichier non envoyé", 2);
            }
            if (!in_array($guidePicture['type'], AUTHORIZED_IMAGE_FORMAT)) {
                throw new Exception("Mauvaise extension de fichier", 3);
            }
            if ($guidePicture['size'] > FILE_SIZE) {
                throw new Exception("Taille du fichier dépassé", 4);
            }
            //permet de recup l'extension -> $extension contient png
            $extension = pathinfo($guidePicture['name'], PATHINFO_EXTENSION);
            //$fileName -> renomme le fichier, uniqid se base sur le timestamp donc id unique
            //et permet de récupérer le nom du fichier
            $fileName = uniqid('img_') . '.' . $extension;
            //$from contient le nom temporaire du fichier
            $from = $guidePicture['tmp_name'];
            $to = __DIR__ . '/../../../public/uploads/guides/' . $fileName;
            //déplace un fichier d'un endroit à un autre
            move_uploaded_file($from, $to);
        } catch (\Throwable $th) {
            $errors['picture'] = $th->getMessage();
        }
        if (empty($errors)) {
            $newGuide = new Guide();
            //nouvel instance de l'objet issu de la classe Vehicle
            //on hydrate l'objet de toute les propriété
            $newGuide->setMain_title($main_title);
            $newGuide->setMain_text($main_text);
            $newGuide->setPicture($fileName);
            //ici on hydrate avec fileName -> car c'est le fichier généré
            $newGuide->setDescription($description);
            // $newGuide->setId_users($id_users);
            //on hydrate l'objet de toute les propriété
            $saved = $newGuide->insert();
            //$saved -> réponse de la méthode en question -> ici retourne un booléen
        }
    }
} catch (\Throwable $th) {
    $error = $th->getMessage();
    include __DIR__ . '/../../../views/dashboard/templates/header_dashboard.php';
    include __DIR__ . '/../../../views/templates/error.php';
    include __DIR__ . '/../../../views/dashboard/templates/footer_dashboard.php';
    die;
}

include __DIR__ . '/../../../views/dashboard/templates/header_dashboard.php';
include __DIR__ . '/../../../views/dashboard/guides/preset_guide_1.php';
include __DIR__ . '/../../../views/dashboard/templates/footer_dashboard.php';