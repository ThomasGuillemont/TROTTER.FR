<?php

//! require once
require_once(dirname(__FILE__) . '/../utils/init.php');
require_once(dirname(__FILE__) . '/../config/config.php');
require_once(dirname(__FILE__) . '/../models/User.php');
require_once(dirname(__FILE__) . '/../models/Post.php');

//! redirect
if (empty($_SESSION['user']) && !isset($_SESSION['user'])) {
    header('location: /profil?id=' . $_SESSION['user']->id);
    die;
}

//! INPUT_GET ID
$id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));

//! Post::getOneById($id)
$postById = Post::getOneById($id);
if ($postById instanceof PDOException) {
    $message = $postById->getMessage();
}

if (empty($message)) {
    //! redirect
    if ($_SESSION['user']->id != $postById->id_user) {
        header('location: /accueil');
        die;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //! post
        $post = trim(filter_input(INPUT_POST, 'post', FILTER_SANITIZE_SPECIAL_CHARS));

        $emoji_list = array('😀', '😁', '😂', '😅', '😘', '😳', '🤭', '🤧', '🤓', '🤠', '😷');
        $replace = array('&#128512', '&#128513', '&#128514', '&#128517', '&#128536', '&#128567', '&#129325', '&#129319', '&#129299', '&#129312', '&#128567');
        $post = str_replace($emoji_list, $replace, $post);

        if (empty($post)) {
            $error['noPostError'] = 'noPostError';
        } else {
            $post = filter_var($post, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^" . SEARCH . "$/")));
            if ($post === false) {
                $error['noPostError'] = 'noPostError';
            }
        }

        //! $post->add()
        if (empty($error)) {
            //! Post::update($id)
            $postUpdate = new Post();
            $postUpdate->setId($postById->id);
            $postUpdate->setPost($post);
            $postUpdate = $postUpdate->update();

            //! message success or error
            if ($postUpdate === false) {
                $message = 'Une erreur est survenue';
            } else {
                header('location: /actualites');
                die;
            }
        }
    }
}

//! include
include(dirname(__FILE__) . '/../views/templates/header.php');
include(dirname(__FILE__) . '/../views/update-post.php');
include(dirname(__FILE__) . '/../views/templates/footer.php');
