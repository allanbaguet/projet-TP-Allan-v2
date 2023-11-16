<?php 
require_once __DIR__ . '/../config/init.php';


// session_start();
session_destroy(); // Détruit la session
header("Location: /accueil"); 
die;
// exit();


include __DIR__ . '/../views/templates/header.php';
include __DIR__ . '/../views/accueil.php';
include __DIR__ . '/../views/templates/footer.php';