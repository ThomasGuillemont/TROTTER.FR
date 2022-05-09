<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="robots" content="index, follow">
    <meta name="description" content="Trotter.fr - Le réseau social 0% publicité pour 100% plaisir" />
    <meta name="author" content="Thomas Guillemont" />
    <title>Trotter.fr</title>
    <link rel="icon" type="image/x-icon" href="/public/assets/img/icons/message.png" />
    <!-- Bootstrap CSS -->
    <link href="/public/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS -->
    <link href="/public/assets/css/style.css" rel="stylesheet">
</head>

<body class="d-flex text-center min-vh-100 bg-main">
    <div class="cover-container-fluid w-100 d-flex flex-column">
        <main class="px-5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 notFound d-flex flex-column justify-content-center">
                        <h2>Erreur HTTP 404</h2>
                        <p class="fw-bold">La page que vous recherchez semble introuvable.</p>
                    </div>
                    <div>
                        <a class="linkNotFound fw-bold btn my-btn btn-profile" href="/accueil">Retour à l'accueil</a>
                        <div>
                            <img class="img-fluid my-auto align-middle pb-3 floating" src="/public/assets/img/Illustrations/404.png" alt="404Illustration">
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- footer -->
        <footer class="mt-auto colorText pt-3">
            <div class="container-fluid">
                <div class="row align-items-center mb-2 fw-bold">
                    <div class="col-12 col-sm-6 mb-0">
                        <span>&copy <a class="orange" target="_blank" href="https://github.com/ThomasGuillemont">Thomas Guillemont</a> - <?= date("Y") ?></span>
                    </div>
                    <div class="col-12 col-sm-6">
                        <a href="/conditions">Conditions générales</a>
                        <span>-</span>
                        <a href="/mentions">Mentions légales</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!-- Bootstrap JS -->
    <script src="./public/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>