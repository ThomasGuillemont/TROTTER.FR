<?php

//! require_once
require_once(dirname(__FILE__) . '/../utils/init.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $error = [];

    //! email
    $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
    if (empty($email)) {
        $error['email'] = 'Veuillez saisir une adresse email';
    } else {
        $emailValid = filter_var($email, FILTER_VALIDATE_EMAIL);
        if ($emailValid === false) {
            $error['email'] = 'Le format de l\'email est incorrect';
        }
    }

    if (empty($error)) {
        header('location: /accueil');
        die;
    }
}

//! include
include(dirname(__FILE__) . '/../views/templates/header.php');
include(dirname(__FILE__) . '/../views/recovery.php');
include(dirname(__FILE__) . '/../views/templates/footer.php');
