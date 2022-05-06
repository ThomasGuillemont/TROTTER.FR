<?php

//! require_once
require_once(dirname(__FILE__) . '/../utils/init.php');
require_once(dirname(__FILE__) . '/../models/User.php');
require_once(dirname(__FILE__) . '/../config/regex.php');

//! redirect
$id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
if (empty($_SESSION['user']) && !isset($_SESSION['user']) || $_SESSION['user']->id != $id) {
    header('location: /accueil');
    die;
}

$error = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //! password
    $password = trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS));

    if (empty($password)) {
        $error['password'] = 'Veuillez saisir votre mot de passe';
    } else {
        $hash = $_SESSION['user']->password;
        if (!password_verify($password, $hash)) {
            $error['password'] = 'Veuillez vérifier votre mot de passe';
        }
    }

    //! newPassword
    $newPassword = trim(filter_input(INPUT_POST, 'newPassword', FILTER_SANITIZE_SPECIAL_CHARS));
    $newPasswordConfirm = trim(filter_input(INPUT_POST, 'newPasswordConfirm', FILTER_SANITIZE_SPECIAL_CHARS));

    if (empty($newPassword)) {
        $error['newPassword'] = 'Veuillez saisir un nouveau mot de passe';
    } else {
        if (empty($newPasswordConfirm)) {
            $error['newPasswordConfirm'] = 'Veuillez confirmez votre nouveau mot de passe';
        } else {
            if ($newPassword != $newPasswordConfirm) {
                $error['newPassword'] = 'Le mot de passe et la confirmation ne sont pas identiques';
                $error['newPasswordConfirm'] = 'Le mot de passe et la confirmation ne sont pas identiques';
            } else {
                $newPasswordValid = filter_var($newPassword, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^" . PASSWORD . "$/")));
                if ($newPasswordValid === false) {
                    $error['newPassword'] = 'Le mot de passe doit faire entre 2 et 30 caractères';
                    $error['newPasswordConfirm'] = 'La confirmation doit faire entre 2 et 30 caractères';
                } else {
                    $passwordHash = password_hash($newPassword, PASSWORD_DEFAULT);
                }
            }
        }
    }
}

//! $user->update()
if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($error)) {
    $user = new User();
    $user->setPassword($passwordHash);
    $user->setId($_SESSION['user']->id);
    $user = $user->update();

    //! message success or error
    if (!$user) {
        $message = 'Une erreur est survenue';
    } else {
        header('location: /profil?id=' . $_SESSION['user']->id ?? '' . '');
        die;
    }
}

//! include
include(dirname(__FILE__) . '/../views/templates/header.php');
include(dirname(__FILE__) . '/../views/edition.php');
include(dirname(__FILE__) . '/../views/templates/footer.php');
