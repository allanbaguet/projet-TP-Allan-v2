<div class="container-fluid">
    <a href="/controllers/donjons_dash_controller.php">
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-arrow-left-square-fill arrow-left m-4" viewBox="0 0 16 16">
            <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1z" />
        </svg>
    </a>
    <h1 class="text-center">Création de page donjon</h1>
    <div class="row my-5">
    <div class="col-2"></div>
        <div class="col-8">
            <form action="" method="POST" id="myForm">

                <div class="mb-3 row">
                    <label for="titleDj" class="col-sm-4 col-form-label fw-semibold fs-5">Titre (élément fixe)</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control titleDj" id="titleDj" name="titleDj">
                        <!-- <small id="titleDjSmall" class="d-none text-danger">Cette valeur est
                                incorrecte!</small> -->
                    </div>
                </div>
                <!-- j'ai retiré le titre dans la div à cloner car il n'y a qu'un titre par page -->
                <!-- il n'y a que les screens et textarea à cloner -->
                <div id="toClone">

                    <div class="mb-3 row my-5">
                        <label for="screenDj" class="col-sm-4 col-form-label fw-semibold fs-5">Screen</label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control email" name="screenDj" id="screenDj">
                            <!-- <small id="screenDjSmall" class="d-none text-danger">Cette valeur est incorrecte!</small> -->
                        </div>
                    </div>

                    <div class="mb-3 row my-5">
                        <label for="descriptDj" class="col-sm-4 col-form-label fw-semibold fs-5">Descriptif</label>
                        <div class="col-sm-8">
                            <textarea class="form-control descriptDj" name="descriptDj" id="descriptDj"></textarea>
                            <!-- <small id="descriptDjSmall" class="d-none text-danger">Cette valeur est
                                    incorrecte!</small> -->
                        </div>
                    </div>

                </div>
                <!-- les div cloné s'ajouterons dans cette div ci dessous vite -->
                <div id="clones"></div>
                <div class="d-flex justify-content-evenly py-4">
                    <div id="clonePreset" class="btn btn-lg btn-primary mb-3"> + </div>

                    <button type="submit" class="btn" id="button-green">Création</button>

                    <button id="removeClone" type="button" class="btn btn-danger btn-lg mb-3"> - </button>

                </div>

            </form>
            <!-- <div id="datas"></div> -->
        </div>
    </div>
</div>