<?php 
require_once __DIR__ . '/../../../config/database.php';
require_once __DIR__ . '/../../../models/Commentarie.php';
require_once __DIR__ . '/../../../config/init.php';

//condition permettant de refusé l'accès à un utilisateur si il n'est pas admin en le renvoyant à l'accueil
if($_SESSION['role'] != 2){
    header('location: /controllers/accueil_controller.php');
    die;
}
$id_comments = intval(filter_input(INPUT_GET, 'id_comments', FILTER_SANITIZE_NUMBER_INT));
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_SPECIAL_CHARS);
//on récupère le paramètre d'URL qui a été prélablement nettoyer pour l'utiliser ensuite dans la méthode archive
if ($action === 'archive') {
    $archived = (int)Commentarie::archive($id_comments);
    //(int) -> redirection de l'url en true ou false / 1 ou 0 donc entier -> 1 si modif ou 0 erreur
    //si dans le param d'URL, archive est défini, donc condition passe dans la méthode archive par $archived
    FlashMessage::set("Commentaire archivé avec succès" , SUCCESS);
    header('location: /controllers/dashboard/commentaries/commentaries_dash_controller.php?archive=' . $archived);
    die;
} elseif ($action === 'delete') {
    $deleted = (int)Commentarie::delete($id_comments);
    // if ($deleted) {
    //     //condition supplémentaire pour supprimer l'image si il y en as une
    //     $UserObj = User::get($id_users);
    //     //besoin du nom de photo -> picture donc l'appel à la méthode ::get ou il y est stocké
    //     @unlink(__DIR__ . '/../../../public/uploads/users/' . $UserObj->picture);
    // }
    //si dans le param d'URL, delete est défini, donc condition passe dans la méthode delete par $deleted
    FlashMessage::set("Commentaire supprimé avec succès" , SUCCESS);
    header('location: /controllers/dashboard/commentaries/commentaries_dash_controller.php?delete=' . $deleted);
    die;      
} elseif ($action === 'unarchive') {
    $unarchived = (int)Commentarie::unarchive($id_comments);
    //si dans le param d'URL, unarchive est défini, donc condition passe dans la méthode unarchive par $unarchived
    FlashMessage::set("Commentaire désarchivé avec succès" , SUCCESS);
    header('location: /controllers/dashboard/commentaries/commentaries_dash_controller.php?unarchive=' . $unarchived);
    die;
} else {
    header('location: /controllers/dashboard/commentaries/commentaries_dash_controller.php');
    //renvois par défaut sur la liste des commentaires si pas passé par les conditons ci dessus
    die;
}


