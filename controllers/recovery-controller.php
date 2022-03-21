<?php
    $error = [];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // email
        $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
        if (empty($email)) {
            $error['email'] = 'Veuillez saisir une adresse email';
        }
    }

    include(dirname(__FILE__) .'/../views/templates/header-connect.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($error)){
        header('location: /accueil');
    } else {
        include(dirname(__FILE__) .'/../views/recovery.php');
    }

    include(dirname(__FILE__) .'/../views/templates/footer.php');