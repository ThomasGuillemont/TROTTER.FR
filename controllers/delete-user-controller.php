<?php

//! require once
require_once(dirname(__FILE__) . '/../utils/init.php');
require_once(dirname(__FILE__) . '/../models/user.php');

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
    $message = $post->getMessage();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //! User::delete($id)
    $userDelete = User::delete($id);
    $userDeletePost = User::deletePost($id);

    //! message success or error
    if ($userDelete === false) {
        $message = 'Une erreur est survenue';
    } else {
        header('location: /administration-utilisateurs');
        die;
    }
}

//! include
include(dirname(__FILE__) . '/../views/templates/header.php');
include(dirname(__FILE__) . '/../views/delete-user.php');
include(dirname(__FILE__) . '/../views/templates/footer.php');
