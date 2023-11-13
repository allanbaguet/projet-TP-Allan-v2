<?php 
require_once __DIR__ . '/../../../config/database.php';
require_once __DIR__ . '/../../../models/Guide.php';
require_once __DIR__ . '/../../../config/init.php';

try {
    $title = 'DofusUniverse - Dashboard guides';
    //pour appelé la méthode static -> appel de la classe avec :: nom de la fonction
    //méthode ici permettant de récupérer toute les colonne de la table guide des la BDD 
    $getGuideList = Guide::get_all();    
} catch (\Throwable $th) {
    $error = $th->getMessage();
    include __DIR__ . '/../../../views/dashboard/templates/header_dashboard.php';
    include __DIR__ . '/../../../views/templates/error.php';
    include __DIR__ . '/../../../views/dashboard/templates/footer_dashboard.php';
    die;
}





include __DIR__ . '/../../../views/dashboard/templates/header_dashboard.php';
include __DIR__ . '/../../../views/dashboard/guides/guides_dash.php';
include __DIR__ . '/../../../views/dashboard/templates/footer_dashboard.php';