<main class="px-5">
    <div class="container-fluid">
        <div class="row glassmorphism">
            <div class="col-12 d-flex align-items-center col-sm-6">
                <div class="container-fluid p-2">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center">
                            <form id="recoveryForm" method="POST" action="/récupération">
                                <span class="alert fst-italic">
                                    <?= SessionFlash::display('message') ?>
                                </span>
                                <div class="mb-3">
                                    <label for="email" class="form-label fw-bolder formTitle">Email</label>
                                    <input type="email" required placeholder="email@blabla.com" autocomplete="email" class="form-control text-center" id="email" name="email" value="<?= $email ?? '' ?>">
                                    <div class="fs-7 alert fst-italic" id="alertEmail">
                                        <?= $error['email'] ?? '' ?>
                                    </div>
                                </div>
                                <button type="submit" class="btn my-btn fw-bolder" id="recoveryBtn">Récupération</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 my-auto col-sm-6">
                <img class="img-fluid my-auto align-middle pb-3 floating" src="/public/assets/img/Illustrations/recovery.png" alt="recoveryIllustration">
            </div>
        </div>
    </div>
</main>