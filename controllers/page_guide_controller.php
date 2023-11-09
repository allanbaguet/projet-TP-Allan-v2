<?php 
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/Guide.php';

try {
    $id_guides = intval(filter_input(INPUT_GET, 'id_guides', FILTER_SANITIZE_NUMBER_INT));
    $getGuideList = Guide::get($id_guides); 

} catch (\Throwable $th) {
    $error = $th->getMessage();
    include __DIR__ . '/../views/templates/header.php';
    include __DIR__ . '/../views/templates/error.php';
    include __DIR__ . '/../views/templates/footer.php';
    die;
}


include __DIR__ . '/../views/templates/header.php';
include __DIR__ . '/../views/page_guide.php';
include __DIR__ . '/../views/templates/footer.php';