<?php
require_once __DIR__ . '/../../../config/database.php';
require_once __DIR__ . '/../../../config/regex.php';
require_once __DIR__ . '/../../../models/Dungeon.php';
require_once __DIR__ . '/../../../models/User.php';
require_once __DIR__ . '/../../../config/init.php';


try {
    //condition permettant de refusé l'accès à un utilisateur si il n'est pas admin en le renvoyant à l'accueil
    if ($_SESSION['role'] != 2) {
        header('location: /controllers/accueil_controller.php');
        die;
    }
    $errors = [];
    // $getUserList = User::get_all();
    $id_dungeons = intval(filter_input(INPUT_GET, 'id_dungeons', FILTER_SANITIZE_NUMBER_INT));
    //permet ici de filtrer le paramètre d'url id_dungeons
    $title = "DofusUniverse - Modification page donjon";
    $dungeonObj = Dungeon::get($id_dungeons);
    //pour appelé la méthode static -> appel de la classe avec :: nom de la fonction
    //variable qui appel la classe et sa méthode -> récupére l'id du donjon
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
        // $id_users = intval(filter_input(INPUT_POST, 'type', FILTER_SANITIZE_NUMBER_INT));
        // if (!User::get($id_users)) {
        //     $errors['id_users'] = 'Catégorie inexistante';
        // }

        // //récupération et validation de l'image du donjon
        //$picture contient un tableau de 6 valeurs
        try {
            $dungeonPicture = $_FILES['picture'];
            if (empty($dungeonPicture)) {
                throw new Exception("Veuillez renseigner un fichier", 1);
            }
            if ($dungeonPicture['error'] != 0) {
                throw new Exception("Fichier non envoyé", 2);
            }
            if (!in_array($dungeonPicture['type'], AUTHORIZED_IMAGE_FORMAT)) {
                throw new Exception("Mauvaise extension de fichier", 3);
            }
            if ($dungeonPicture['size'] > FILE_SIZE) {
                throw new Exception("Taille du fichier dépassé", 4);
            }
            //permet de recup l'extension -> $extension contient png
            $extension = pathinfo($dungeonPicture['name'], PATHINFO_EXTENSION);
            //$fileName -> renomme le fichier, uniqid se base sur le timestamp donc id unique
            //et permet de récupérer le nom du fichier
            $fileName = uniqid('img_') . '.' . $extension;
            //$from contient le nom temporaire du fichier
            $from = $dungeonPicture['tmp_name'];
            $to = __DIR__ . '/../../../public/uploads/dungeons/' . $fileName;
            //déplace un fichier d'un endroit à un autre
            move_uploaded_file($from, $to);
        } catch (\Throwable $th) {
            $errors['picture'] = $th->getMessage();
        }
        if (empty($errors)) {
            $newDungeon = new Dungeon();
            //nouvel instance de l'objet issu de la classe Vehicle
            //on hydrate l'objet de toute les propriété
            $newDungeon->setId_dungeons($id_dungeons);
            $newDungeon->setMain_title($main_title);
            $newDungeon->setMain_text($main_text);
            $newDungeon->setPicture($fileName);
            //ici on hydrate avec fileName -> car c'est le fichier généré
            $newDungeon->setDescription($description);
            $newDungeon->setId_users($id_users);
            //on hydrate l'objet de toute les propriété
            $saved = $newDungeon->update();
            //$saved -> réponse de la méthode en question -> ici retourne un booléen
        }
        //$saved -> réponse de la méthode en question -> ici retourne un booléen
        if ($saved == true) {
            //permet la redirection à la liste des catégories à la modification
            header('location: /controllers/dashboard/dungeons/donjons_dash_controller.php');
            die;
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
include __DIR__ . '/../../../views/dashboard/dungeons/update_donjon.php';
include __DIR__ . '/../../../views/dashboard/templates/footer_dashboard.php';
