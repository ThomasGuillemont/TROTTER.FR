<?php
    require_once( dirname(__FILE__).'/../config/regex.php' );
    $connected = false;
    $error = [];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // pseudo
        $pseudo = trim(filter_input(INPUT_POST, 'pseudo', FILTER_SANITIZE_SPECIAL_CHARS));
        if (empty($pseudo)) {
            $error['pseudo'] = 'Veuillez saisir un pseudo';
        } else {
            $pseudoValid = filter_var($pseudo, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^".PSEUDO."$/")));
            if ($pseudoValid === false) {
                $error['pseudo'] = 'Le pseudo doit faire entre 5 et 30 caractères';
            }
        }

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

        // password
        $password = $_POST['password'];
        $passwordConfirm = $_POST['passwordConfirm'];

        if ($password != $passwordConfirm) {
            $error['passwordConfirm'] = 'La confirmation n\'est pas identique au mot de passe';
        } else {
            if (empty($password)) {
                $error['password'] = 'Veuillez saisir un mot de passe';
            } else {
                if (empty($passwordConfirm)) {
                    $error['passwordConfirm'] = 'Veuillez confirmez votre mot de passe';
                } else {
                    $passwordValid = filter_var($password, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^".PASSWORD."$/")));
                    if ($passwordValid === false) {
                        $error['password'] = 'Le mot de passe doit faire entre 5 et 30 caractères';
                        $error['passwordConfirm'] = 'La confirmation doit faire entre 5 et 30 caractères';
                    } else {
                        $passwordHash = password_hash($passwordValid, PASSWORD_DEFAULT);
                    }
                }
            }
        }

        // checkbox
        $checkbox = intval(filter_input(INPUT_POST, 'checkbox', FILTER_SANITIZE_NUMBER_INT));
        if ($checkbox) {
            $checkboxCheked = 'checked';
        }
        if ($checkbox !== 1) {
            $error['checkbox'] = 'Vous devez lire et accepter les <a href="/conditions.html">conditions</a>';
        }
    }

    include(dirname(__FILE__) .'/../views/templates/header.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($error)){
        sleep(1.5);
        header('location: /profil');
    } else {
        include(dirname(__FILE__) .'/../views/registration.php');
    }

    include(dirname(__FILE__) .'/../views/templates/footer.php');