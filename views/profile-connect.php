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
                                <!-- Button trigger modal -->
                                <button type="button" class="btn my-btn btn-profile fw-bolder position-relative mb-3" data-bs-toggle="modal" data-bs-target="#modal">
                                    <span class="position-absolute top-50 start-50 translate-middle badge bg-notif">
                                        Voir les notifications
                                    </span>
                                </button>
                            </div>
                            <div class="col-12">
                                <img class="img-profile my-auto align-middle pb-4 floating" src="<?= $user->avatar ?>" alt="Image de profil">
                            </div>

                            <?php if ($user->id_roles == 1) { ?>
                                <div class="col-12 p-2">
                                    <a href="/administration" class="btn my-btn btn-profile fw-bolder">Administration</a>
                                </div>
                            <?php } ?>

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
<!-- Modal -->
<div class="modal fade glassmorphism" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="fs-5 m-0">Notifications</h2>
                <button type="button" class="btn-close me-1" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="toast align-items-center text-white bg-notif border-0 mb-2" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex justify-content-center">
                        <div class="toast-body w-100">
                            <div type="button" data-bs-toggle="collapse" data-bs-target="#collapse" aria-expanded="false" aria-controls="collapse">
                                🔔 Vous avez une demande d'amis en attente de ADMIN.
                            </div>
                            <div class="collapse" id="collapse">
                                <div class="card card-body">
                                    <div>
                                        <a href="/édition?id=<?= $_SESSION['id_user'] ?? '' ?>" class="btn modal-btn btn-profile fw-bolder">✔️ Accepter</a>
                                        <a href="/édition?id=<?= $_SESSION['id_user'] ?? '' ?>" class="btn modal-btn btn-profile fw-bolder">❌ Refuser</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="toast align-items-center text-white bg-notif border-0 mb-2" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex justify-content-center">
                        <div class="toast-body w-100">
                            <div type="button" data-bs-toggle="collapse" data-bs-target="#collapse" aria-expanded="false" aria-controls="collapse">
                                🔔 Vous avez une demande d'amis en attente de ADMIN.
                            </div>
                            <div class="collapse" id="collapse">
                                <div class="card card-body">
                                    <div>
                                        <a href="/édition?id=<?= $_SESSION['id_user'] ?? '' ?>" class="btn modal-btn btn-profile fw-bolder">✔️ Accepter</a>
                                        <a href="/édition?id=<?= $_SESSION['id_user'] ?? '' ?>" class="btn modal-btn btn-profile fw-bolder">❌ Refuser</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="toast align-items-center text-white bg-notif border-0 mb-2" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex justify-content-center">
                        <div class="toast-body w-100">
                            <div type="button" data-bs-toggle="collapse" data-bs-target="#collapse" aria-expanded="false" aria-controls="collapse">
                                🔔 Vous avez une demande d'amis en attente de ADMIN.
                            </div>
                            <div class="collapse" id="collapse">
                                <div class="card card-body">
                                    <div>
                                        <a href="/édition?id=<?= $_SESSION['id_user'] ?? '' ?>" class="btn modal-btn btn-profile fw-bolder">✔️ Accepter</a>
                                        <a href="/édition?id=<?= $_SESSION['id_user'] ?? '' ?>" class="btn modal-btn btn-profile fw-bolder">❌ Refuser</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="toast align-items-center text-white bg-notif border-0 mb-2" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex justify-content-center">
                        <div class="toast-body w-100">
                            <div type="button" data-bs-toggle="collapse" data-bs-target="#collapse" aria-expanded="false" aria-controls="collapse">
                                🔔 Vous avez une demande d'amis en attente de ADMIN.
                            </div>
                            <div class="collapse" id="collapse">
                                <div class="card card-body">
                                    <div>
                                        <a href="/édition?id=<?= $_SESSION['id_user'] ?? '' ?>" class="btn modal-btn btn-profile fw-bolder">✔️ Accepter</a>
                                        <a href="/édition?id=<?= $_SESSION['id_user'] ?? '' ?>" class="btn modal-btn btn-profile fw-bolder">❌ Refuser</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="toast align-items-center text-white bg-notif border-0 mb-2" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex justify-content-center">
                        <div class="toast-body w-100">
                            <div type="button" data-bs-toggle="collapse" data-bs-target="#collapse" aria-expanded="false" aria-controls="collapse">
                                🔔 Vous avez une demande d'amis en attente de ADMIN.
                            </div>
                            <div class="collapse" id="collapse">
                                <div class="card card-body">
                                    <div>
                                        <a href="/édition?id=<?= $_SESSION['id_user'] ?? '' ?>" class="btn modal-btn btn-profile fw-bolder">✔️ Accepter</a>
                                        <a href="/édition?id=<?= $_SESSION['id_user'] ?? '' ?>" class="btn modal-btn btn-profile fw-bolder">❌ Refuser</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>