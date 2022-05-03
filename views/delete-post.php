<main class="px-5">
    <div class="container-fluid">
        <div class="row glassmorphism">
            <div class="col-12 d-flex align-items-center col-sm-6">
                <div class="container-fluid p-2">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center">
                            <?php foreach ($post as $key => $value) { ?>
                                <div>
                                    <?= $value->post ?? '' ?>
                                </div>
                            <?php } ?>

                            <form id="deleteForm" method="POST" action="/contact">
                                <button type="submit" class="btn my-btn fw-bolder" id="deleteBtn">Envoyer</button>
                            </form>

                        </div>
                    </div>
                </div>
                <div class="col-12 my-auto col-sm-6">
                    <img class="img-fluid my-auto align-middle pb-3 floating" src="/public/assets/img/Illustrations/contact.png" alt="deleteIllustration">
                </div>
            </div>
        </div>
</main>