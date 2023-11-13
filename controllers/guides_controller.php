<?php 
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/Guide.php';
require_once __DIR__ . '/../config/init.php';

try {
    // $id_dungeons = intval(filter_input(INPUT_GET, 'id_dungeons', FILTER_SANITIZE_NUMBER_INT));
    // $getDungeonID = Dungeon::get($id_dungeon); 
    $title = 'DofusUniverse - Guides';
    $getGuideList = Guide::get_all();
    // $page = intval(filter_input(INPUT_GET, 'page', FILTER_SANITIZE_NUMBER_INT));
    //définit une valeur par défaut (1) si $page est vide 
    // if (empty($page)){
    //     $page = 1;
    // }
    // $getDungeonList = Dungeon::get_all_Dungeon(search: $search, page: $page); 
    
    // $totalDungeon = Dungeon::get_all_Dungeon(search: $search, countAll: true); 
    // $nbDungeon = count($totalDungeon);
    // $nbPages = ceil($nbDungeon / NB_PER_PAGE);
    //ceil permet d'arrondir au supérieur

} catch (\Throwable $th) {
    $error = $th->getMessage();
    include __DIR__ . '/../views/templates/header.php';
    include __DIR__ . '/../views/templates/error.php';
    include __DIR__ . '/../views/templates/footer.php';
    die;
}

include __DIR__ . '/../views/templates/header.php';
include __DIR__ . '/../views/guides.php';
include __DIR__ . '/../views/templates/footer.php';