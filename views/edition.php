<main class="px-5">
    <div class="container-fluid">
        <div class="row glassmorphism">
            <div class="col-12 d-flex align-items-center col-sm-6">

                <div class="container-fluid p-2">
                    <div class="row">

                        <!-- error message -->
                        <?php if (!empty($message)) { ?>
                            <div class="col-12 text-center fw-bold fst-italic orange">
                                <?= $message ?? '' ?>
                            </div>
                        <?php } ?>

                        <?php if (empty($message)) { ?>
                            <div class="col-12 mt-4 d-flex justify-content-center">
                                <form id="editionForm" method="POST" action="/edition?id=<?= $_SESSION['user']->id ?? '' ?>">
                                    <div class="mb-3">
                                        <label for="password" class="form-label fw-bolder formTitle">Ancien
                                            mot de passe</label>
                                        <input required pattern="<?= PASSWORD ?>" placeholder="mot de passe" autocomplete="current-password" type="password" class="form-control text-center" id="password" name="password" value="<?= $password ?? '' ?>">
                                        <div class="fs-7 alert fst-italic" id="alertPassword">
                                            <?= $error['password'] ?? '' ?>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="newPassword" class="form-label fw-bolder formTitle">Nouveau
                                            mot de passe</label>
                                        <input required pattern="<?= PASSWORD ?>" placeholder="nouveau mot de passe" autocomplete="new-password" type="password" class="form-control text-center" id="newPassword" name="newPassword" value="<?= $newPassword ?? '' ?>">
                                        <div class="fs-7 alert fst-italic" id="alertPasswordNew">
                                            <?= $error['newPassword'] ?? '' ?>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="newPasswordConfirm" class="form-label fw-bolder formTitle">Confirmation nouveau mot de passe</label>
                                        <input required pattern="<?= PASSWORD ?>" placeholder="confirmez mot de passe" autocomplete="new-password" type="password" class="form-control text-center" id="newPasswordConfirm" name="newPasswordConfirm" value="<?= $newPasswordConfirm ?? '' ?>">
                                        <div class="fs-7 alert fst-italic" id="alertPasswordConfirm">
                                            <?= $error['newPasswordConfirm'] ?? '' ?>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn my-btn fw-bolder m-2" id="editionBtn">Valider</button>
                                        <a href="/profil?id=<?= $_SESSION['user']->id ?? '' ?>" class="btn my-btn btn-profile fw-bold m-2">Annuler</a>
                                    </div>
                                </form>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="col-12 my-auto col-sm-6">
                <img class="img-fluid my-auto align-middle pb-3 floating" src="/public/assets/img/Illustrations/edition.png" alt="Personnage avec une gomme géante">
            </div>
        </div>
</main>