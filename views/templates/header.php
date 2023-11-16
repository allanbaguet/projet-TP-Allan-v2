<?php
// require_once __DIR__ . '/../../config/init.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="DofusUniverse : un fan-site dédié au mmorpg Dofus, avec ses guides, ses donjons, et toutes les nouvelles actualités !">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/public/assets/css/style.css">
    <title><?= $title ?></title>
</head>

<body>
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="/controllers/accueil_controller.php">
                <img src="/public/assets/img/panoplies/aventurier/chapeau.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
            </a>
            <div class="offcanvas offcanvas-end text-bg-dark w-75" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                <div class="offcanvas-header">
                    <!-- affiche l'image de l'user dans l'offcanvas ainsi que son pseudo -->
                    <?php if (!empty($_SESSION)) : ?>
                        <a href="/controllers/user_profil_controller.php">
                            <img class="rounded" src="/public/uploads/users/<?= $getInfoUser->picture ?>" alt="image user" width="55" height="55">
                            <a class="<?= ($_SESSION) == [] ? 'd-none' : 'd-block' ?> nav-link text-white text-center text-uppercase txtNavbar fw-bold" href="/controllers/user_profil_controller.php"><?= $_SESSION['username'] ?></a>
                        </a>
                    <?php endif; ?>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <hr class="d-lg-none">
                <div class="offcanvas-body d-flex justify-content-center">
                    <ul class="navbar-nav fw-semibold " id="nav-offcanvas">
                        <li class="nav-item p-2 px-2 d-flex justify-content-center align-items-center">
                            <a class="nav-link text-white text-center text-uppercase txtNavbar" href="/controllers/studio_ankama_controller.php">Histoire d'Ankama</a>
                        </li>
                        <li class="nav-item p-2 px-2 d-flex justify-content-center align-items-center">
                            <a class="nav-link text-white text-center text-uppercase txtNavbar" href="/controllers/histoire_dofus_controller.php">Histoire de Dofus</a>
                        </li>
                        <li class="nav-item p-2 px-2 d-flex justify-content-center align-items-center">
                            <a class="nav-link text-white text-center text-uppercase txtNavbar" href="/controllers/lexique_controller.php">Lexique</a>
                        </li>
                        <li class="nav-item p-2 px-2 d-flex justify-content-center align-items-center">
                            <a class="<?= ($_SESSION) == [] ? 'd-none' : 'd-block' ?> nav-link text-white text-center text-uppercase txtNavbar" href="/controllers/encyclopedie_controller.php">Encyclopédie</a>
                            <!-- <ul class="dropdown-menu" id="encyclopedie-dropdown">
                                <li>
                                    <a class="dropdown-item" href="/controllers/page1_controller.php">Donjons</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="/controllers/page2_controller.php">Guides</a>
                                </li>
                            </ul> -->
                        </li>
                        <li class="nav-item d-flex justify-content-center align-items-center px-2">
                            <button type="button" class="btn" id="button-discord">
                                <a class="nav-link text-white text-discord" href="https://discord.gg/3tqqS55S" target="_blank">Discord <i class="bi bi-discord"></i></a>
                            </button>
                        </li>
                        <li class="nav-item d-flex align-items-center justify-content-center">
                            <!-- si $_SESSION est vide -> cache l'élément, sinon affiche le -->
                            <!-- ici si un user est connecté $_SESSION n'est pas vide donc affiche -->
                            <?php if (!empty($_SESSION)) : ?>
                                <div class="d-flex align-items-center justify-content-center">
                                    <a class="<?= ($_SESSION) == [] ? 'd-none' : 'd-block' ?> nav-link text-white text-center text-uppercase txtNavbar" href="/controllers/user_profil_controller.php">
                                        <img class="img-profil-header rounded" src="/public/uploads/users/<?= $getInfoUser->picture ?>" alt="">
                                    </a>
                                    <a class="<?= ($_SESSION) == [] ? 'd-none' : 'd-block' ?> nav-link text-white text-center text-uppercase txtNavbar" href="/controllers/user_profil_controller.php"><?= $_SESSION['username'] ?></a>
                                </div>
                            <?php endif; ?>
                        </li>
                        <li class="nav-item p-2 px-2 d-flex justify-content-center align-items-center">
                            <div class="">
                                <a class="<?= ($_SESSION) == [] ? 'd-none' : 'd-block' ?> nav-link text-white text-center text-uppercase txtNavbar" href="/controllers/deconnexion_controller.php">Déconnexion</a>
                            </div>
                        </li>
                        <a class="navbar-brand <?= ($_SESSION) == [] ? 'd-block' : 'd-none' ?>" href="/controllers/connexion_controller.php">
                            <button class="btn">
                                <i class="bi bi-person-fill text-white px-3 custom-icon"></i>
                            </button>
                        </a>
                    </ul>
                </div>
            </div>
            <div class="user d-flex">
                <ul class="navbar-nav fw-semibold" id="nav-offcanvas">

                    <!-- </ul>
                        //if (isset($role) && ($role == 1 || $role == 2)) { ?>
                    <ul class="navbar-nav fw-semibold" id="nav-offcanvas">
                        <li class="nav-item p-2 px-2">
                            <a class="nav-link text-white text-center text-uppercase txtNavbar" href="/controllers/user_profil_controller.php">Profil</a>
                        </li>
                        <li class="nav-item p-2 px-2">
                            <a class="nav-link text-white text-center text-uppercase txtNavbar" href="/controllers/deconnexion_controller.php">Déconnexion</a>
                        </li>
                    </ul>                    -->
                    <button class="navbar-toggler py-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                        <i class="bi bi-list text-white"></i>
                    </button>
            </div>
        </div>
    </nav>