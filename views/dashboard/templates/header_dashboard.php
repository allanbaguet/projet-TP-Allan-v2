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
            <a class="navbar-brand" href="/controllers/accueil_controller.php">
                <img src="/public/assets/img/panoplies/aventurier/chapeau.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
            </a>
            <div class="offcanvas offcanvas-end text-bg-dark w-75" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                <div class="offcanvas-header">
                    <img src="/public/assets/img/user-img.png" alt="image user" width="55" height="55">
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <hr class="d-lg-none">
                <div class="offcanvas-body d-flex justify-content-center">
                    <?php
                    if ($_SESSION['role'] == 2){ ?>
                    <ul class="navbar-nav fw-semibold" id="nav-offcanvas">
                        <li class="nav-item p-2 ">
                            <a class="nav-link text-white text-center text-uppercase txtNavbar" href="/controllers/dashboard/dashboard_controller.php">Dashboard</a>
                        </li>
                        <li class="nav-item p-2 ">
                            <a class="nav-link text-white text-center text-uppercase txtNavbar" href="/controllers/dashboard/users/utilisateurs_controller.php">Utilisateurs</a>
                        </li>
                        <li class="nav-item p-2 ">
                            <a class="nav-link text-white text-center text-uppercase txtNavbar" href="/controllers/dashboard/dungeons/donjons_dash_controller.php">Donjons</a>
                        </li>
                        <li class="nav-item p-2 ">
                            <a class="nav-link text-white text-center text-uppercase txtNavbar" href="/controllers/dashboard/guides/guides_dash_controller.php">Guides</a>
                        </li>
                        <hr class="my-2 d-lg-none">
                        <li class="nav-item p-2">
                            <a class="nav-link text-white text-center text-uppercase txtNavbar" href="/controllers/accueil_controller.php">Retour au site</a>
                        </li>
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
                        <li class="nav-item p-2 px-2">
                            <a class="<?= ($_SESSION) == [] ? 'd-none' : 'd-block' ?> nav-link text-white text-center text-uppercase txtNavbar" href="/controllers/user_profil_controller.php?id_users=<?=$_SESSION['id_users']?>">Profil</a>
                        </li>
                        <li class="nav-item p-2 px-2">
                            <a class="<?= ($_SESSION) == [] ? 'd-none' : 'd-block' ?> nav-link text-white text-center text-uppercase txtNavbar" href="/controllers/deconnexion_controller.php">Déconnexion</a>
                        </li>
                    </ul>
                    <a class="<?= ($_SESSION) == [] ? 'd-block' : 'd-none' ?> navbar-brand" href="/controllers/connexion_controller.php">
                        <button class="btn">
                            <i class="bi bi-person-fill text-white px-3 custom-icon"></i>
                        </button>
                    </a>
                    <button class="navbar-toggler py-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                        <i class="bi bi-list text-white"></i>
                    </button>
            </div>
        </div>
    </nav>