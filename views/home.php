<main class="px-5">
    <div class="container-fluid">
        <div class="row glassmorphism">
            <div class="col-12 d-flex align-items-center my-auto col-sm-6">
                <div class="container-fluid p-2">
                    <div class="row">
                        <div class="col-12">
                            <!-- JS MSG -->
                            <h2 id="randomHello"></h2>
                            <p class="fs-6">
                                Bienvenue sur <span class="fw-bold">Trotter</span>,<br>
                                Le réseau social à destination des
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 my-auto col-sm-6">
                <img class="img-fluid my-auto align-middle pb-3 floating" src="/public/assets/img/Illustrations/home.png" alt="accueilIllustration">
            </div>
        </div>
    </div>
</main>

<!-- Modal year -->
<div class="modal fade glassmorphism show" style="display: block;" id="valideYear" tabindex="-1" aria-labelledby="valideYearLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="toast align-items-center text-white bg-notif border-0" role="valideYear">
                    <div class="toast-body w-100 d-flex flex-column justify-content-center align-self-center">
                        <p class="m-0 d-flex align-self-center fs-6 p-2">
                            Vous devez avoir 15 ans ou plus pour rejoindre Trotter.
                        </p>
                        <div class="d-flex align-self-center">
                            <div>
                                <button class="btn modal-btn btn-profile fw-bolder m-1" id="closeModalYear">Continuer</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JS -->
<script src="/public/assets/js/hello.js"></script>
<script src="/public/assets/js/modalYearClose.js"></script>