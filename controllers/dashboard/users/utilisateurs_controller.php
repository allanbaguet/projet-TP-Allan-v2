<?php
require_once __DIR__ . '/../../../config/database.php';
require_once __DIR__ . '/../../../models/User.php';
require_once __DIR__ . '/../../../config/init.php';

$modalDelete = '/public/assets/js/delete_user_modal.js';

try {
    //condition permettant de refusé l'accès à un utilisateur si il n'est pas admin en le renvoyant à l'accueil
    if ($_SESSION['role'] != 2) {
        header('location: /accueil');
        die;
    }
    $title = 'DofusUniverse - Dashboard utilisateurs';
    //pour appelé la méthode static -> appel de la classe avec :: nom de la fonction
    //méthode ici permettant de récupérer toute les colonne de la table user des la BDD 
    $getUsersList = User::get_all();
    //variable qui appel la classe et sa méthode -> récupére les éléments archivé
    $getUserArchived = User::get_archive();
    // permet de filtrer les données en paramètre d'url 'archive', 'delete', 'unarchive'
    $archive = filter_input(INPUT_GET, 'archive', FILTER_SANITIZE_NUMBER_INT);
    $delete = filter_input(INPUT_GET, 'delete', FILTER_SANITIZE_NUMBER_INT);
    $unarchive = filter_input(INPUT_GET, 'unarchive', FILTER_SANITIZE_NUMBER_INT);
} catch (\Throwable $th) {
    $error = $th->getMessage();
    include __DIR__ . '/../../../views/dashboard/templates/header_dashboard.php';
    include __DIR__ . '/../../../views/templates/error.php';
    include __DIR__ . '/../../../views/dashboard/templates/footer_dashboard.php';
    die;
}



include __DIR__ . '/../../../views/dashboard/templates/header_dashboard.php';
include __DIR__ . '/../../../views/dashboard/users/utilisateurs.php';
include __DIR__ . '/../../../views/dashboard/templates/footer_dashboard.php';
