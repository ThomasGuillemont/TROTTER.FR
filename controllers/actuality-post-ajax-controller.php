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

    if (!empty($post)) {
        $post = filter_var($post, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^" . SEARCH . "$/")));
        if ($post === false) {
            $error['post'] = 'Le post ne respect pas les règles de formatage';
        }

        //! $post->add()
        if (empty($error)) {
            $post = new Post($post_at, $post, $id_user);
            $post = $post->add();

            //! message success or error
            if ($post === false) {
                $message = 'Une erreur est survenue';
            } else {
                $result = [
                    'post_at' => $post_at,
                    'id_user' => $id_user,
                    'post' => $post,
                ];
                echo json_encode(["code" => true, "result" => $result]);
            }
        }
    }
}
