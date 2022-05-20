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
                            <div class="col-12 col-md-6 p-2 d-flex align-self-center">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12">
                                            <?php if (!empty($banned)) { ?>
                                                <h2>Compte banni</h2>
                                            <?php } else { ?>
                                                <h2><?= $user->pseudo ?></h2>
                                                <p class="fst-italic">Actif depuis <?= date("d-m-Y", strtotime($user->registered_at)) ?></p>
                                            <?php } ?>
                                        </div>
                                        <div class="col-12">
                                            <img class="img-profile my-auto align-middle pb-4 floating" src="<?= $user->avatar ?>" alt="Image de profil">
                                        </div>

                                        <!-- <?php if (empty($banned)) { ?>
                                            <div class="col-12 p-2">
                                                <a href="/édition" class="btn my-btn btn-profile fw-bolder">Demander en amis</a>
                                            </div>
                                            <div class="col-12 p-2">
                                                <a href="/message-privée?id=<?= $user->id ?>" class="btn my-btn btn-profile fw-bolder">Envoyer un message privée</a>
                                            </div>
                                        <?php } ?> -->

                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 p-2">
                                <h2>Dernier(s) post(s)</h2>
                                <div>
                                    <?php if (empty($banned)) {
                                        if (!empty($posts)) { ?>
                                            <?php foreach ($posts as $key => $value) { ?>
                                                <div class="message m-2">
                                                    <?= $value->post ?? '' ?>
                                                </div>
                                            <?php }
                                        } else { ?>
                                            <p>Aucune activité actuellement</p>
                                            <p class="fs-2">🙊</p>
                                        <?php } ?>
                                </div>
                            </div>
                        <?php } else { ?>
                            <p><?= $banned ?? '' ?></p>
                            <p class="fs-2">🙈</p>
                    <?php }
                                } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>