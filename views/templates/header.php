<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/public/assets/css/style.css">
    <title>DofusUniverse</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="/controllers/accueil_controller.php">
                <img src="/public/assets/img/panoplies/aventurier/chapeau.png" alt="Logo" width="30" height="24"
                    class="d-inline-block align-text-top">
            </a>
            <div class="user d-flex">
                <a class="navbar-brand" href="/controllers/connexion_controller.php">
                    <button class="btn">
                        <i class="bi bi-person-fill text-white px-3 custom-icon"></i>
                    </button>
                </a>
                <button class="navbar-toggler py-2" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                    <i class="bi bi-list text-white"></i>
                </button>
            </div>
            <div class="offcanvas offcanvas-end text-bg-dark w-75" tabindex="-1" id="offcanvasRight"
                aria-labelledby="offcanvasRightLabel">
                <div class="offcanvas-header">
                    <img src="/public/assets/img/user-img.png" alt="image user" width="55" height="55">
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <hr class="d-lg-none">
                <div class="offcanvas-body d-flex justify-content-center">
                    <ul class="navbar-nav fs-5 fw-semibold" id="nav-offcanvas">
                        <li class="nav-item p-2 px-5">
                            <a class="nav-link text-white text-center text-uppercase txtNavbar" href="/controllers/studio_ankama_controller.php">Histoire d'Ankama</a>
                        </li>
                        <li class="nav-item p-2 px-5">
                            <a class="nav-link text-white text-center text-uppercase txtNavbar" href="/controllers/histoire_dofus_controller.php">Histoire de Dofus</a>
                        </li>
                        <li class="nav-item p-2 px-5">
                            <a class="nav-link text-white text-center text-uppercase txtNavbar" href="/controllers/lexique_controller.php">Lexique</a>
                        </li>
                        <li class="nav-item d-flex justify-content-center px-5">
                            <button type="button" class="btn" id="button-discord">
                                <a class="nav-link text-white fs-5" href="https://discord.gg/3tqqS55S" target="_blank">Discord <i class="bi bi-discord"></i></a>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>