<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <h2 class="text-uppercase text-center text-white my-4">Connexion</h2>
            <form id="connexionForm" method="POST">
                <fieldset>
                    <div class="mb-3">
                        <label for="username" class="form-label fs-5 my-3">Pseudo</label>
                        <input type="text" class="form-control" id="username" name="username" aria-describedby="pseudoHelp" pattern="<?= REGEX_PSEUDO ?>" autofocus required>
                        <div id="usernameSignIn" class="form-text"></div>
                        <p class="error"> <?= $errors['username'] ?? '' ?> </p>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label fs-5 my-3">Mot de passe</label>
                        <input type="password" class="form-control" name="password" id="password" pattern="<?= REGEX_PASSWORD ?>" required>
                        <p class="error"> <?= $errors['password'] ?? '' ?> </p>
                        <?php if (isset($errors['signIn'])) : ?>
                            <p class="error alert alert-dismissible alert-danger fw-bold"> <?= $errors['signIn'] ?? '' ?> </p>
                        <?php endif; ?>
                    </div>
                    <div class="d-flex justify-content-center py-4">
                        <button id="createAccount" type="submit" class="btn">Connexion</button>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>

<hr class="hr-2">

<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <h2 class="py-3 text-white text-center my-4">Inscription</h2>
            <div id="bgRegister" class="py-3 rounded">
                <p id="textRegister" class="d-flex text-center p-2 fs-5">Tu n’as pas encore de compte ?
                    Inscris-toi pour profiter de toutes les fonctionnalités du site !</p>
                <div class="d-flex justify-content-center">
                    <a href="/inscription">
                        <button id="connectAccount" class="btn">Créer un compte</button>
                    </a>
                </div>
            </div>
            <div class="py-4"></div>
        </div>
    </div>
</div>