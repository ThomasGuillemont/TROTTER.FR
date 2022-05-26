<?php

//! require once
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

    //! message
    $message = trim(filter_input(INPUT_POST, 'message', FILTER_SANITIZE_FULL_SPECIAL_CHARS));

    if (empty($message)) {
        $error['message'] = 'Veuillez saisir un message';
    } else {
        $messageValid = filter_var($message, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^" . TEXTAREA . "$/")));
        if ($messageValid  === false) {
            $error["message"] = "Veuillez saisir des caractères valides";
        }
    }

    if (empty($error)) {
        $to = 'admin@trotter.fr';
        $subject = 'Contact';
        $message = wordwrap($message, 50, "\r\n");
        $headers = 'From: ' . $email;

        mail($to, $subject, $message, $headers);

        header('location: /accueil');
        die;
    }
}

//! include
include(dirname(__FILE__) . '/../views/templates/header.php');
include(dirname(__FILE__) . '/../views/contact.php');
include(dirname(__FILE__) . '/../views/templates/footer.php');
