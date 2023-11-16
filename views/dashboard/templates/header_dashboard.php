<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="DofusUniverse : un fan-site dédié au mmorpg Dofus, avec ses guides, ses donjons, et toutes les nouvelles actualités !">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/public/assets/css/style.css">
    <title><?= $title ?></title>
</head>

<body>
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="/accueil">
                <img src="/public/assets/img/panoplies/aventurier/chapeau.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
            </a>
            <div class="offcanvas offcanvas-end text-bg-dark w-75" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                <div class="offcanvas-header">
                    <!-- affiche l'image de l'user dans l'offcanvas ainsi que son pseudo -->
                    <?php if (!empty($_SESSION)) : ?>
                        <a href="/profil/(\d+)">
                            <img class="rounded" src="/public/uploads/users/<?= $getInfoUser->picture ?>" alt="image user" width="55" height="55">
                            <a class="<?= ($_SESSION) == [] ? 'd-none' : 'd-block' ?> nav-link text-white text-center text-uppercase txtNavbar fw-bold" href="/profil"><?= $_SESSION['username'] ?></a>
                        </a>
                    <?php endif; ?>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <hr class="d-lg-none">
                <div class="offcanvas-body d-flex justify-content-center">
                    <?php
                    if ($_SESSION['role'] == 2) { ?>
                        <ul class="navbar-nav fw-semibold" id="nav-offcanvas">
                            <li class="nav-item p-2 d-flex justify-content-center align-items-center">
                                <a class="nav-link text-white text-center text-uppercase txtNavbar" href="/controllers/dashboard/dashboard_controller.php">Dashboard</a>
                            </li>
                            <li class="nav-item p-2 d-flex justify-content-center align-items-center">
                                <a class="nav-link text-white text-center text-uppercase txtNavbar" href="/controllers/dashboard/users/utilisateurs_controller.php">Utilisateurs</a>
                            </li>
                            <li class="nav-item p-2 d-flex justify-content-center align-items-center">
                                <a class="nav-link text-white text-center text-uppercase txtNavbar" href="/controllers/dashboard/dungeons/donjons_dash_controller.php">Donjons</a>
                            </li>
                            <li class="nav-item p-2 d-flex justify-content-center align-items-center">
                                <a class="nav-link text-white text-center text-uppercase txtNavbar" href="/controllers/dashboard/guides/guides_dash_controller.php">Guides</a>
                            </li>
                            <li class="nav-item p-2 d-flex justify-content-center align-items-center">
                                <a class="nav-link text-white text-center text-uppercase txtNavbar" href="/controllers/dashboard/commentaries/commentaries_dash_controller.php">Commentaires</a>
                            </li>
                            <hr class="my-2 d-lg-none">
                            <li class="nav-item p-2 d-flex justify-content-center align-items-center">
                                <a class="nav-link text-white text-center text-uppercase txtNavbar" href="/accueil">Retour au site</a>
                            </li>
                            <li class="nav-item d-flex justify-content-center align-items-center">
                            <?php if (!empty($_SESSION)) : ?>
                                <div class="d-flex align-items-center justify-content-center">
                                    <a class="<?= ($_SESSION) == [] ? 'd-none' : 'd-block' ?> nav-link text-white text-center text-uppercase txtNavbar" href="/profil">
                                        <img class="img-profil-header rounded" src="/public/uploads/users/<?= $getInfoUser->picture ?>" alt="">
                                    </a>
                                    <a class="<?= ($_SESSION) == [] ? 'd-none' : 'd-block' ?> nav-link text-white text-center text-uppercase txtNavbar" href="/profil"><?= $_SESSION['username'] ?></a>
                                </div>
                            <?php endif; ?>                            </li>
                            <li class="nav-item p-2 px-2 d-flex justify-content-center align-items-center">
                                <a class="<?= ($_SESSION) == [] ? 'd-none' : 'd-block' ?> nav-link text-white text-center text-uppercase txtNavbar" href="/controllers/deconnexion_controller.php">Déconnexion</a>
                            </li>
                            <a class="<?= ($_SESSION) == [] ? 'd-block' : 'd-none' ?> navbar-brand" href="/connexion">
                                <button class="btn">
                                    <i class="bi bi-person-fill text-white px-3 custom-icon"></i>
                                </button>
                            </a>
                            <!-- <li class="nav-item d-flex justify-content-center">
                            <button type="button" class="btn" id="button-discord">
                                <a class="nav-link text-white" href="#">Discord <i class="bi bi-discord"></i></a>
                            </button>
                        </li> -->
                        </ul>
                    <?php } ?>
                </div>
            </div>
            <div class="user d-flex">
                <ul class="navbar-nav fw-semibold" id="nav-offcanvas">
                    <button class="navbar-toggler py-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                        <i class="bi bi-list text-white"></i>
                    </button>
            </div>
        </div>
    </nav>