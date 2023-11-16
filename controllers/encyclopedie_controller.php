<?php 
require_once __DIR__ . '/../config/init.php';

if ($_SESSION['role'] != 1 && $_SESSION['role'] != 2) {
    header('location: /controllers/accueil_controller.php');
    die;
}

$title = 'DofusUniverse - Encyclopédie';

include __DIR__ . '/../views/templates/header.php';
include __DIR__ . '/../views/encyclopedie.php';
include __DIR__ . '/../views/templates/footer.php';