<?php

//! session_start();
session_start();

$error = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
}

//! include
include(dirname(__FILE__) . '/../views/templates/header.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($error)) {
    header('location: /accueil');
    die;
} else {
    include(dirname(__FILE__) . '/../views/recovery.php');
}

include(dirname(__FILE__) . '/../views/templates/footer.php');
