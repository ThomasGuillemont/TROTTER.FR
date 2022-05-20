<?php

//! require_once
require_once(dirname(__FILE__) . '/../utils/init.php');
require_once(dirname(__FILE__) . '/../helpers/sessionFlash.php');
require_once(dirname(__FILE__) . '/../helpers/JWT.php');

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

        $payload = ['email' => $email, 'exp' => (time() + 600)];
        $jwt = JWT::generate_jwt($payload);

        $link = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/récupération-mot-de-passe?jwt=' . $jwt;
        $message = 'Veuillez cliquer sur le lien suivant pour choisir un nouveau mot de passe <b>Trotter</b>.<br><a href="' . $link . '">Récupération</a>';


        $to = $email;
        $subject = 'Récupération de mot de passe Trotter.fr';
        $message = wordwrap($message, 50, "\r\n");
        $headers = 'From: admin@trotter.fr';

        mail($to, $subject, $message, $headers);

        SessionFlash::set('Un email vous a été envoyé pour réinitialiser votre mot de passe');
        header('Location: /récupération');
        die;
    }
}

//! include
include(dirname(__FILE__) . '/../views/templates/header.php');
include(dirname(__FILE__) . '/../views/recovery.php');
include(dirname(__FILE__) . '/../views/templates/footer.php');
