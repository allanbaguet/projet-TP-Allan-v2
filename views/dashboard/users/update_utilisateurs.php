<div class="container-fluid">
    <div class="row justify-content-center align-items-center">
        <div class="col-lg-4 col-md-6">
            <h2 class="text-uppercase text-center text-white py-3">Modification du profil</h2>
            <form id="registrationForm" method="POST" enctype="multipart/form-data">
                <fieldset>
                    <p class="fw-bold fs-5">* Champs requis</p>
                    <div class="mb-3">
                        <label for="username" class="form-label fs-5 my-3">Pseudo *</label>
                        <input type="text" class="form-control" id="username" name="username" value="<?= $userObj->username ?>" autocomplete="username" placeholder="Entrez votre pseudo" maxlength="50" pattern="<?= REGEX_PSEUDO ?>" required>
                        <p id="usernameHelp" class="form-text error d-none text-danger">Ce champ n'est pas valide</p>
                        <p class="error"> <?= $errors['username'] ?? '' ?> </p>
                    </div>
                    <div class="mb-3">
                        <label for="mail" class="form-label fs-5 my-3">Email *</label>
                        <input type="mail" class="form-control" id="mail" name="mail" value="<?= $userObj->mail ?>" autocomplete="email" placeholder="Entrez votre email" pattern="<?= REGEX_EMAIL ?>" required>
                        <p id="mailHelp" class="form-text error d-none text-danger">Cet email n'est pas valide</p>
                        <p class="error"> <?= $errors['mail'] ?? '' ?> </p>
                    </div>
                    <div class="mb-3 password-input">
                        <label for="password" class="form-label fs-5 my-3">Mot de passe *</label>
                        <div class="input-group">
                            <input type="password" class="form-control" name="password" id="password" value="" pattern="<?= REGEX_PASSWORD ?>" placeholder="Entrez votre mot de passe" required>
                            <span class="input-group-text">
                                <i class="bi bi-eye-fill toggle-password" id="togglePassword"></i>
                            </span>
                        </div>
                        <p class="text-white fst-italic">Le mot de passe doit contenir au moins 12 caractères, incluant des lettres majuscules, des lettres minuscules et des chiffres.</p>
                    </div>
                    <div class="mb-3">
                        <label for="password2" class="form-label fs-5 my-3">Confirmation du mot de passe *</label>
                        <div class="input-group">
                            <input type="password" class="form-control" name="password2" id="password2" value="" pattern="<?= REGEX_PASSWORD ?>" placeholder="Entrez votre mot de passe à nouveau" required>
                            <span class="input-group-text">
                                <i class="bi bi-eye-fill toggle-password" id="togglePassword"></i>
                            </span>
                        </div>
                        <p id="passwordCheck" class="form-text error d-none text-danger">Le mot de passe n'est pas identique</p>
                        <p class="error"><?= $errors['password'] ?? '' ?></p>
                    </div>
                    <div class="mb-3">
                        <label for="picture" class="form-label fs-5 my-3">Image de profil</label>
                        <input type="file" class="form-control" name="picture" id="picture" value="" placeholder="Votre image ici" accept="image/png, image/jpeg, image/jpg">
                        <p id="pictureHelp" class="form-text error d-none text-danger">Le champ n'est pas valide</p>
                        <p class="error"> <?= $errors['picture'] ?? '' ?> </p>
                    </div>
                    <div class="d-flex justify-content-center py-3">
                        <button id="createAccount" type="submit" class="btn">Valider</button>
                    </div>
                </fieldset>
            </form>
            <div class="py-4"></div>
        </div>
    </div>
</div>