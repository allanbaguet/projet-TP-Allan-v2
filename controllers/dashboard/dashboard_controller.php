<?php 
require_once __DIR__ . '/../../config/init.php';

$title = 'DofusUniverse - Dashboard';

//condition permettant de refusé l'accès à un utilisateur si il n'est pas admin en le renvoyant à l'accueil
if($_SESSION['role'] != 2){
    header('location: /controllers/accueil_controller.php');
    die;
}

include __DIR__ . '/../../views/dashboard/templates/header_dashboard.php';
include __DIR__ . '/../../views/dashboard/dashboard.php';
include __DIR__ . '/../../views/dashboard/templates/footer_dashboard.php';