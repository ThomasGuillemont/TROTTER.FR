<?php

//! require once
require_once(dirname(__FILE__) . '/../utils/init.php');
require_once(dirname(__FILE__) . '/../config/constants.php');
require_once(dirname(__FILE__) . '/../models/User.php');
require_once(dirname(__FILE__) . '/../models/Banned.php');

//! redirect
if ($_SESSION['user']->id_roles != 1) {
    header('location: /accueil');
    die;
}

//! INPUT_GET ID
$id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));

//! User::getOneById($id)
$user = User::getOneById($id);
if ($user instanceof PDOException) {
    $message = $user->getMessage();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //! message
    $message = trim(filter_input(INPUT_POST, 'bannedMessage', FILTER_SANITIZE_SPECIAL_CHARS));
    if (empty($message)) {
        $error['bannedMessage'] = 'Vous devez entrer un message';
    } else {
        $message = filter_var($message, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^" . SEARCH . "$/")));
        if ($message === false) {
            $error['bannedMessage'] = 'Veuillez entrer un message valide';
        }
    }

    //! reported_at
    $date = new DateTime('', new DateTimeZone('Europe/Paris'));
    $banned_at = $date->format('Y-m-d H:i:s');

    //! $banned->add()
    if (empty($error)) {
        //! Post::update($id)
        $banned = new Banned();
        $banned->setMessage($message);
        $banned->setBanned_at($banned_at);
        $banned->setId_users($id);
        $banned = $banned->add();

        //! message success or error
        if ($banned === false) {
            $message = 'Une erreur est survenue';
        } else {
            $message = 'Votre compte <b>Trotter</b> a été banni.';

            $to = $user->email;
            $subject = 'Suppression de compte Trotter.fr';
            $message = wordwrap($message, 50, "\r\n");
            $headers = 'From: admin@trotter.fr';

            mail($to, $subject, $message, $headers);

            header('location: /administration-signalements');
            die;
        }
    }
}

//! include
include(dirname(__FILE__) . '/../views/templates/header.php');
include(dirname(__FILE__) . '/../views/banned-user.php');
include(dirname(__FILE__) . '/../views/templates/footer.php');
