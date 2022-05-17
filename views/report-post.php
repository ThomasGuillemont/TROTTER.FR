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

                    <h2>Signaler le post ?</h2>

                    <p class="fw-bold mb-0 mt-3 mb-3"><?= date("d-m-Y H:i", strtotime($post->post_at)) ?? '' ?><br><?= $post->post ?? '' ?></p>

                    <form id="deleteForm" method="POST" class="w-100" action="/signaler-actualité?id=<?= $post->id ?? '' ?>">
                        <input type="hidden" name="idPost" id="idPost" value="<?= $post->id ?? '' ?> " />
                        <input type="hidden" name="idUser" id="idUser" value="<?= $_SESSION['user']->id ?? '' ?> " />
                        <input type="text" class="text-center form-control" pattern="<?= SEARCH ?>" id="reportMessage" name="reportMessage" placeholder="Pourquoi souhaitez vous signaler le post ?">
                        <div class="fs-7 alert fst-italic" id="alertReportMessage">
                            <?= $error['reportMessage'] ?? '' ?>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn my-btn fw-bolder m-2" id="reportBtn">Signaler</button>
                            <a href="/actualités" class="btn my-btn btn-profile fw-bold m-2">Annuler</a>
                        </div>
                    </form>

                <?php } ?>

            </div>
            <div class="col-12 my-auto col-sm-6">
                <img class="img-fluid my-auto align-middle pb-3 floating" src="/public/assets/img/Illustrations/report-post.png" alt="report-postIllustration">
            </div>
        </div>
    </div>
</main>