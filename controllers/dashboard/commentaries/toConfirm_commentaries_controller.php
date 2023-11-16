<?php
require_once __DIR__ . '/../../../config/database.php';
require_once __DIR__ . '/../../../models/Commentarie.php';
require_once __DIR__ . '/../../../models/User.php';
require_once __DIR__ . '/../../../config/init.php';


try {
    //condition permettant de refusé l'accès à un utilisateur si il n'est pas admin en le renvoyant à l'accueil
    if ($_SESSION['role'] != 2) {
        header('location: /controllers/accueil_controller.php');
        die;
    }
    $title = 'DofusUniverse - Commentaire à confirmer dashboard';
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_SPECIAL_CHARS);
    //méthode ici permettant de récupérer toute les colonne de la table user des la BDD 
    $id_comments = intval(filter_input(INPUT_GET, 'id_comments', FILTER_SANITIZE_NUMBER_INT));
    $getCommentarieList = Commentarie::get_all();

    $getToConfirmCommentarie = Commentarie::toConfirm();
    $getConfirmedCommentarie = Commentarie::confirm($id_comments);
    $confirm = filter_input(INPUT_GET, 'confirm', FILTER_SANITIZE_NUMBER_INT);
    $delete = filter_input(INPUT_GET, 'delete', FILTER_SANITIZE_NUMBER_INT);


    if ($action === 'confirm') {
        $getConfirmedCommentarie = (int)Commentarie::confirm($id_comments);
        //(int) -> redirection de l'url en true ou false / 1 ou 0 donc entier -> 1 si modif ou 0 erreur
        //si dans le param d'URL, archive est défini, donc condition passe dans la méthode archive par $archived
        FlashMessage::set("Commentaire confirmé avec succès", SUCCESS);
        header('location: /controllers/dashboard/commentaries/toConfirm_commentaries_controller.php');
        die;
    } elseif ($action === 'delete') {
        $delete = (int)Commentarie::delete($id_comments);
        // if ($deleted) {
        //     //condition supplémentaire pour supprimer l'image si il y en as une
        //     $UserObj = User::get($id_users);
        //     //besoin du nom de photo -> picture donc l'appel à la méthode ::get ou il y est stocké
        //     @unlink(__DIR__ . '/../../../public/uploads/users/' . $UserObj->picture);
        // }
        //si dans le param d'URL, delete est défini, donc condition passe dans la méthode delete par $deleted
        FlashMessage::set("Commentaire supprimé avec succès", SUCCESS);
        header('location: /controllers/dashboard/commentaries/toConfirm_commentaries_controller.php');
        die;
    }
} catch (\Throwable $th) {
    $error = $th->getMessage();
    include __DIR__ . '/../../../views/dashboard/templates/header_dashboard.php';
    include __DIR__ . '/../../../views/templates/error.php';
    include __DIR__ . '/../../../views/dashboard/templates/footer_dashboard.php';
    die;
}



include __DIR__ . '/../../../views/dashboard/templates/header_dashboard.php';
include __DIR__ . '/../../../views/dashboard/commentaries/toConfirm_commentaries.php';
include __DIR__ . '/../../../views/dashboard/templates/footer_dashboard.php';
