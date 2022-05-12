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

                        <?php if (empty($message)) { ?>
                            <span class="alert fst-italic">
                                <?= SessionFlash::display('message') ?>
                            </span>
                            <div class="col-12 col-md-6 p-2 d-flex align-self-center">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12">
                                            <h2><?= $user->pseudo ?></h2>
                                            <p class="fst-italic">Actif depuis <?= date("d-m-Y", strtotime($user->registered_at)) ?></p>
                                        </div>
                                        <div class="col-12">
                                            <img class="img-profile my-auto align-middle pb-4 floating" src="<?= $user->avatar ?>" alt="Image de profil">
                                        </div>
                                        <div class="col-12 p-2">
                                            <a href="/édition?id=<?= $_SESSION['user']->id ?? '' ?>" class="btn my-btn btn-profile fw-bolder">Modifier mot de passe</a>
                                        </div>
                                        <div class="col-12 p-2">
                                            <a href="/supprimer-utilisateur?id=<?= $_SESSION['user']->id ?? '' ?>" class="btn my-btn btn-profile fw-bolder">Supprimer mon compte</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 p-2">
                                <h2>Dernier(s) post(s)</h2>
                                <div>
                                    <?php if (!empty($posts)) { ?>
                                        <?php foreach ($posts as $key => $value) { ?>
                                            <p class="my-message">
                                                <?= $value->post ?? '' ?>
                                                <a class="fst-italic small ps-2 fw-bold" href="/modifier-actualité?id=<?= $value->id ?? '' ?>">Modifier</a>
                                                <a class="fst-italic small ps-2 fw-bold" href="supprimer-actualité?id=<?= $value->id ?? '' ?>">Supprimer</a>
                                            </p>
                                        <?php }
                                    } else { ?>
                                        <p>Aucune activité actuellement</p>
                                        <p class="fs-2">🙊</p>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>