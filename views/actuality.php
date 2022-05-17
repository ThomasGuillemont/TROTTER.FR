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
                                <div class="row justify-content-center me-1 ms-1">
                                    <span class="alert fst-italic">
                                        <?= SessionFlash::display('message') ?>
                                    </span>
                                    <div class="col-12 col-sm-10 col-xl-11 p-0 mt-2 mb-2">
                                        <form class="d-flex justify-content-center" action="/actualités" method="POST" id="postForm">
                                            <input type="text" pattern="<?= SEARCH ?>" class="text-center form-control" id="post" name="post" placeholder="Quoi de neuf ?">
                                        </form>
                                    </div>
                                    <div class="col-2 mt-2 col-xl-1 mb-2 d-none d-sm-block">
                                        <button class="btn my-btn btn-profile fw-bolder" onclick="toggleEmojiDrawer()">Emoji</button>
                                    </div>
                                    <?php if (!empty($error['post'])) { ?>
                                        <div class="d-flex justify-content-center fs-7 alert fst-italic" id="alertPost">
                                            <small class="error fst-italic d-flex align-self-center m-2"><?= $error['post'] ?? '' ?></small>
                                        </div>
                                    <?php } ?>
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
                            </div>
                        </div>
                        <div class="card-body overflow-scroll d-flex flex-column p-0 mb-2">
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