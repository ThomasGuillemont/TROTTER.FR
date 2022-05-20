<?php

//! require once
require_once(dirname(__FILE__) . '/../utils/init.php');
require_once(dirname(__FILE__) . '/../models/Reported.php');

//! INPUT_GET ID
$id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));

//! Reported::getOneById($id)
$reported = Reported::getOneById($id);
if ($reported instanceof PDOException) {
    $message = $reported->getMessage();
}

if (empty($message)) {
    //! redirect
    if ($_SESSION['user']->id_roles != 1) {
        header('location: /accueil');
        die;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //! Reported::delete($id)
        $reportedDelete = Reported::delete($reported->id);

        //! message success or error
        if ($reportedDelete === false) {
            $message = 'Une erreur est survenue';
        } else {
            header('location: /administration-signalements');
            die;
        }
    }
}

//! include
include(dirname(__FILE__) . '/../views/templates/header.php');
include(dirname(__FILE__) . '/../views/delete-report.php');
include(dirname(__FILE__) . '/../views/templates/footer.php');
