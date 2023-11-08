<?php 
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/Dungeon.php';

try {
    $id_dungeons = intval(filter_input(INPUT_GET, 'id_dungeons', FILTER_SANITIZE_NUMBER_INT));
    $getDungeonList = Dungeon::get($id_dungeons); 

} catch (\Throwable $th) {
    //throw $th;
}













include __DIR__ . '/../views/templates/header.php';
include __DIR__ . '/../views/page_donjon.php';
include __DIR__ . '/../views/templates/footer.php';