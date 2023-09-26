    <div class="container-fluid">
        <a href="/controllers/accueil_controller.php">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-arrow-left-square-fill arrow-left m-4" viewBox="0 0 16 16">
                <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1z" />
            </svg>
        </a>
        <h1 class="text-center ">Dashboard</h1>
        <div class="row my-5">
            <div class="col-xl-3 col-md-6 mb-4 my-5">
                <a class="link-underline link-underline-opacity-0" href="/controllers/utilisateurs_controller.php">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <p class="text-xs font-weight-bold text-black text-uppercase mb-1"> Utilisateurs</p>
                                </div>
                                <div class="col-auto">
                                    <i class="bi bi-people-fill"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-md-6 mb-4 my-5">
                <a class="link-underline link-underline-opacity-0" href="/controllers/donjons_dash_controller.php">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <p class="text-xs font-weight-bold text-black text-uppercase mb-1"> Donjons</p>
                                </div>
                                <div class="col-auto">
                                    <i class="bi bi-bug-fill"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-md-6 mb-4 my-5">
                <a class="link-underline link-underline-opacity-0" href="/controllers/guides_dash_controller.php">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <p class="text-xs font-weight-bold text-black text-uppercase mb-1"> Guides</p>
                                </div>
                                <div class="col-auto">
                                    <i class="bi bi-book-half"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>