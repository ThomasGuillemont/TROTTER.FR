<main class="px-5">
    <div class="container-fluid">
        <div class="row glassmorphism">
            <div class="col-12 d-flex justify-content-center align-items-center my-auto col-sm-6">
                <h2>⚠️ Suppression d'utilisateur ⚠️</h2>

                <?php foreach ($post as $key => $value) { ?>
                    <div>
                        <?= $value->post ?? '' ?>
                    </div>
                <?php } ?>

                <form id="deleteForm" method="POST" action="/contact">
                    <button type="submit" class="btn my-btn fw-bolder" id="deleteBtn">Supprimer</button>
                </form>

            </div>
            <div class="col-12 my-auto col-sm-6">
                <img class="img-fluid my-auto align-middle pb-3 floating" src="/public/assets/img/Illustrations/dashboard.png" alt="dashboardIllustration">
            </div>
        </div>
    </div>
</main>