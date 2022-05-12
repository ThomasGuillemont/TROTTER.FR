<?php

//! require once
require_once(dirname(__FILE__) . '/../utils/init.php');
require_once(dirname(__FILE__) . '/../models/Banned.php');

//! redirect
if ($_SESSION['user']->id_roles != 1) {
    header('location: /accueil');
    die;
}

//! INPUT_GET ID
$id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
        $banned = $banned->update();

        //! message success or error
        if ($banned === false) {
            $message = 'Une erreur est survenue';
        } else {
            header('location: /administration-signalements');
            die;
        }
    }
}

//! include
include(dirname(__FILE__) . '/../views/templates/header.php');
include(dirname(__FILE__) . '/../views/banned-user.php');
include(dirname(__FILE__) . '/../views/templates/footer.php');
