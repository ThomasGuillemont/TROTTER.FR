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

                    <h2>Nous sommes tristes de te voir partir</h2>

                    <form id="deleteForm" method="POST" action="/supprimer-utilisateur?id=<?= $user->id ?? '' ?>">
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn my-btn fw-bolder m-2" id="deleteBtn">Supprimer mon compte</button>
                            <a href="/profil?id=<?= $_SESSION['user']->id ?? '' ?>" class="btn my-btn btn-profile fw-bold m-2">Annuler</a>
                        </div>
                    </form>

                <?php } ?>

            </div>
            <div class="col-12 my-auto col-sm-6">
                <img class="img-fluid my-auto align-middle pb-3 floating" src="/public/assets/img/Illustrations/delete-user.png" alt="Personnage avec des ballons de baudruche">
            </div>
        </div>
    </div>
</main>