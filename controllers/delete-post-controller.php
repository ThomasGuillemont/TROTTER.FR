<?php

//! require once
require_once(dirname(__FILE__) . '/../utils/init.php');
require_once(dirname(__FILE__) . '/../models/User.php');
require_once(dirname(__FILE__) . '/../models/Post.php');
require_once(dirname(__FILE__) . '/../helpers/sessionFlash.php');

//! INPUT_GET ID
$id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));

//! Post::getOneById($id)
$post = Post::getOneById($id);
if ($post instanceof PDOException) {
    $message = $post->getMessage();
}

//! redirect
if ($_SESSION['user']->id != $post->id_user) {
    header('location: /accueil');
    die;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //! Post::delete($id)
    $postDelete = Post::delete($id);

    //! message success or error
    if ($postDelete === false) {
        $message = 'Une erreur est survenue';
    } else {
        SessionFlash::set('Le post a été supprimer avec succès !');
        header('location: /actualités');
        die;
    }
}

//! include
include(dirname(__FILE__) . '/../views/templates/header.php');
include(dirname(__FILE__) . '/../views/delete-post.php');
include(dirname(__FILE__) . '/../views/templates/footer.php');
