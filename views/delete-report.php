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
                    <p class="fw-bold mb-0 mt-3 mb-3 my-message"><?= date("d-m-Y H:i", strtotime($reported->reported_at)) ?? '' ?><br><?= $reported->message ?? '' ?></p>

                    <form id="deleteForm" method="POST" action="/supprimer-signalement?id=<?= $reported->id ?? '' ?>">
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn my-btn fw-bolder m-2" id="deleteBtn">Supprimer</button>
                            <a href="/administration-signalements" class="btn my-btn btn-profile fw-bold m-2">Annuler</a>
                        </div>
                    </form>

                <?php } ?>

            </div>
            <div class="col-12 my-auto col-sm-6">
                <img class="img-fluid my-auto align-middle pb-3 floating" src="/public/assets/img/Illustrations/delete-report.png" alt="Personnage sur un vélo">
            </div>
        </div>
    </div>
</main>