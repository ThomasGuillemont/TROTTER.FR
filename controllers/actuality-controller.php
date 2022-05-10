<?php

//! require_once
require_once(dirname(__FILE__) . '/../utils/init.php');
require_once(dirname(__FILE__) . '/../models/Post.php');
require_once(dirname(__FILE__) . '/../config/constants.php');

//! redirect
if (empty($_SESSION['user']) && !isset($_SESSION['user'])) {
    header('location: /accueil');
    die;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //! post_at
    $date = new DateTime('', new DateTimeZone('Europe/Paris'));
    $post_at = $date->format('Y-m-d H:i:s');

    //! id_user
    $id_user = intval($_SESSION['user']->id);

    //! post
    $post = trim(filter_input(INPUT_POST, 'post', FILTER_SANITIZE_SPECIAL_CHARS));

    $emoji_list = array('😀', '😁', '😂', '😅', '😘', '😳', '🤭', '🤧', '🤓', '🤠', '😷');
    $replace = array('&#128512', '&#128513', '&#128514', '&#128517', '&#128536', '&#128567', '&#129325', '&#129319', '&#129299', '&#129312', '&#128567');
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
        }
    }
}

//! include
include(dirname(__FILE__) . '/../views/templates/header.php');
include(dirname(__FILE__) . '/../views/actuality.php');
include(dirname(__FILE__) . '/../views/templates/footer.php');
