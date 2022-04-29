<?php

//! session_start();
session_start();

//! redirect
$idGet = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
$idSession = intval($_SESSION['id_user']);
if (empty($_SESSION['id_user']) && !isset($_SESSION['id_user']) || $idSession != $idGet) {
    header('location: /accueil');
    die;
}

//! require_once
require_once(dirname(__FILE__) . '/../models/user.php');
require_once(dirname(__FILE__) . '/../config/regex.php');
require_once(dirname(__FILE__) . '/../helpers/sessionFlash.php');

//! getOneByEmail($email)
$user = User::getOneById($idSession);
if ($user instanceof PDOException) {
    $message = $user->getMessage();
}

$error = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //! password
    $password = trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS));

    if (empty($password)) {
        $error['password'] = 'Veuillez saisir votre mot de passe';
    } else {
        $hash = $user->password;
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
                $error['newPasswordConfirm'] = 'La confirmation n\'est pas identique au nouveau mot de passe';
            } else {
                $newPasswordValid = filter_var($newPassword, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^" . PASSWORD . "$/")));
                if ($newPasswordValid === false) {
                    $error['newPassword'] = 'Le mot de passe doit faire entre 5 et 30 caractères';
                    $error['newPasswordConfirm'] = 'La confirmation doit faire entre 5 et 30 caractères';
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
    $user->setId($idSession);
    $user = $user->update();

    //! message success or error
    if (!$user) {
        $message = 'Une erreur est survenue';
    } else {
        SessionFlash::set('Votre mot de passe a bien été modifié !');
        header('location: /profil?id=' . $_SESSION['id_user'] ?? '' . '');
        die;
    }
}

//! include
include(dirname(__FILE__) . '/../views/templates/header.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($error)) {
    header('location: /profil?id=' . $_SESSION['id_user'] ?? '' . '');
    die;
} else {
    include(dirname(__FILE__) . '/../views/edition.php');
}

include(dirname(__FILE__) . '/../views/templates/footer.php');
