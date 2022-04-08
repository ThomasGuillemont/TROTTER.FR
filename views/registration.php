<main class="px-5">
    <div class="container-fluid">
        <div class="row glassmorphism">
            <div class="col-12 d-flex align-items-center col-sm-6">
                <div class="container-fluid p-2">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center">
                            <form id="registrationForm" method="POST" action="/inscription">
                                <div class="mb-3">
                                    <label for="pseudo" class="form-label fw-bolder formTitle">Pseudo</label>
                                    <input required pattern="<?=PSEUDO?>" placeholder="pseudo" autocomplete="username" type="text" class="form-control text-center" id="pseudo" name="pseudo" value="<?= $pseudo ?? '' ?>">
                                    <div class="fs-7 alert fst-italic" id="alertPseudo">
                                        <?= $error['pseudo'] ?? ''?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label fw-bolder formTitle">Email</label>
                                    <input required placeholder="email@blabla.com" autocomplete="email" type="email" class="form-control text-center" id="email" name="email" value="<?= $email ?? '' ?>">
                                    <div class="fs-7 alert fst-italic" id="alertEmail">
                                        <?= $error['email'] ?? ''?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label fw-bolder formTitle">Mot de
                                        passe</label>
                                    <input required pattern="<?=PASSWORD?>" placeholder="mot de passe" autocomplete="new-password" type="password" class="form-control text-center" id="password" name="password" value="<?= $password ?? '' ?>">
                                    <div class="fs-7 alert fst-italic" id="alertPassword">
                                        <?= $error['password'] ?? ''?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="passwordConfirm"
                                        class="form-label fw-bolder formTitle">Confirmation mot de passe</label>
                                    <input required pattern="<?=PASSWORD?>" placeholder="confirmez mot de passe" autocomplete="new-password" type="password" class="form-control text-center" id="passwordConfirm" name="passwordConfirm" value="<?= $passwordConfirm ?? '' ?>">
                                    <div class="fs-7 alert fst-italic" id="alertPasswordConfirm">
                                        <?= $error['passwordConfirm'] ?? ''?>
                                    </div>
                                </div>
                                <div class="form-check d-flex justify-content-center">
                                    <input required type="checkbox" value="1" class="form-check-input m-1" id="checkbox"
                                        <?= $checkboxCheked ?? ''?> name="checkbox">
                                    <label class="form-check-label formTitle" for="checkbox">J'accepte les
                                        <a href="/conditions">conditions générales</a>.</label>
                                </div>
                                <div class="fs-7 alert mb-3 fst-italic" id="alertCheckBox">
                                    <?= $error['checkbox'] ?? ''?>
                                </div>
                                <div class="mb-3 fw-bold">
                                    <a href="/connexion"><small>J'ai déja un compte</small></a>
                                </div>
                                <button type="submit" id="registrationBtn"
                                    class="btn my-btn fw-bolder" onclick="confetti()">S'inscrire</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 my-auto col-sm-6">
                <img class="img-fluid my-auto align-middle pb-3 floating"
                    src="/public/assets/img/Illustrations/registration.png" alt="inscriptionIllustration">
            </div>
        </div>
    </div>
</main>
<!-- JS confetti -->
<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.5.1/dist/confetti.browser.min.js"></script>
<!-- JS -->
<script src="/public/assets/js/confettiRegistration.js"></script>