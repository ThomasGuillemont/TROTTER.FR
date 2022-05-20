<?php

//! require once
require_once dirname(__FILE__) . '/../helpers/JWT.php';
require_once dirname(__FILE__) . '/../models/User.php';
require_once(dirname(__FILE__) . '/../helpers/sessionFlash.php');
require_once(dirname(__FILE__) . '/../config/constants.php');

$jwt = $_GET['jwt'];

if (!JWT::is_jwt_valid($jwt)) {
    $message = 'Token non valide';
} else {
    $datas = JWT::get($jwt);

    $userByMail = User::getOneByEmail($datas->email);
    if ($userByMail instanceof PDOException) {
        $message = '<div>Ce mail n\'existe pas</div>';
    } else {
        //! newPassword
        $newPassword = trim(filter_input(INPUT_POST, 'newPassword', FILTER_SANITIZE_SPECIAL_CHARS));
        $newPasswordConfirm = trim(filter_input(INPUT_POST, 'newPasswordConfirm', FILTER_SANITIZE_SPECIAL_CHARS));

        if (empty($newPassword)) {
            $error['newPassword'] = 'Veuillez saisir un nouveau mot de passe';
        } else {
            if (empty($newPasswordConfirm)) {
                $error['newPasswordConfirm'] = 'Veuillez confirmez votre nouveau mot de passe';
            } else {
                if ($newPassword == $password) {
                    $error['newPassword'] = 'Veuillez saisir un nouveau mot de passe différent de l\'ancien';
                    $error['newPasswordConfirm'] = 'Veuillez saisir un nouveau mot de passe différent de l\'ancien';
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
        if (empty($error)) {
            $user = new User();
            $user->setPassword($passwordHash);

            $user->setId($userByMail->id);
            $user = $user->update();

            //! message success or error
            if ($user === false) {
                $message = 'Une erreur est survenue';
            } else {
                SessionFlash::set('Le mot de passe a été modifié avec succès !');
                header('location: /connexion');
                die;
            }
        }
    }
}

//! include
include(dirname(__FILE__) . '/../views/templates/header.php');
include(dirname(__FILE__) . '/../views/recovery-password.php');
include(dirname(__FILE__) . '/../views/templates/footer.php');
