<?php
require_once __DIR__ . '/../models/User.php';

//appel de la méthode get_all afin d'avoir les infos user pour la page profil
$getInfoUser = User::get_all();

session_start();

// // Vérifiez si les informations de l'utilisateur sont présentes dans la session
// if (isset($_SESSION['username'], $_SESSION['id_users'], $_SESSION['role'])) {
//     // authentification du user, et récupération des infos nécessaires
//     $username = $_SESSION['username'];
//     $id_users = $_SESSION['id_users'];
//     $role = $_SESSION['role'];

// } else {
//     // Rediriger vers la page d'accueil
//     header("Location: accueil_controller.php");
//     die; 
// }