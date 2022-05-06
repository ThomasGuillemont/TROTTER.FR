<main class="px-5">
    <div class="container-fluid">
        <div class="row glassmorphism">
            <div class="col">

                <?php if (!empty($message)) { ?>
                    <div class="col-12 text-center fw-bold fst-italic orange p-3">
                        <?= $message ?? '' ?>
                    </div>
                <?php } ?>

                <?php if (empty($message)) { ?>

                    <div class="card tchat">
                        <div class="card-body overflow-scroll d-flex flex-column-reverse">

                            <?php foreach ($listposts as $key => $value) {
                                if ($value->id_user != intval($_SESSION['user']->id)) { ?>
                                    <div class="d-flex flex-row justify-content-start mt-2 mb-2 ms-3">
                                        <img class="img-friends my-auto align-middle me-3" src="<?= $value->avatar ?? '' ?>" alt="Image de profil">
                                        <div class="d-flex flex-column message">
                                            <div class="small d-flex align-item-start">
                                                <p class="mb-0 fw-bold ps-2">
                                                    <a class="orange" href="/profil?id=<?= $value->id_user ?? '' ?>"><?= $value->pseudo ?? '' ?></a>
                                                </p>
                                                <p class="mb-0 ps-2 fst-italic"><?= date("d-m-Y H:i", strtotime($value->post_at)) ?? '' ?></p>
                                            </div>
                                            <p class="fs-6 ps-2 text-start mb-0 p-1 fw-bold">
                                                <?= $value->post ?? '' ?>
                                            </p>
                                            <div class="d-flex">
                                                <a class="fst-italic small ps-2" href="/signaler?id=<?= $value->id ?? '' ?>">Signaler</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php } else { ?>
                                    <div class="d-flex flex-row justify-content-start mt-2 mb-2 ms-3">
                                        <img class="img-friends my-auto align-middle me-3" src="<?= $value->avatar ?? '' ?>" alt="Image de profil">
                                        <div class="d-flex flex-column message">
                                            <div class="small d-flex align-item-start">
                                                <p class="mb-0 fw-bold ps-2">
                                                    <a class="orange" href="/profil?id=<?= $value->id_user ?? '' ?>"><?= $value->pseudo ?? '' ?></a>
                                                </p>
                                                <p class="mb-0 ps-2 fst-italic"><?= date("d-m-Y H:i", strtotime($value->post_at)) ?? '' ?></p>
                                            </div>
                                            <p class="fs-6 ps-2 text-start mb-0 p-1 fw-bold">
                                                <?= $value->post ?? '' ?>
                                            </p>
                                            <div class="d-flex">
                                                <a class="fst-italic small ps-2" href="/modifier?id=<?= $value->id ?? '' ?>">Modifier</a>
                                                <a class="fst-italic small ps-2" href="/supprimer?id=<?= $value->id ?? '' ?>">Supprimer</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            <?php } ?>

                        </div>
                        <div class="card-footer text-muted">
                            <div class="container-fluid p-0">
                                <div class="row">
                                    <div class="col-12 mb-2">
                                        <div id="drawer" class="emoji-drawer d-flex justify-content-end d-none">
                                            <div class="emoji" onclick="addEmoji(this.innerHTML)">😀</div>
                                            <div class="emoji" onclick="addEmoji(this.innerHTML)">😁</div>
                                            <div class="emoji" onclick="addEmoji(this.innerHTML)">😂</div>
                                            <div class="emoji" onclick="addEmoji(this.innerHTML)">😅</div>
                                            <div class="emoji" onclick="addEmoji(this.innerHTML)">🤭</div>
                                            <div class="emoji" onclick="addEmoji(this.innerHTML)">🤧</div>
                                            <div class="emoji" onclick="addEmoji(this.innerHTML)">🤓</div>
                                            <div class="emoji" onclick="addEmoji(this.innerHTML)">🤠</div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-10 col-md-11 p-0">
                                        <form class="d-flex justify-content-center" action="/actualités" method="POST" id="search">
                                            <input type="text" class="form-control" id="input" name="post" placeholder="Message">
                                            <?php if (!empty($error['post'])) { ?>
                                                <div class="fs-7 alert fst-italic" id="alertSearch">
                                                    <small class="error fst-italic d-flex align-self-center m-2"><?= $error['post'] ?? '' ?></small>
                                                </div>
                                            <?php } ?>
                                        </form>
                                    </div>
                                    <div class="col-12 col-sm-2 col-md-1">
                                        <button class="btn my-btn btn-profile fw-bolder" onclick="toggleEmojiDrawer()">&#128512</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>
</main>
<script src="/public/assets/js/emojiPicker.js"></script>