            <!-- Modal -->
            <div class="modal fade glassmorphism" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="fs-5 m-0">Notifications</h2>
                            <button type="button" class="btn-close me-1" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="toast align-items-center text-white bg-notif border-0 mb-2" role="alert">
                                <div class="toast-body w-100 d-flex justify-content-center align-self-center">
                                    <p class="m-0 d-flex align-self-center p-2">
                                        🔔 Vous avez une demande d'amis en attente de ADMIN.
                                    </p>
                                    <div class="d-flex align-self-center p-2">
                                        <div>
                                            <a href="/édition?id=<?= $_SESSION['id_user'] ?? '' ?>" class="btn modal-btn btn-profile fw-bolder m-1">✔️</a>
                                        </div>
                                        <div>
                                            <a href="/édition?id=<?= $_SESSION['id_user'] ?? '' ?>" class="btn modal-btn btn-profile fw-bolder m-1">❌</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="mt-auto colorText pt-3">
                <div class="container-fluid">
                    <div class="row align-items-center mb-2">
                        <div class="col-12 col-sm-6 mb-0">
                            <span>&copy <a target="_blank" href="https://github.com/ThomasGuillemont">Thomas Guillemont</a> - <?= date("Y") ?></span>
                        </div>
                        <div class="col-12 col-sm-6">
                            <a href="/conditions">Conditions générales</a>
                            <span>-</span>
                            <a href="/mentions">Mentions légales</a>
                        </div>
                    </div>
                </div>
            </footer>
            </div>

            <!-- Bootstrap JS -->
            <script src="./public/bootstrap/js/bootstrap.bundle.min.js"></script>
            </body>

            </html>