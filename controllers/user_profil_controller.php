<?php 
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/User.php';

try {
    //pour appelé la méthode static -> appel de la classe avec :: nom de la fonction
    $getUsersList = User::get_all();    
    //variable qui appel la classe et sa méthode -> récupére les éléments archivé
} catch (\Throwable $th) {

}





include __DIR__ . '/../views/templates/header.php';
include __DIR__ . '/../views/user_profil.php';
include __DIR__ . '/../views/templates/footer.php';