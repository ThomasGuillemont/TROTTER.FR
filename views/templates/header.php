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

        <header class="mb-auto">
            <div>

                <?php
                    if ($connected === true) {
                        include(dirname(__FILE__) .'/header/connect.php');
                    } else {
                        include(dirname(__FILE__) .'/header/unconnect.php');
                    }
                ?>

                <nav>
                    <div class="d-flex justify-content-between m-3 glassmorphism">
                        <a href="/accueil" class="d-flex">
                            <img class="navImgLogo my-auto" src="/public/assets/img/Illustrations/logo.png" alt="trotterLogo">
                            <h1 class="my-auto align-middle">
                                Trotter.fr
                            </h1>
                        </a>
                        <button class="navbar-toggler m-2" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon">
                                <img class="navImg my-auto" src="/public/assets/img/icons/hamburger.png"
                                    alt="barre de navigation hamburger menu">
                            </span>
                        </button>
                    </div>
                </nav>
            </div>
        </header>