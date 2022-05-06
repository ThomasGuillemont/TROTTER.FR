<main class="px-5">
    <div class="container-fluid">
        <div class="row glassmorphism">
            <div class="col-12">
                <nav>
                    <div class="d-flex justify-content-start m-3">
                        <a href="/administration-utilisateurs" class="btn my-btn btn-profile fw-bold m-2">
                            👤 Utilisateurs
                        </a>
                        <a href="/administration-actualités" class="btn my-btn btn-profile fw-bold m-2">
                            📮 Actualités
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

                        <div class="col-12 fw-bold orange fs-5 pb-3">
                            Utilisateurs
                        </div>

                        <form class="w-50 pb-3" action="/administration-utilisateurs" method="GET" id="search">
                            <input type="search" class="form-control text-center" placeholder="🕵️‍♀️ Hello, Je cherche pour vous ! " pattern="<?= SEARCH ?>" name="search" id="search" value="<?= $search ?? '' ?>">

                            <?php if (!empty($error['search'])) { ?>
                                <div class="fs-7 alert fst-italic" id="alertSearch">
                                    <small class="error fst-italic d-flex align-self-center m-2"><?= $error['search'] ?? '' ?></small>
                                </div>
                            <?php } ?>

                        </form>

                        <!-- table -->
                        <table class="table table-hover">
                            <thead class="orange">
                                <tr>
                                    <th>IP</th>
                                    <th>Date d'inscription</th>
                                    <th>Pseudo</th>
                                    <th>Email</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($listUsers as $key => $value) { ?>
                                    <!-- tr -->
                                    <tr>
                                        <td><?= $value->ip ?? '' ?></td>
                                        <td><?= date("d-m-Y", strtotime($value->registered_at)) ?? '' ?></td>
                                        <td><?= $value->pseudo ?? '' ?></td>
                                        <td><a href="mailto:<?= $value->email ?? '' ?>"><?= $value->email ?? '' ?></a></td>
                                        <td>
                                            <a href="/profil?id=<?= $value->id ?? '' ?>">🔎</a>
                                            <a href="/supprimer-utilisateur?id=<?= $value->id ?? '' ?>">❌</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <?php if (!isset($_GET['search']) && empty($_GET['search'])) { ?>
                        <div class="col-12 d-flex justify-content-center">
                            <ul class="pagination">
                                <?php for ($page = 1; $page <= $pages; $page++) : ?>
                                    <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
                                    <li class="page-item p-1 <?= ($currentPage == $page) ? "active" : "" ?>">
                                        <a href="/administration-utilisateurs?page=<?= $page ?>" class="page-link"><?= $page ?></a>
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