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

                    <h2>Supprimer le signalement ?</h2>
                    <p class="fw-bold mb-0 mt-3 mb-3"><?= date("d-m-Y H:i", strtotime($reported->reported_at)) ?? '' ?><br><?= $reported->message ?? '' ?></p>

                    <form id="deleteForm" method="POST" action="/supprimer-signalement?id=<?= $reported->id ?? '' ?>">
                        <button type="submit" class="btn my-btn fw-bolder" id="deleteBtn">Supprimer</button>
                    </form>

                <?php } ?>

            </div>
            <div class="col-12 my-auto col-sm-6">
                <img class="img-fluid my-auto align-middle pb-3 floating" src="/public/assets/img/Illustrations/delete-report.png" alt="delete-reportIllustration">
            </div>
        </div>
    </div>
</main>