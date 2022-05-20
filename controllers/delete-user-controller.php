<?php

//! require once
require_once(dirname(__FILE__) . '/../utils/init.php');
require_once(dirname(__FILE__) . '/../models/User.php');
require_once(dirname(__FILE__) . '/../models/Reported.php');

//! INPUT_GET ID
$id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));

//! User::getOneById($id)
$user = User::getOneById($id);
if ($user instanceof PDOException) {
    $message = $user->getMessage();
}

//! redirect
if ($_SESSION['user']->id != $user->id) {
    header('location: /accueil');
    die;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //! User::delete($_SESSION['user']->id)
    $userDelete = User::delete($_SESSION['user']->id);

    //! message success or error
    if ($userDelete === false) {
        $message = 'Une erreur est survenue';
    } else {
        $message = 'Votre compte <b>Trotter</b> a été désactivé avec succès.';

        $to = $user->email;
        $subject = 'Suppression de compte Trotter.fr';
        $message = wordwrap($message, 50, "\r\n");
        $headers = 'From: admin@trotter.fr';

        mail($to, $subject, $message, $headers);

        header('location: /deconnexion');
        die();
    }
}

//! include
include(dirname(__FILE__) . '/../views/templates/header.php');
include(dirname(__FILE__) . '/../views/delete-user.php');
include(dirname(__FILE__) . '/../views/templates/footer.php');
