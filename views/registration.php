<main class="px-5">
    <div class="container-fluid">
        <div class="row glassmorphism">
            <div class="col-12 d-flex align-items-center col-sm-6">
                <div class="container-fluid p-2">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center">
                            <form id="registrationForm">
                                <div class="mb-3">
                                    <label for="inputPseudo" class="form-label fw-bolder formTitle">Pseudo</label>
                                    <input type="text" class="form-control" id="inputPseudo" name="inputPseudo">
                                    <div class="fs-7 alert" id="alertPseudo">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="inputEmail" class="form-label fw-bolder formTitle">Email</label>
                                    <input type="email" class="form-control" id="inputEmail" name="inputEmail">
                                    <div class="fs-7 alert" id="alertEmail">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="inputPassword" class="form-label fw-bolder formTitle">Mot de
                                        passe</label>
                                    <input type="password" class="form-control" id="inputPassword" name="inputPassword">
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
                                <div class="form-check d-flex justify-content-center">
                                    <input type="checkbox" class="form-check-input m-1" id="inputCheckbox"
                                        name="inputCheckbox">
                                    <label class="form-check-label formTitle" for="inputCheckbox">J'accepte les <a
                                            href="./conditions.html">conditions</a></label>
                                </div>
                                <div class="fs-7 alert mb-3" id="alertCheckBox">
                                </div>
                                <button type="button" id="registrationBtn"
                                    class="btn my-btn fw-bolder">S'inscrire</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 my-auto col-sm-6">
                <img class="img-fluid my-auto align-middle pb-3 floating"
                    src="/public/assets/img/Illustrations/registration.png" alt="inscriptionIllustration">
            </div>
        </div>
    </div>
</main>