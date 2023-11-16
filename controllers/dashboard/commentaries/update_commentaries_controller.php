<?php
require_once __DIR__ . '/../../../config/init.php';

//condition permettant de refusé l'accès à un utilisateur si il n'est pas admin en le renvoyant à l'accueil
if ($_SESSION['role'] != 2) {
    header('location: /accueil');
    die;
}