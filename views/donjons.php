<a href="/encyclopédie">
    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-arrow-left-square-fill arrow-left m-4" viewBox="0 0 16 16">
        <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1z" />
    </svg>
</a>
<h1 class="text-uppercase text-center text-white p-2">donjons</h1>
<div class="container-fluid">
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10 p-3 rounded fs-5 my-4" id="bgColorText">
            <p>Un donjon, est un lieu clos dans lequel une équipe de personnages devra affronter plusieurs groupes de monstres dans plusieurs salles.
                Dans chaque donjon se trouve un Boss généralement accompagné d'autres monstres
            </p>
            <p>
                Les Boss de donjons permettent beaucoup de choses, ils peuvent vous permettre d’acquérir de l’expérience,
                de drop des ressources pour craft différentes panoplies.
            </p>
        </div>
        <div class="row">
            <div class="col-1"></div>
            <div class="col-10 mt-5 my-5">
                <h2>Recherchez un donjon</h2>
                <form action="" id="searchForm">
                    <input type="search" name="search" id="search" class="input-home" value="<?= $search ?? '' ?>" placeholder="Rechercher...">
                    <button type="submit" class="btn-research">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                        </svg>
                    </button>
                </form>

            </div>
        </div>
    </div>
</div>


<div class="container-fluid">
    <div class="row py-4">
        <?php
        foreach ($getDungeonList as $dungeonList) { ?>
            <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100" id="bg-color-body-card">
                <h5 class="card-title p-3 text-center fs-4" id="title-card-white"><?=$dungeonList->main_title?></h5>
                <a href="/donjon?id_dungeons=<?=$dungeonList->id_dungeons?>">
                    <img src="/public/assets/img/donjons/image-donjon.jpg" class="card-img-top img-fluid desktop-img" alt="donjons">
                </a>
                <div class="card-body p-0">
                    <p class="card-text p-3">Trouver ici le guide complet pour le donjon :
                        <span class="fw-bold"><?=$dungeonList->main_title?></span>
                    </p>
                    <div class="d-flex justify-content-center card-footer p-2" id="bg-color-top-bottom-card">
                        <a href="/donjon?id_dungeons=<?=$dungeonList->id_dungeons?>" class="btn" id="button-green">C'est parti !</a>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
        </div>
</div>


        <!-- <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100" id="bg-color-body-card">
                <h5 class="card-title p-3 text-center fs-4" id="title-card-white">Grange du tournesol affamé</h5>
                <a href="/controllers/guides_controller.php">
                    <img src="/public/assets/img/donjons/champs/tournesol-affame-card.png" class="card-img-top img-fluid desktop-img" alt="histoire-de-dofus">
                </a>
                <div class="card-body p-0">
                    <p class="card-text p-3">Trouver ici le guide complet pour le donjon :
                        <span class="fw-bold">Grange du tournesol affamé</span>
                    </p>
                    <div class="d-flex justify-content-center card-footer p-2" id="bg-color-top-bottom-card">
                        <a href="/controllers/guides_controller.php" class="btn" id="button-green">C'est parti !</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100" id="bg-color-body-card">
                <h5 class="card-title p-3 text-center fs-4" id="title-card-white">Cour du bouftou royal</h5>
                <a href="/controllers/guides_controller.php">
                    <img src="/public/assets/img/donjons/bouftou/bouftou-royal.png" class="card-img-top img-fluid desktop-img" alt="histoire-de-dofus">
                </a>
                <div class="card-body p-0">
                    <p class="card-text p-3">Trouver ici le guide complet pour le donjon :
                        <span class="fw-bold">Cour du bouftou royal</span>
                    </p>
                    <div class="d-flex justify-content-center card-footer p-2" id="bg-color-top-bottom-card">
                        <a href="/controllers/guides_controller.php" class="btn" id="button-green">C'est parti !</a>
                    </div>
                </div>
            </div>
        </div> -->