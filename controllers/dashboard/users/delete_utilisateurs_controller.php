<?php 
require_once __DIR__ . '/../../../config/database.php';
require_once __DIR__ . '/../../../models/User.php';

$id_users = intval(filter_input(INPUT_GET, 'id_users', FILTER_SANITIZE_NUMBER_INT));
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_SPECIAL_CHARS);
//on récupère le paramètre d'URL qui a été prélablement nettoyer pour l'utiliser ensuite dans la méthode archive
if ($action === 'archive') {
    $archived = (int)User::archive($id_users);
    //(int) -> redirection de l'url en true ou false / 1 ou 0 donc entier -> 1 si modif ou 0 erreur
    //si dans le param d'URL, archive est défini, donc condition passe dans la méthode archive par $archived
    header('location: /controllers/dashboard/users/utilisateurs_controller.php?archive=' . $archived);
    die;
} elseif ($action === 'delete') {
    $deleted = (int)User::delete($id_users);
    // if ($deleted) {
    //     //condition supplémentaire pour supprimer l'image si il y en as une
    //     $UserObj = User::get($id_users);
    //     //besoin du nom de photo -> picture donc l'appel à la méthode ::get ou il y est stocké
    //     @unlink(__DIR__ . '/../../../public/uploads/users/' . $UserObj->picture);
    // }
    //si dans le param d'URL, delete est défini, donc condition passe dans la méthode delete par $deleted
    header('location: /controllers/dashboard/users/utilisateurs_controller.php?delete=' . $deleted);
    die;      
} elseif ($action === 'unarchive') {
    $unarchived = (int)User::unarchive($id_users);
    //si dans le param d'URL, unarchive est défini, donc condition passe dans la méthode unarchive par $unarchived
    header('location: /controllers/dashboard/users/utilisateurs_controller.php?unarchive=' . $unarchived);
    die;
} else {
    header('location: /controllers/dashboard/users/utilisateurs_controller.php');
    //renvois par défaut sur la liste des véhicules si pas passé par les conditons ci dessus
    die;
}