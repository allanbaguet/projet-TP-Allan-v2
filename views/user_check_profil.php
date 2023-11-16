<div class="container-fluid">
    <div class="row pt-5 justify-content-center align-items-center">
        <div class="col-lg-6 col-md-8 col-sm-10">
            <div class="card h-100" id="bg-color-body-card">
                <h5 class="card-title p-3 text-center fs-4 text-white" id="bg-color-top-bottom-card">Profil</h5>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-center">
                        <img src="/public/uploads/users/<?=$getInfoUser->picture?>" class="img-user img-fluid" alt="user_image">
                        <!-- <div class="mb-3">
                            <label for="picture" class="form-label fs-5 my-3">
                                <div class="btn" id="button-green">Modifier
                                    <input type="file" class="form-control" name="picture" id="picture" value="" placeholder="Votre image ici" accept="image/png, image/jpeg, image/jpg" hidden>
                                </div>
                            </label>
                            <p id="pictureHelp" class="form-text error d-none text-danger">Le champ n'est pas valide</p>
                            <p class="error"> <?= $errors['picture'] ?? '' ?> </p>
                        </div> -->
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="card-body p-3">
                            <h5 class="card-title text-center pb-3" id="title-card-white"><?= $getUserId->username?></h5>
                            <p>Inscrit le : <span class="fw-bold"><?= date('d-m-Y', strtotime($getUserId->added_at)) ?></span></p>
                            <p class="card-text"></p>
                            <div class="d-flex flex-column">
                            
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
            <div class="card h-100" id="bg-color-body-card">
                <h5 class="card-title p-3 text-center fs-4 text-white" id="bg-color-top-bottom-card">Derniers commentaires de l'utilisateur</h5>
                <div class="card-body p-0">
                    <h5 class="card-title p-3" id="title-card-white">Donjons</h5>
                    <p class="card-text p-3">Trop bien ce guide !</p>
                </div>
                <div class="d-flex justify-content-center card-footer p-3" id="bg-color-top-bottom-card">
                    <a href="/controllers/donjons_controller.php" class="btn" id="button-green">Voir</a>
                </div>
            </div>
        </div>
    </div>
</div>