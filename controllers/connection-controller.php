<?php
    require_once( dirname(__FILE__).'/../config/regex.php' );
    $error = [];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // email
        $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
        if (empty($email)) {
            $error['email'] = 'Veuillez saisir une adresse email';
        } else {
            $emailValid = filter_var($email, FILTER_VALIDATE_EMAIL);
            if ($emailValid === false) {
                $error['email'] = 'Le format de l\'email est incorrect';
            }
        }

        // // password
        $password = $_POST['password'];
        if (empty($password)) {
            $error['password'] = 'Veuillez saisir un mot de passe';
        }
    }

    include(dirname(__FILE__) .'/../views/templates/header-unconnect.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($error)){
        header('location: /profil');
    } else {
        include(dirname(__FILE__) .'/../views/connection.php');
    }

    include(dirname(__FILE__) .'/../views/templates/footer.php');