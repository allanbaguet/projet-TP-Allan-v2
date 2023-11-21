<div class="container-fluid">
    <div class="row pt-5 justify-content-center align-items-center">
        <div class="col-lg-6 col-md-8 col-sm-10">
            <div class="card h-100 bg-color-body-card">
                <h5 class="card-title p-3 text-center fs-4 text-white bg-color-top-bottom-card">Profil</h5>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-center">
                        <img src="/public/uploads/users/<?= $getInfoUser->picture ?>" class="img-user img-fluid" alt="user_image">
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="card-body p-3">
                            <h5 class="card-title text-center pb-3 title-card-white"><?= $_SESSION["username"] ?></h5>
                            <p>Inscrit le : <span class="fw-bold"><?= date('d-m-Y', strtotime($getInfoUser->added_at)) ?></span></p>
                            <p class="card-text">Vous pouvez modifier vos informations ci-dessous</p>
                            <div class="d-flex flex-column">
                                <a href="/profil-mis-à-jour?id_users=<?= $_SESSION["id_users"] ?>" class="btn mb-2 button-green">Modifier vos informations</a>
                                <?php
                                if ($_SESSION['role'] == 2) { ?>
                                    <a href="/controllers/dashboard/dashboard_controller.php" class="btn button-green">Accès au dashboard</a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row py-5 justify-content-center align-items-center">
        <div class="mb-4 col-lg-6 col-md-8 col-sm-10">
            <div class="card h-100 bg-color-body-card">
                <h5 class="card-title p-3 text-center fs-4 text-white bg-color-top-bottom-card">Vos derniers commentaires</h5>
                <div class="card-body p-0">
                    <h5 class="card-title p-3 title-card-white">Donjons</h5>
                    <?php
                    foreach ($getCommentarieDungeon as $commentarieDungeon) { ?>
                        <p class="card-text p-3"><?= $commentarieDungeon->text ?></p>
                        <?php }
                    ?>
                </div>
                <div class="card-body p-0">
                    <h5 class="card-title p-3 title-card-white">Guides</h5>
                    <?php
                    foreach ($getCommentarieGuide as $commentarieGuide) { ?>
                        <p class="card-text p-3"><?= $commentarieGuide->text ?></p>
                    <?php }
                    ?>
                    <p class="card-text p-3">Trop bien ce guide</p>
                </div>
                <div class="d-flex justify-content-center card-footer p-3 bg-color-top-bottom-card">
                    <a href="#" class="btn button-green">Voir</a>
                </div>
            </div>
        </div>
    </div>
</div>