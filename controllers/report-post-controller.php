<?php

//! require once
require_once(dirname(__FILE__) . '/../utils/init.php');
require_once(dirname(__FILE__) . '/../config/constants.php');
require_once(dirname(__FILE__) . '/../models/Reported.php');
require_once(dirname(__FILE__) . '/../models/Post.php');
require_once(dirname(__FILE__) . '/../helpers/sessionFlash.php');

//! redirect
if (empty($_SESSION['user']) && !isset($_SESSION['user'])) {
    header('location: /profil?id=' . $_SESSION['user']->id);
    die;
}

//! INPUT_GET ID
$id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));

//! Post::getOneById($id)
$post = Post::getOneById($id);
if ($post instanceof PDOException) {
    $message = $post->getMessage();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //! reported_at
    $date = new DateTime('', new DateTimeZone('Europe/Paris'));
    $reported_at = $date->format('Y-m-d H:i:s');

    //! message
    $message = trim(filter_input(INPUT_POST, 'reportMessage', FILTER_SANITIZE_SPECIAL_CHARS));
    if (empty($message)) {
        $error['reportMessage'] = 'Vous devez entrer un message';
    } else {
        $message = filter_var($message, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^" . SEARCH . "$/")));
        if ($message === false) {
            $error['reportMessage'] = 'Veuillez entrer un message valide';
        }
    }

    //! id_post
    $id_posts = intval(filter_input(INPUT_POST, 'idPost', FILTER_SANITIZE_NUMBER_INT));

    //! $reported->add()
    if (empty($error)) {
        $reported = new Reported($reported_at, $message, $id_posts, intval($_SESSION['user']->id));
        $reported = $reported->add();

        //! message success or error
        if ($postReport === false) {
            $message = 'Une erreur est survenue';
        } else {
            SessionFlash::set('Le post a été signalé avec succès !');
            header('location: /actualités');
            die;
        }
    }
}

//! include
include(dirname(__FILE__) . '/../views/templates/header.php');
include(dirname(__FILE__) . '/../views/report-post.php');
include(dirname(__FILE__) . '/../views/templates/footer.php');
