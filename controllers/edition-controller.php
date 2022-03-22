<?php
    $connected = true;
    require_once( dirname(__FILE__).'/../config/regex.php' );
    $error = [];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // // password
        $password = $_POST['password'];
        if (empty($password)) {
            $error['password'] = 'Veuillez saisir votre mot de passe';
        }

        // newPassword
        $newPassword = $_POST['newPassword'];
        $newPasswordConfirm = $_POST['newPasswordConfirm'];

        if ($newPassword != $newPasswordConfirm) {
            $error['newPasswordConfirm'] = 'La confirmation n\'est pas identique au nouveau mot de passe';
        } else {
            if (empty($newPassword)) {
                $error['newPassword'] = 'Veuillez saisir un nouveau mot de passe';
            } else {
                if (empty($newPasswordConfirm)) {
                    $error['newPasswordConfirm'] = 'Veuillez confirmez votre nouveau mot de passe';
                } else {
                    $newPasswordValid = filter_var($password, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^".PASSWORD."$/")));
                    if ($newPasswordValid === false) {
                        $error['newPassword'] = 'Le mot de passe doit faire entre 5 et 30 caractères';
                        $error['newPasswordConfirm'] = 'La confirmation doit faire entre 5 et 30 caractères';
                    } else {
                        $passwordHash = password_hash($passwordValid, PASSWORD_DEFAULT);
                    }
                }
            }
        }
    }

    include(dirname(__FILE__) .'/../views/templates/header.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($error)){
        header('location: /profil');
    } else {
        include(dirname(__FILE__) .'/../views/edition.php');
    }

    include(dirname(__FILE__) .'/../views/templates/footer.php');