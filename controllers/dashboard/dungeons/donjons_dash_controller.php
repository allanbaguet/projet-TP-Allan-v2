<?php 
require_once __DIR__ . '/../../../config/database.php';
require_once __DIR__ . '/../../../models/Dungeon.php';

try {
    //pour appelé la méthode static -> appel de la classe avec :: nom de la fonction
    $getDungeonList = Dungeon::get_all();    
} catch (\Throwable $th) {

}






include __DIR__ . '/../../../views/dashboard/templates/header_dashboard.php';
include __DIR__ . '/../../../views/dashboard/dungeons/donjons_dash.php';
include __DIR__ . '/../../../views/dashboard/templates/footer_dashboard.php';