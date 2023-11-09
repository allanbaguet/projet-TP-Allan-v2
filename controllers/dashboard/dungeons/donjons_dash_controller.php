<?php 
require_once __DIR__ . '/../../../config/database.php';
require_once __DIR__ . '/../../../models/Dungeon.php';

try {
    //pour appelé la méthode static -> appel de la classe avec :: nom de la fonction
    //méthode ici permettant de récupérer toute les colonne de la table dungeon des la BDD 
    $getDungeonList = Dungeon::get_all();    
} catch (\Throwable $th) {
    $error = $th->getMessage();
    include __DIR__ . '/../../../views/dashboard/templates/header_dashboard.php';
    include __DIR__ . '/../../../views/templates/error.php';
    include __DIR__ . '/../../../views/dashboard/templates/footer_dashboard.php';
    die;
}






include __DIR__ . '/../../../views/dashboard/templates/header_dashboard.php';
include __DIR__ . '/../../../views/dashboard/dungeons/donjons_dash.php';
include __DIR__ . '/../../../views/dashboard/templates/footer_dashboard.php';