<main class="px-5">
    <div class="container-fluid">
        <div class="row glassmorphism">
            <div class="col-12 d-flex align-items-center">
                <div class="container-fluid p-2">
                    <div class="row">

                        <?php if (!empty($message)) { ?>
                            <div class="col-12 text-center fw-bold fst-italic orange p-3">
                                <?= $message ?? '' ?>
                            </div>
                        <?php } ?>

                        <span class="alert fst-italic">
                            <?= SessionFlash::display('message') ?>
                        </span>

                        <?php if (empty($message)) { ?>
                            <div class="col-12">
                                <h2><?= $user->pseudo ?></h2>
                                <p>Actif depuis <?= date("d-m-Y", strtotime($user->registered_at)) ?></p>
                            </div>
                            <div class="col-12">
                                <img class="img-profile my-auto align-middle pb-4 floating" src="<?= $user->avatar ?>" alt="Image de profil">
                            </div>
                            <div class="col-12 p-2">
                                <a href="/amis?id=<?= $_SESSION['id_user'] ?? '' ?>" class="btn my-btn btn-profile fw-bolder">Ma liste d'amis</a>
                            </div>
                            <div class="col-12 p-2">
                                <a href="/édition?id=<?= $_SESSION['id_user'] ?? '' ?>" class="btn my-btn btn-profile fw-bolder">Changer de mot de passe</a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>