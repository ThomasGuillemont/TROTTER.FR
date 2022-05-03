<?php

//! session_start();
session_start();

//! require once
require_once(dirname(__FILE__) . '/../models/user.php');
require_once(dirname(__FILE__) . '/../models/post.php');

//! User::getOneById($id)
$user = User::getOneById($_SESSION['id_user']);
if ($user instanceof PDOException) {
    $message = $user->getMessage();
}

//! redirect
if ($user->id_roles != 1) {
    header('location: /accueil');
    die;
}

//! INPUT_GET ID
$id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));

//! Post::getOneById($id)
$post = Post::getOneById($id);
if ($post instanceof PDOException) {
    $message = $post->getMessage();
}

//! include
include(dirname(__FILE__) . '/../views/templates/header.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($error)) {
    header('location: /administration-actualités');
    die;
} else {
    include(dirname(__FILE__) . '/../views/delete-post.php');
}

include(dirname(__FILE__) . '/../views/templates/footer.php');
