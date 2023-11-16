<?php
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../config/FlashMessage.php';


session_start();

//si la session n'est pas vide, donc user connecté, récupére son ID et utilisation de la méthode get
//permet d'appeler les infos de l'user partout ou init est appelé
if (!empty($_SESSION)) {
    $id_users = $_SESSION['id_users'];
    $getInfoUser = User::get($id_users);
}




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