    <div class="container-fluid">
        <a href="/controllers/dashboard/guides/guides_dash_controller.php">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-arrow-left-square-fill arrow-left m-4" viewBox="0 0 16 16">
                <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1z" />
            </svg>
        </a>
        <h1 class="text-center">Création de page guide</h1>
        <div class="row my-5">
            <div class="col-2"></div>
            <div class="col-8">
                <form method="POST" enctype="multipart/form-data" id="myForm">
                    <!-- titre du guide -->
                    <div class="mb-3 row">
                        <label for="main_title" class="col-sm-4 col-form-label fw-semibold fs-5">Titre principal</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control titleDj" id="main_title" name="main_title">
                            <div id="main_titleHelp" class="form-text error d-none text-danger">Le champ n'est pas valide</div>
                            <p class="error"> <?= $errors['main_title'] ?? '' ?> </p>
                        </div>
                    </div>
                    <!-- j'ai retiré le titre dans la div à cloner car il n'y a qu'un titre par page -->
                    <!-- il n'y a que les screens et textarea à cloner -->
                    <!-- <div id="toClone"> -->

                    <!-- texte principal du guide -->
                    <div class="mb-3 row">
                        <label for="main_text" class="col-sm-4 col-form-label fw-semibold fs-5">Texte principal</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control titleDj" id="main_text" name="main_text">
                            <div id="main_textHelp" class="form-text error d-none text-danger">Le champ n'est pas valide</div>
                            <p class="error"> <?= $errors['main_text'] ?? '' ?> </p>
                        </div>
                    </div>
                    <!-- image du guide -->
                    <div class="mb-3 row my-5">
                        <label for="picture" class="col-sm-4 col-form-label fw-semibold fs-5">Image</label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control picture" name="picture" id="picture">
                            <div id="pictureHelp" class="form-text error d-none text-danger">Le champ n'est pas valide</div>
                            <p class="error"> <?= $errors['picture'] ?? '' ?> </p>
                        </div>
                    </div>
                    <!-- descriptif guide -->
                    <div class="mb-3 row my-5">
                        <label for="description" class="col-sm-4 col-form-label fw-semibold fs-5">Description</label>
                        <div class="col-sm-8">
                            <textarea class="form-control description" name="description" id="description"></textarea>
                            <div id="descriptionHelp" class="form-text error d-none text-danger">Le champ n'est pas valide</div>
                            <p class="error"> <?= $errors['description'] ?? '' ?> </p>
                        </div>
                    </div>
                    <!-- </div> -->
                    <!-- les div cloné s'ajouterons dans cette div ci dessous vite -->
                    <!-- <div id="clones"></div> -->
                    <div class="d-flex justify-content-evenly py-4">
                        <!-- <div id="clonePreset" class="btn btn-lg btn-primary mb-3"> + </div> -->

                        <button type="submit" class="btn" id="button-green">Création</button>

                        <!-- <button id="removeClone" type="button" class="btn btn-danger btn-lg mb-3"> - </button> -->
                    </div>
                </form>
                <!-- <div id="datas"></div> -->
            </div>
        </div>

    </div>