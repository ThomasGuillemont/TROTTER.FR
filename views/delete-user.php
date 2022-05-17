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

                    <h2>Nous sommes triste de te voir partir</h2>

                    <form id="deleteForm" method="POST" action="/supprimer-utilisateur?id=<?= $user->id ?? '' ?>">
                        <button type="submit" class="btn my-btn fw-bolder mt-3" id="deleteBtn">Supprimer mon compte</button>
                    </form>

                <?php } ?>

            </div>
            <div class="col-12 my-auto col-sm-6">
                <img class="img-fluid my-auto align-middle pb-3 floating" src="/public/assets/img/Illustrations/delete-user.png" alt="delete-userIllustration">
            </div>
        </div>
    </div>
</main>