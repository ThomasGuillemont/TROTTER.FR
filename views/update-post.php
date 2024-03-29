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

                    <h2>On change le message ?</h2>
                    <div class="mt-2 mb-2">
                        <button class="btn my-btn btn-profile fw-bolder" onclick="toggleEmojiDrawer()">🥳</button>
                    </div>
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
                    <form id="deleteForm" method="POST" class="w-100" action="/modifier-actualite?id=<?= $postById->id ?? '' ?>">
                        <input type="text" class="text-center form-control" pattern="<?= SEARCH ?>" id="post" value="<?= $postById->post ?? '' ?>" name="post" placeholder="Entrez votre message pour modification">
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn my-btn fw-bolder m-2" id="deleteBtn">Modifier</button>
                            <a href="/actualites" class="btn my-btn btn-profile fw-bold m-2">Annuler</a>
                        </div>
                    </form>

                <?php } ?>

            </div>
            <div class="col-12 my-auto col-sm-6">
                <img class="img-fluid my-auto align-middle pb-3 floating" src="/public/assets/img/Illustrations/update-post.png" alt="Femme sur un scooter essayant d'attraper un papillon">
            </div>
        </div>
    </div>
</main>
<script src="/public/assets/js/emojiPicker.js"></script>