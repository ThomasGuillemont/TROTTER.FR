<main class="px-5">
    <div class="container-fluid">
        <div class="row glassmorphism">
            <div class="col-12 d-flex align-items-center">
                <div class="container-fluid p-2">

                    <!-- error message -->
                    <?php if (!empty($message)) { ?>
                        <div class="col-12 text-center fw-bold fst-italic orange">
                            <?= $message ?? '' ?>
                        </div>
                    <?php } ?>

                    <?php if (empty($message)) { ?>
                        <form id="registrationForm" class="row" method="POST" action="/inscription">
                            <div class="col-12">

                                <input type="hidden" name="ip" value="<?= $_SERVER['REMOTE_ADDR'] ?> " />

                                <div class="mb-3">
                                    <div class="d-flex justify-content-evenly flex-wrap">
                                        <div class="form-check m-2 d-flex flex-column">
                                            <label class="form-check-label" for="avatar1">
                                                <input class="form-check-input" type="radio" name="flexRadio" id="avatar1" value="1" <?= ($checked == 1) ? 'checked' : ''; ?>>
                                                <img class="img-registration my-auto align-middle" src="/public/assets/img/avatars/avatar1.png" alt="Avatar homme blanc blond">
                                            </label>
                                        </div>
                                        <div class="form-check m-2 d-flex flex-column">
                                            <label class="form-check-label" for="avatar2">
                                                <input class="form-check-input" type="radio" name="flexRadio" id="avatar2" value="2" <?= ($checked == 2) ? 'checked' : ''; ?>>
                                                <img class="img-registration my-auto align-middle" src="/public/assets/img/avatars/avatar2.png" alt="Avatar homme blanc brun avec petite barbe">
                                            </label>
                                        </div>
                                        <div class="form-check m-2 d-flex flex-column">
                                            <label class="form-check-label" for="avatar3">
                                                <input class="form-check-input" type="radio" name="flexRadio" id="avatar3" value="3" <?= ($checked == 3) ? 'checked' : ''; ?>>
                                                <img class="img-registration my-auto align-middle" src="/public/assets/img/avatars/avatar3.png" alt="Avatar homme indien avec turban et petite barbe">
                                            </label>
                                        </div>
                                        <div class="form-check m-2 d-flex flex-column">
                                            <label class="form-check-label" for="avatar4">
                                                <input class="form-check-input" type="radio" name="flexRadio" id="avatar4" value="4" <?= ($checked == 4) ? 'checked' : ''; ?>>
                                                <img class="img-registration my-auto align-middle" src="/public/assets/img/avatars/avatar4.png" alt="Avatar homme blanc cheveux grisonnants">
                                            </label>
                                        </div>
                                        <div class="form-check m-2 d-flex flex-column">
                                            <label class="form-check-label" for="avatar5">
                                                <input class="form-check-input" type="radio" name="flexRadio" id="avatar5" value="5" <?= ($checked == 5) ? 'checked' : ''; ?>>
                                                <img class="img-registration my-auto align-middle" src="/public/assets/img/avatars/avatar5.png" alt="Avatar femme blanche blonde">
                                            </label>
                                        </div>
                                        <div class="form-check m-2 d-flex flex-column">
                                            <label class="form-check-label" for="avatar6">
                                                <input class="form-check-input" type="radio" name="flexRadio" id="avatar6" value="6" <?= ($checked == 6)  ? 'checked' : ''; ?>>
                                                <img class="img-registration my-auto align-middle" src="/public/assets/img/avatars/avatar6.png" alt="Avatar femme blanche brune avec lunettes">
                                            </label>
                                        </div>
                                        <div class="form-check m-2 d-flex flex-column">
                                            <label class="form-check-label" for="avatar7">
                                                <input class="form-check-input" type="radio" name="flexRadio" id="avatar7" value="7" <?= ($checked == 7) ? 'checked' : ''; ?>>
                                                <img class="img-registration my-auto align-middle" src="/public/assets/img/avatars/avatar7.png" alt="Avatar femme noir avec cheveux crépus">
                                            </label>
                                        </div>
                                        <div class="form-check m-2 d-flex flex-column">
                                            <label class="form-check-label" for="avatar8">
                                                <input class="form-check-input" type="radio" name="flexRadio" id="avatar8" value="8" <?= ($checked == 8) ? 'checked' : ''; ?>>
                                                <img class="img-registration my-auto align-middle" src="/public/assets/img/avatars/avatar8.png" alt="Femme blanche cheveux grissonants">
                                            </label>
                                        </div>
                                    </div>
                                    <div class="fs-7 alert fst-italic" id="alertAvatar">
                                        <div class="error fst-italic"><?= $error['avatar'] ?? '' ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 d-flex flex-column justify-content-center ps-3 pe-3">
                                <div class="mb-3">
                                    <label for="pseudo" class="form-label fw-bolder formTitle">Pseudo</label>
                                    <input required pattern="<?= PSEUDO ?>" placeholder="pseudo" autocomplete="username" type="text" class="form-control text-center" id="pseudo" name="pseudo" value="<?= $pseudo ?? '' ?>">
                                    <div class="fs-7 alert fst-italic" id="alertPseudo">
                                        <?= $error['pseudo'] ?? '' ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label fw-bolder formTitle">Email</label>
                                    <input required placeholder="email@blabla.com" autocomplete="email" type="email" class="form-control text-center" id="email" name="email" value="<?= $email ?? '' ?>">
                                    <div class="fs-7 alert fst-italic" id="alertEmail">
                                        <?= $error['email'] ?? '' ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 d-flex flex-column justify-content-center ps-3 pe-3">
                                <div class="mb-3">
                                    <label for="password" class="form-label fw-bolder formTitle">Mot de
                                        passe</label>
                                    <input required pattern="<?= PASSWORD ?>" placeholder="mot de passe" autocomplete="new-password" type="password" class="form-control text-center" id="password" name="password" value="<?= $password ?? '' ?>">
                                    <div class="fs-7 alert fst-italic" id="alertPassword">
                                        <?= $error['password'] ?? '' ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="passwordConfirm" class="form-label fw-bolder formTitle">Confirmation mot de passe</label>
                                    <input required pattern="<?= PASSWORD ?>" placeholder="confirmez mot de passe" autocomplete="new-password" type="password" class="form-control text-center" id="passwordConfirm" name="passwordConfirm" value="<?= $passwordConfirm ?? '' ?>">
                                    <div class="fs-7 alert fst-italic" id="alertPasswordConfirm">
                                        <?= $error['passwordConfirm'] ?? '' ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <div class="form-check d-flex justify-content-center">
                                        <input required type="checkbox" value="1" class="form-check-input m-1" id="checkbox" <?= $checkboxCheked ?? '' ?> name="checkbox">
                                        <label class="form-check-label formTitle" for="checkbox">J'accepte les
                                            <a class="fw-bold" href="/conditions">conditions générales</a>.</label>
                                    </div>
                                    <div class="fs-7 alert fst-italic" id="alertCheckBox">
                                        <?= $error['checkbox'] ?? '' ?>
                                    </div>
                                </div>
                                <button type="submit" id="registrationBtn" class="btn my-btn fw-bolder" onclick="confetti()">S'inscrire</button>
                            </div>
                        </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- JS confetti -->
<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.5.1/dist/confetti.browser.min.js"></script>
<!-- JS -->
<script src="/public/assets/js/confettiRegistration.js"></script>