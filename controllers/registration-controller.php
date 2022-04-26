<?php
require_once(dirname(__FILE__) . '/../config/regex.php');
require_once(dirname(__FILE__) . '/../models/user.php');
$connected = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $error = [];

    //! ip
    $ip = trim(filter_input(INPUT_POST, 'ip', FILTER_SANITIZE_SPECIAL_CHARS));

    //! registered_at
    $registered_at = (new DateTime())->format('Y-m-d H:i:s');

    //! validated_at
    $validated_at = (new DateTime())->format('Y-m-d H:i:s');

    //! role
    $role = 3;

    //! avatar
    $avatar = trim(filter_input(INPUT_POST, 'flexRadio', FILTER_SANITIZE_SPECIAL_CHARS));
    $minAvatar = 1;
    $maxAvatar = 8;
    if (empty($avatar)) {
        $error['avatar'] = 'Veuillez choisir un avatar';
    } else {
        $avatarValid = filter_var($avatar, FILTER_VALIDATE_INT, array("options" => array("min_range" => $minAvatar, "max_range" => $maxAvatar)));
        if ($avatarValid === false) {
            $error['avatar'] = 'L\'avatar n\'est pas valide';
        }
    }

    //! pseudo
    $pseudo = trim(filter_input(INPUT_POST, 'pseudo', FILTER_SANITIZE_SPECIAL_CHARS));
    if (empty($pseudo)) {
        $error['pseudo'] = 'Veuillez saisir un pseudo';
    } else {
        $pseudoValid = filter_var($pseudo, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^" . PSEUDO . "$/")));
        if ($pseudoValid === false) {
            $error['pseudo'] = 'Le pseudo doit faire entre 5 et 30 caractères';
        }
    }

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

    //! password
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
                $passwordValid = filter_var($password, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^" . PASSWORD . "$/")));
                if ($passwordValid === false) {
                    $error['password'] = 'Le mot de passe doit faire entre 5 et 30 caractères';
                    $error['passwordConfirm'] = 'La confirmation doit faire entre 5 et 30 caractères';
                } else {
                    $passwordHash = password_hash($passwordValid, PASSWORD_DEFAULT);
                }
            }
        }
    }

    //! checkbox
    $checkbox = intval(filter_input(INPUT_POST, 'checkbox', FILTER_SANITIZE_NUMBER_INT));
    if ($checkbox) {
        $checkboxCheked = 'checked';
    }
    if ($checkbox !== 1) {
        $error['checkbox'] = 'Vous devez lire et accepter les <a href="/conditions.html">conditions</a>';
    }
}

//! $user->add()
if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($error)) {
    $user = new User($ip, $registered_at, $validated_at, $email, $pseudo, $passwordHash, $avatar, $role);
    $user = $user->add();

    //! sentence success or error
    if (!$user) {
        $sentence = 'Une erreur est survenue';
    } else {
        $sentence = 'Votre compte a été créé avec succès !';
    }
}

include(dirname(__FILE__) . '/../views/templates/header.php');
include(dirname(__FILE__) . '/../views/registration.php');

// if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($error)) {
//     sleep(1.5);
//     header('location: /profil');
// } else {
//     include(dirname(__FILE__) . '/../views/registration.php');
// }

include(dirname(__FILE__) . '/../views/templates/footer.php');
