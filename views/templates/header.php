<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="DofusUniverse : un fan-site dédié au mmorpg Dofus, avec ses guides, ses donjons, et toutes les nouvelles actualités !">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/public/assets/img/favicon_removebg.png"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/public/assets/css/style.css">
    <title><?= $title ?></title>
</head>

<body>
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="/accueil">
                <img src="/public/assets/img/logo_desktop_removebg.png" alt="Logo" id="logo-desktop" class="d-inline-block align-text-top">
            </a>
            <div class="offcanvas offcanvas-end text-bg-dark w-75" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                <div class="offcanvas-header">
                    <!-- affiche l'image de l'user dans l'offcanvas ainsi que son pseudo -->
                    <?php if (!empty($_SESSION['id_users'])) : ?>
                        <a href="/profil">
                            <img class="rounded" src="/public/uploads/users/<?= $getInfoUser->picture ?>" alt="image user" width="55" height="55">
                            <a class="<?= (isset($_SESSION['id_users']) == [] ? 'd-none' : 'd-block') ?> nav-link text-white text-center text-uppercase txtNavbar fw-bold" href="/profil"><?= $_SESSION['username'] ?></a>
                        </a>
                    <?php endif; ?>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <hr class="d-lg-none">
                <div class="offcanvas-body d-flex justify-content-center">
                    <ul class="navbar-nav fw-semibold nav-offcanvas">
                        <li class="nav-item p-2 px-2 d-flex justify-content-center align-items-center">
                            <a class="nav-link text-white text-center text-uppercase txtNavbar" href="/studio-ankama">Histoire d'Ankama</a>
                        </li>
                        <li class="nav-item p-2 px-2 d-flex justify-content-center align-items-center">
                            <a class="nav-link text-white text-center text-uppercase txtNavbar" href="/histoire-dofus">Histoire de Dofus</a>
                        </li>
                        <li class="nav-item p-2 px-2 d-flex justify-content-center align-items-center">
                            <a class="nav-link text-white text-center text-uppercase txtNavbar" href="/lexique">Lexique</a>
                        </li>
                        <li class="nav-item p-2 px-2 d-flex justify-content-center align-items-center">
                            <a class="<?= (isset($_SESSION['id_users']) == [] ? 'd-none' : 'd-block') ?> nav-link text-white text-center text-uppercase txtNavbar" href="/encyclopédie">Encyclopédie</a>
                        </li>
                        <li class="nav-item d-flex justify-content-center align-items-center px-2">
                            <button type="button" class="btn" id="button-discord">
                                <a class="nav-link text-white text-discord" href="https://discord.gg/3tqqS55S" target="_blank">Discord <i class="bi bi-discord"></i></a>
                            </button>
                        </li>
                        <li class="nav-item d-flex align-items-center justify-content-center">
                            <!-- si $_SESSION est vide -> cache l'élément, sinon affiche le -->
                            <!-- ici si un user est connecté $_SESSION n'est pas vide donc affiche -->
                            <?php if (!empty($_SESSION['id_users'])) : ?>
                                <div class="d-flex align-items-center justify-content-center">
                                    <a class="<?= (isset($_SESSION['id_users']) == [] ? 'd-none' : 'd-block') ?> nav-link text-white text-center text-uppercase txtNavbar" href="/profil">
                                        <img class="img-profil-header rounded" src="/public/uploads/users/<?= $getInfoUser->picture ?>" alt="">
                                    </a>
                                    <a class="<?= (isset($_SESSION['id_users']) == [] ? 'd-none' : 'd-block') ?> nav-link text-white text-center text-uppercase txtNavbar" href="/profil"><?= $_SESSION['username'] ?></a>
                                </div>
                            <?php endif; ?>
                        </li>
                        <li class="nav-item p-2 px-2 d-flex justify-content-center align-items-center">
                            <div class="">
                                <a class="<?= (isset($_SESSION['id_users']) == [] ? 'd-none' : 'd-block') ?> nav-link text-white text-center text-uppercase txtNavbar" href="/controllers/deconnexion_controller.php">Déconnexion</a>
                            </div>
                        </li>
                        <a class="navbar-brand <?= (isset($_SESSION['id_users']) == [] ? 'd-block' : 'd-none') ?>" href="/connexion">
                            <button class="btn">
                                <i class="bi bi-person-fill text-white px-3 custom-icon"></i>
                            </button>
                        </a>
                    </ul>
                </div>
            </div>
            <div class="user d-flex">
                <ul class="navbar-nav fw-semibold nav-offcanvas">
                    <button class="navbar-toggler py-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight">
                        <i class="bi bi-list text-white"></i>
                    </button>
                </ul>
            </div>
        </div>
    </nav>