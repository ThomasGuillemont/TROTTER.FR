<?php

//! session_start();
session_start();

//! redirect
if (empty($_SESSION['id_user']) && !isset($_SESSION['id_user'])) {
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

if ($_SESSION['id_user'] == $id) {
    include(dirname(__FILE__) . '/../views/profile-connect.php');
} else {
    include(dirname(__FILE__) . '/../views/profile-unconnect.php');
}

include(dirname(__FILE__) . '/../views/templates/footer.php');
