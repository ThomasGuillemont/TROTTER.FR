<main class="px-5">
    <div class="container-fluid">
        <div class="row glassmorphism">
            <div class="col-12">
                <nav>
                    <div class="d-flex justify-content-center m-3">
                        <a href="/administration-utilisateurs" class="btn my-btn btn-profile fw-bold m-2 d-flex align-self-center fw-bold">
                            👤 <span class="d-none d-lg-block">Utilisateurs</span>
                        </a>
                        <a href="/administration-actualites" class="btn my-btn btn-profile fw-bold m-2 d-flex align-self-center fw-bold">
                            📮 <span class="d-none d-lg-block">Actualités</span>
                        </a>
                        <a href="/administration-signalements" class="btn my-btn btn-profile fw-bold m-2 d-flex align-self-center fw-bold">
                            🚨 <span class="d-none d-lg-block">Signalements</span>
                        </a>
                    </div>
                </nav>
            </div>
            <div class="col-12">
                <div class="container-fluid p-2">
                    <div class="row justify-content-center">

                        <!-- error message -->
                        <?php if (!empty($message)) { ?>
                            <div class="col-12 text-center fw-bold fst-italic orange">
                                <?= $message ?? '' ?>
                            </div>
                        <?php } ?>

                        <form class="w-50 pb-3" action="/administration-actualites" method="GET" id="search">
                            <input type="search" class="form-control text-center" placeholder="🕵️‍♀️ Hello, Je cherche pour vous !" pattern="<?= SEARCH ?>" name="search" id="search" value="<?= $search ?? '' ?>">

                            <?php if (!empty($error['search'])) { ?>
                                <div class="fs-7 alert fst-italic" id="alertSearch">
                                    <small class="error fst-italic d-flex align-self-center m-2"><?= $error['search'] ?? '' ?></small>
                                </div>
                            <?php } ?>

                        </form>

                        <div class="col-12 fw-bold orange fs-5 pb-3">
                            Actualités
                        </div>

                        <!-- table -->
                        <table class="table table-hover">
                            <thead class="orange">
                                <tr>
                                    <th>Date de publication</th>
                                    <th>Post</th>
                                    <th>Pseudo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($listPosts as $key => $value) { ?>
                                    <!-- tr -->
                                    <tr>
                                        <td><?= date("d-m-Y H:i", strtotime($value->post_at)) ?? '' ?></td>
                                        <td><?= $value->post ?? '' ?></td>
                                        <td><?= $value->pseudo ?? '' ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <?php if (!isset($_GET['search']) && empty($_GET['search'])) { ?>
                        <div class="col-12 d-flex justify-content-center">
                            <ul class="pagination">
                                <?php for ($page = 1; $page <= $pages; $page++) : ?>
                                    <!-- Link active -->
                                    <li class="page-item p-1 <?= ($currentPage == $page) ? "active" : '' ?>">
                                        <a href="/administration-actualites?page=<?= $page ?>" class="page-link"><?= $page ?></a>
                                    </li>
                                <?php endfor ?>
                            </ul>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</main>