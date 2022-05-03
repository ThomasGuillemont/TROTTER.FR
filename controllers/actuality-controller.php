<?php

//! session_start();
session_start();

//! redirect
if (empty($_SESSION['id_user']) && !isset($_SESSION['id_user'])) {
    header('location: /accueil');
    die;
}

//! require_once
require_once(dirname(__FILE__) . '/../config/regex.php');
require_once(dirname(__FILE__) . '/../models/post.php');
require_once(dirname(__FILE__) . '/../config/offset.php');

//! what is the page
if (isset($_GET['page']) && !empty($_GET['page'])) {
    $currentPage = intval(filter_input(INPUT_GET, 'page', FILTER_SANITIZE_NUMBER_INT));
} else {
    $currentPage = 1;
}
//! number of post
$postCount = Post::count();
$postCount = intval($postCount);
//! number of patients per page
$offset = OFFSET;
//! total pages
$pages = ceil($postCount / $offset);
//! first user
$limit = ($currentPage * $offset) - $offset;

//! Post::getAll($limit, $offset)
$listposts = Post::getAll($limit, $offset);
if ($listposts instanceof PDOException) {
    $message = $user->getMessage();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //! post_at
    // $post_at = (new DateTime())->format('Y-m-d H:i');

    $date = new DateTime('', new DateTimeZone('Europe/Paris'));
    $post_at = $date->format('Y-m-d H:i');

    //! id_user
    $id_user = intval($_SESSION['id_user']);

    //! post
    $post = trim(filter_input(INPUT_POST, 'post', FILTER_SANITIZE_SPECIAL_CHARS));

    $emoji_list = array('😀', '😁', '😂', '😅', '🤭', '🤧', '🤓', '🤠');
    $replace = array('&#128512', '&#128513', '&#128514', '&#128517', '&#129325', '&#129319', '&#129299', '&#129312');
    $post = str_replace($emoji_list, $replace, $post);

    if (empty($post)) {
        $error['noPostError'] = 'noPostError';
    }
}

//! $post->add()
if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($error)) {
    $post = new Post($post_at, $post, $id_user);
    $post = $post->add();

    //! message success or error
    if (!$post) {
        $message = 'Une erreur est survenue';
    } else {
        header('Location: /actualités');
        die;
    }
}

//! include
include(dirname(__FILE__) . '/../views/templates/header.php');
include(dirname(__FILE__) . '/../views/actuality.php');
include(dirname(__FILE__) . '/../views/templates/footer.php');
