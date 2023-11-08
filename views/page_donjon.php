<div class="container-fluid">
    <a href="/controllers/donjons_controller.php">
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-arrow-left-square-fill arrow-left m-4" viewBox="0 0 16 16">
            <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1z" />
        </svg>
    </a>
    <h1 class="text-center mb-4"><?= $getDungeonList->main_title ?></h1>
    <p class="text-center fs-5"><?= $getDungeonList->main_text ?></p>
</div>
<div class="container-fluid">
    <div class="row pt-3 justify-content-center align-items-center">
        <div class="col-lg-6 col-md-8 col-sm-10">
            <div class="mb-5">
                <img class="img-fluid" src="/public/uploads/dungeons/<?= $getDungeonList->picture ?>" alt="image donjon">
            </div>
            <p class="fs-5 pb-3">Vous devez vous rendre à cette position afin de pouvoir rentrer dans ce donjon et avoir la clé requise</p>
            <p class="fs-5 pb-5"><?= $getDungeonList->description ?></p>
        </div>
        
    </div>
</div>
<img class="img-fluid" src="/public/assets/img/bg3.jpg">