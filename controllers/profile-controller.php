<?php

//! require_once
require_once(dirname(__FILE__) . '/../utils/init.php');

//! redirect
if (empty($_SESSION['user']) && !isset($_SESSION['user'])) {
    header('location: /accueil');
    die;
}

//! require_once
require_once(dirname(__FILE__) . '/../models/user.php');
require_once(dirname(__FILE__) . '/../helpers/sessionFlash.php');

//! INPUT_GET ID
$id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));

//! User::getOneById($id)
$user = User::getOneById($id);
if ($user instanceof PDOException) {
    $message = $user->getMessage();
}

//! include
include(dirname(__FILE__) . '/../views/templates/header.php');

if ($_SESSION['user']->id == $id) {
    include(dirname(__FILE__) . '/../views/profile-connect.php');
} else {
    include(dirname(__FILE__) . '/../views/profile-unconnect.php');
}

include(dirname(__FILE__) . '/../views/templates/footer.php');
