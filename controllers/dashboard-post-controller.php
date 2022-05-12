<?php

//! require once
require_once(dirname(__FILE__) . '/../utils/init.php');
require_once(dirname(__FILE__) . '/../models/User.php');
require_once(dirname(__FILE__) . '/../models/Post.php');
require_once(dirname(__FILE__) . '/../config/constants.php');

//! redirect
if ($_SESSION['user']->id_roles != 1) {
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
//! number of patients per page
$offset = LIMIT;
//! total pages
$pages = intval(ceil($postCount / $offset));
//! first post
$limit = ($currentPage * $offset) - $offset;

if (isset($_GET['search']) && !empty($_GET['search'])) {
    //! initialize errors
    $error = [];

    //! control search
    $search = trim(filter_input(INPUT_GET, 'search', FILTER_SANITIZE_SPECIAL_CHARS));
    if (!empty($search)) {
        $searchValid = filter_var($search, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^" . SEARCH . "$/")));
        if ($searchValid === false) {
            $error['search'] = 'Veuillez vérifier le format de votre mot clé';
        }
    }

    //! $post->search()
    $listPosts = Post::getAll($limit, $postCount, $search)[0];
    if ($listPosts instanceof PDOException) {
        $message = $listPosts->getMessage();
    }
} else {
    //! Post::getAll($limit, $offset)
    $listPosts = Post::getAll($limit, $offset)[0];
    if ($listPosts instanceof PDOException) {
        $message = $listPosts->getMessage();
    }
}

//! include
include(dirname(__FILE__) . '/../views/templates/header.php');
include(dirname(__FILE__) . '/../views/dashboard-post.php');
include(dirname(__FILE__) . '/../views/templates/footer.php');
