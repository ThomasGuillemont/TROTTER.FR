<?php

//! require once
require_once(dirname(__FILE__) . '/../utils/init.php');
require_once(dirname(__FILE__) . '/../config/constants.php');
require_once(dirname(__FILE__) . '/../models/User.php');
require_once(dirname(__FILE__) . '/../helpers/sessionFlash.php');

$error = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //! email
    $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
    if (empty($email)) {
        $error['email'] = 'Veuillez saisir votre adresse email';
    } else {
        $emailValid = filter_var($email, FILTER_VALIDATE_EMAIL);
        if ($emailValid === false) {
            $error['email'] = 'Le format de l\'email est incorrect';
        }
    }

    //! getOneByEmail($email)
    $user = User::getOneByEmail($email);
    if ($user instanceof PDOException) {
        $error['email'] = 'Votre email n\'existe pas';
    }

    //! check if validated_at is null
    if (is_null($user->validated_at)) {
        $error['email'] = 'Votre compte n\'est pas encore activé';
    }

    //! password
    $password = $_POST['password'];
    if (empty($password)) {
        $error['password'] = 'Veuillez saisir votre mot de passe';
    } else {
        if (empty($user instanceof PDOException)) {
            $hash = $user->password;
            if (!password_verify($password, $hash)) {
                $error['password'] = 'Votre mot de passe est incorrect';
            }
        }
    }

    if (empty($error)) {
        $_SESSION['user'] = $user;
        sleep(1.5);
        header('location: /profil?id=' . $user->id);
        die;
    }
}

//! include
include(dirname(__FILE__) . '/../views/templates/header.php');
include(dirname(__FILE__) . '/../views/connection.php');
include(dirname(__FILE__) . '/../views/templates/footer.php');
