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
                        <div class="card-hearder text-muted">
                            <div class="container-fluid p-0">
                                <div class="row">
                                    <div class="col-12 col-md-10 p-0 mt-2 mb-2">
                                        <form class="d-flex justify-content-center" action="/actualités" method="POST" id="postForm">
                                            <input type="hidden" name="id_user_input" id="id_user_input" value="<?= $_SESSION['user']->id ?> " />
                                            <input type="text" class=" text-center form-control ms-5 me-5" id="post" name="post" placeholder="Que racontez-vous aujourd'hui ?">
                                            <?php if (!empty($error['post'])) { ?>
                                                <div class="fs-7 alert fst-italic" id="alertPost">
                                                    <small class="error fst-italic d-flex align-self-center m-2"><?= $error['post'] ?? '' ?></small>
                                                </div>
                                            <?php } ?>
                                        </form>
                                        <div id="drawer" class="emoji-drawer d-flex flex-wrap justify-content-center d-none">
                                            <div class="emoji m-1" onclick="addEmoji(this.innerHTML)">😀</div>
                                            <div class="emoji m-1" onclick="addEmoji(this.innerHTML)">😁</div>
                                            <div class="emoji m-1" onclick="addEmoji(this.innerHTML)">😂</div>
                                            <div class="emoji m-1" onclick="addEmoji(this.innerHTML)">😅</div>
                                            <div class="emoji m-1" onclick="addEmoji(this.innerHTML)">😘</div>
                                            <div class="emoji m-1" onclick="addEmoji(this.innerHTML)">😳</div>
                                            <div class="emoji m-1" onclick="addEmoji(this.innerHTML)">🤭</div>
                                            <div class="emoji m-1" onclick="addEmoji(this.innerHTML)">🤧</div>
                                            <div class="emoji m-1" onclick="addEmoji(this.innerHTML)">🤓</div>
                                            <div class="emoji m-1" onclick="addEmoji(this.innerHTML)">🤠</div>
                                            <div class="emoji m-1" onclick="addEmoji(this.innerHTML)">😷</div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-2 mt-2 mb-2">
                                        <button class="btn my-btn btn-profile fw-bolder" onclick="toggleEmojiDrawer()">&#128512</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body overflow-scroll d-flex flex-column mb-2">
                            <div name="ajax" id="ajax"></div>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>
</main>
<script src="/public/assets/js/ajax/ajaxActuality.js"></script>
<script src="/public/assets/js/emojiPicker.js"></script>