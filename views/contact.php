<main class="px-5">
    <div class="container-fluid">
        <div class="row glassmorphism">
            <div class="col-12 d-flex align-items-center col-sm-6">
                <div class="container-fluid p-2">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center">
                            <form id="contactForm" method="POST" action="/contact">
                                <div class="mb-3">
                                    <label for="email" class="form-label fw-bolder formTitle">Email</label>
                                    <input required placeholder="email@blabla.com" autocomplete="email" type="email" class="form-control text-center" id="email" name="email" value="<?= $email ?? '' ?>">
                                    <div class="fs-7 alert" id="alertEmail">
                                        <?= $error['email'] ?? '' ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="message" class="form-label fw-bolder formTitle">Votre
                                        message</label>
                                    <textarea required pattern="<?= TEXTAREA ?>" placeholder="Saisissez votre message" class="form-control" id="message" name="message" rows="5"><?= $message ?? '' ?></textarea>
                                    <div class="fs-7 alert" id="alertMessage">
                                        <?= $error['message'] ?? '' ?>
                                    </div>
                                </div>
                                <button type="submit" class="btn my-btn fw-bolder" id="contactBtn">Envoyer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 my-auto col-sm-6">
                <img class="img-fluid my-auto align-middle pb-3 floating" src="/public/assets/img/Illustrations/contact.png" alt="Main avec stylo et carnet">
            </div>
        </div>
    </div>
</main>