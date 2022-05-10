<?php
require_once dirname(__FILE__) . '/../helpers/JWT.php';
require_once dirname(__FILE__) . '/../models/User.php';
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
        if (!is_null($userByMail->validated_at)) {
            $message = '<div>Votre compte a déjà été activé</div>
            <a class="fw-bold btn my-btn btn-profile mt-3" href="/connexion">Allons-y !</a>';
        } else {
            $userByMail->validated_at = date('Y-m-d H:i:s');

            $user = new User();
            $user->setId($userByMail->id);
            $user->setValidated_at($userByMail->validated_at);
            $user = $user->activate();

            //! message success or error
            if (!$user) {
                $message = '<div>Une erreur est survenue</div>';
            } else {
                $message = '<div>Votre compte a bien été activé</div>
                    <a class="fw-bold btn my-btn btn-profile mt-3" href="/connexion">Allons-y !</a>';
            }
        }
    }
}

//! include
include(dirname(__FILE__) . '/../views/templates/header.php');
include(dirname(__FILE__) . '/../views/validate-user.php');
include(dirname(__FILE__) . '/../views/templates/footer.php');
