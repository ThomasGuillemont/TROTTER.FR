<?php

//! require_once
require_once(dirname(__FILE__) . '/../utils/init.php');
require_once(dirname(__FILE__) . '/../config/regex.php');
require_once(dirname(__FILE__) . '/../models/post.php');
require_once(dirname(__FILE__) . '/../config/offset.php');

//! redirect
if (empty($_SESSION['user']) && !isset($_SESSION['user'])) {
    header('location: /accueil');
    die;
}

//! what is the page
if (isset($_GET['page']) && !empty($_GET['page'])) {
    $currentPage = intval(filter_input(INPUT_GET, 'page', FILTER_SANITIZE_NUMBER_INT));
} else {
    $currentPage = 1;
}
//! number of post
$postCount = Post::count();
$postCount = intval($postCount);
//! number of post per page
$offset = OFFSET;
//! total pages
$pages = ceil($postCount / $offset);
//! first post
$limit = ($currentPage * $offset) - $offset;

//! Post::getAll($limit, $offset)
$listposts = Post::getAll($limit, $offset);
if ($listposts instanceof PDOException) {
    $message = $user->getMessage();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //! post_at
    $date = new DateTime('', new DateTimeZone('Europe/Paris'));
    $post_at = $date->format('Y-m-d H:i:s');

    //! id_user
    $id_user = intval($_SESSION['user']->id);

    //! post
    $post = trim(filter_input(INPUT_POST, 'post', FILTER_SANITIZE_SPECIAL_CHARS));

    $emoji_list = array('😀', '😁', '😂', '😅', '🤭', '🤧', '🤓', '🤠');
    $replace = array('&#128512', '&#128513', '&#128514', '&#128517', '&#129325', '&#129319', '&#129299', '&#129312');
    $post = str_replace($emoji_list, $replace, $post);

    if (empty($post)) {
        $error['noPostError'] = 'noPostError';
    }

    //! $post->add()
    if (empty($error)) {
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
}

//! include
include(dirname(__FILE__) . '/../views/templates/header.php');
include(dirname(__FILE__) . '/../views/actuality.php');
include(dirname(__FILE__) . '/../views/templates/footer.php');
