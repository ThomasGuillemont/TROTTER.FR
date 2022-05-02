<?php

//! session_start();
session_start();

//! redirect
if (empty($_SESSION['id_user']) && !isset($_SESSION['id_user'])) {
    header('location: /accueil');
    die;
}

//! require once
require_once(dirname(__FILE__) . '/../models/user.php');

//! redirect
if ($user->id_roles != 1) {
    header('location: /accueil');
    die;
}

//! User::getOneById($id)
$user = User::getOneById($_SESSION['id_user']);
if ($user instanceof PDOException) {
    $message = $user->getMessage();
}

//! INPUT_GET ID
$id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));

//! include
include(dirname(__FILE__) . '/../views/templates/header.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($error)) {
    header('location: /administration');
    die;
} else {
    include(dirname(__FILE__) . '/../views/delete-user.php');
}

include(dirname(__FILE__) . '/../views/templates/footer.php');
