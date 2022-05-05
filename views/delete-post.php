<main class="px-5">
    <div class="container-fluid">
        <div class="row glassmorphism">
            <div class="col-12 d-flex flex-column justify-content-center align-items-center my-auto col-sm-6">

                <!-- error message -->
                <?php if (!empty($message)) { ?>
                    <div class="col-12 text-center fw-bold fst-italic orange">
                        <?= $message ?? '' ?>
                    </div>
                <?php } ?>

                <?php if (empty($message)) { ?>

                    <h2>⚠️ Suppression de post ⚠️</h2>
                    <p class="fw-bold"><?= $post->post ?? '' ?></p>
                    <p class="fw-bold"><?= date("d-m-Y H:i", strtotime($post->post_at)) ?? '' ?></p>

                    <form id="deleteForm" method="POST" action="/supprimer-actualité?id=<?= $post->id ?? '' ?>">
                        <button type="submit" class="btn my-btn fw-bolder" id="deleteBtn">Supprimer</button>
                    </form>

                <?php } ?>

            </div>
            <div class="col-12 my-auto col-sm-6">
                <img class="img-fluid my-auto align-middle pb-3 floating" src="/public/assets/img/Illustrations/dashboard.png" alt="dashboardIllustration">
            </div>
        </div>
    </div>
</main>