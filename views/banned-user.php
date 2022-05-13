<main class="px-5">
    <div class="container-fluid">
        <div class="row glassmorphism">
            <div class="col-12 d-flex flex-column justify-content-center align-items-center my-auto col-sm-6 p-3">

                <!-- error message -->
                <?php if (!empty($message)) { ?>
                    <div class="col-12 text-center fw-bold fst-italic orange">
                        <?= $message ?? '' ?>
                    </div>
                <?php } ?>

                <?php if (empty($message)) { ?>

                    <h2>Adieu "<?= $user->pseudo ?? '' ?>" ?</h2>

                    <form id="deleteForm" method="POST" class="w-100" action="/bannir-utilisateur?id=<?= $user->id ?? '' ?>">
                        <input type="text" class="text-center form-control" pattern="<?= SEARCH ?>" id="bannedMessage" name="bannedMessage" placeholder="Pourquoi souhaitez vous bannir <?= $user->pseudo ?? '' ?> ?">
                        <div class="fs-7 alert fst-italic" id="alertbannedMessage">
                            <?= $error['bannedMessage'] ?? '' ?>
                        </div>
                        <button type="submit" class="btn my-btn fw-bolder mt-3" id="bannedBtn">Bannir</button>
                    </form>

                <?php } ?>

            </div>
            <div class="col-12 my-auto col-sm-6">
                <img class="img-fluid my-auto align-middle pb-3 floating" src="/public/assets/img/Illustrations/banned-user.png" alt="banned-userIllustration">
            </div>
        </div>
    </div>
</main>