<?php 
require_once __DIR__ . '/../../../config/database.php';
require_once __DIR__ . '/../../../models/User.php';

try {
    //pour appelé la méthode static -> appel de la classe avec :: nom de la fonction
    $getUsersList = User::get_all();    
    //variable qui appel la classe et sa méthode -> récupére les éléments archivé
    $getUserArchived = User::get_archive();
    // permet de filtrer les données en paramètre d'url 'archive', 'delete', 'unarchive'
    $archive= filter_input(INPUT_GET, 'archive', FILTER_SANITIZE_NUMBER_INT);
    $delete = filter_input(INPUT_GET, 'delete', FILTER_SANITIZE_NUMBER_INT);
    $unarchive = filter_input(INPUT_GET, 'unarchive', FILTER_SANITIZE_NUMBER_INT);
} catch (\Throwable $th) {

}



include __DIR__ . '/../../../views/dashboard/templates/header_dashboard.php';
include __DIR__ . '/../../../views/dashboard/users/utilisateurs.php';
include __DIR__ . '/../../../views/dashboard/templates/footer_dashboard.php';