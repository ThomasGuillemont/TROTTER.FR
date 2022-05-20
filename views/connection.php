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
                            <span class="alert fst-italic pb-3 pt-3">
                                <?= SessionFlash::display('message') ?>
                            </span>
                            <div class="col-12 d-flex justify-content-center">
                                <form id="connectionForm" method="POST" action="/connexion">
                                    <div class="mb-3">
                                        <label for="email" class="form-label fw-bolder formTitle">Email</label>
                                        <input type="email" required placeholder="email@blabla.com" autocomplete="email" class="form-control text-center" id="email" name="email" value="<?= $email ?? '' ?>">
                                        <div class="fs-7 alert fst-italic" id="alertEmail">
                                            <?= $error['email'] ?? '' ?>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label fw-bolder formTitle">Mot de
                                            passe</label>
                                        <input type="password" required pattern="<?= PASSWORD ?>" placeholder="mot de passe" autocomplete="current-password" class="form-control text-center" id="password" name="password" value="<?= $password ?? '' ?>">
                                        <div class="fs-7 alert fst-italic" id="alertPassword">
                                            <?= $error['password'] ?? '' ?>
                                        </div>
                                    </div>
                                    <div class="mb-3 fw-bold">
                                        <a href="/recuperation"><small>Mot de passe oublié</small></a>
                                    </div>
                                    <button type="submit" class="btn my-btn fw-bolder" id="connectionBtn">Connexion</button>
                                </form>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="col-12 my-auto col-sm-6">
                <img class="img-fluid my-auto align-middle pb-3 floating" src="/public/assets/img/Illustrations/connection.png" alt="connexionIllustration">
            </div>
        </div>
    </div>
</main>
<!-- JS confetti -->
<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.5.1/dist/confetti.browser.min.js"></script>
<!-- JS -->
<script src="/public/assets/js/confettiConnection.js"></script>