<main class="px-5">
    <div class="container-fluid">
        <div class="row glassmorphism">
            <div class="col-12 d-flex align-items-center">

                <div class="container-fluid p-2">
                    <div class="row">
                        <div class="col-12">
                            <h2>Editer mon profil</h2>
                        </div>
                        <div class="col-12">
                            <img class="img-profile my-auto align-middle p-3 floating"
                                src="/public/assets/img/avatars/avatar.png" alt="Image de profil">
                        </div>
                        <div class="col-12 mt-4 d-flex justify-content-center">
                            <form id="editionForm">
                                <div class="mb-3">
                                    <label for="inputEmail" class="form-label fw-bolder formTitle">Email</label>
                                    <input type="email" class="form-control" id="inputEmail">
                                    <div class="fs-7 alert" id="alertEmail">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="inputPassword" class="form-label fw-bolder formTitle">Nouveau
                                        mot de passe</label>
                                    <input type="password" class="form-control" id="inputPassword">
                                    <div class="fs-7 alert" id="alertPassword">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="inputPasswordConfirm"
                                        class="form-label fw-bolder formTitle">Confirmation mot de passe</label>
                                    <input type="password" class="form-control" id="inputPasswordConfirm"
                                        name="inputPasswordConfirm">
                                    <div class="fs-7 alert" id="alertPasswordConfirm">
                                    </div>
                                </div>
                                <button type="button" class="btn my-btn fw-bolder" id="editionBtn">Valider</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</main>