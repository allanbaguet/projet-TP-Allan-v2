<a href="/encyclopédie">
    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-arrow-left-square-fill arrow-left m-4" viewBox="0 0 16 16">
        <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1z" />
    </svg>
</a>
<h1 class="text-uppercase text-center text-white p-2">Guides</h1>
<div class="container-fluid">
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10 p-3 rounded fs-5 my-4 bgColorText">
            <p>Tous les guides pour débuter ou re-débuter sur DOFUS et Rétro sont disponibles ici. Guides des métiers, guides pour toutes les classes, astuces kamas, vous trouverez forcément votre bonheur.
            </p>
            <p>
            Ils sont mis à jour régulièrement et vous accompagneront tout au long de votre aventure. Pour les accompagner, retrouvez également les dernières mises à jours et actualités sur la page d'accueil.
            </p>
        </div>
    </div>
</div>


<div class="container-fluid">
    <div class="row py-4">
        <?php
        foreach ($getGuideList as $guideList) { ?>
            <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100 bg-color-body-card">
                <h5 class="card-title p-3 text-center fs-4 title-card-white"><?=$guideList->main_title?></h5>
                <a href="/guide?id_guides=<?=$guideList->id_guides?>">
                    <img src="/public/assets/img/encyclopedie-img.jpg" class="card-img-top img-fluid desktop-img" alt="donjons">
                </a>
                <div class="card-body p-0">
                    <p class="card-text p-3">Tous les trucs et astuces regroupés dans ce 
                        <span class="fw-bold"><?=$guideList->main_title?></span>
                    </p>
                    <div class="d-flex justify-content-center card-footer p-2 bg-color-top-bottom-card">
                        <a href="/guide?id_guides=<?=$guideList->id_guides?>" class="btn button-green">C'est parti !</a>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
        </div>
</div>
