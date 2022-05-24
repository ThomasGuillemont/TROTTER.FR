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

                <!-- if connect -->
                <?php
                if (empty($_SESSION['user']->id) && !isset($_SESSION['user']->id)) {
                    include(dirname(__FILE__) . '/header/unconnect.php');
                } else {
                    include(dirname(__FILE__) . '/header/connect.php');
                }
                ?>

                <!-- nav -->
                <nav>
                    <div class="d-flex justify-content-between m-3 p-1 glassmorphism">
                        <div class="d-flex justify-content-start align-self-center">
                            <a href="/accueil" class="d-flex">
                                <h1 class="my-auto align-middle ms-4 me-2">
                                    Trotter.fr
                                </h1>
                            </a>
                        </div>
                        <div class="d-flex justify-content-center align-self-center">
                            <?php if (!empty($_SESSION['user']) && isset($_SESSION['user'])) {
                                if ($_SESSION['user']->id_roles == 1) { ?>
                                    <a href="/administration-utilisateurs" class="btn my-btn btn-profile ms-2 me-2 d-flex align-self-center fw-bold">
                                        🔐
                                    </a>
                                <?php } ?>

                                <!-- Button trigger modal notif -->
                                <!-- <button type="button" class="btn my-btn btn-profile ms-2 me-2 d-flex align-self-center fw-bold" data-bs-toggle="modal" data-bs-target="#modal">
                                    <div class=" position-relative">
                                        🔔
                                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                            1
                                        </span>
                                    </div>
                                </button> -->

                            <?php } ?>
                            <button class="btn my-btn btn-profile ms-2 me-4 d-flex align-self-center fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                                Menu
                            </button>
                        </div>
                    </div>
                </nav>
            </div>
        </header>