<?php

//! session_start();
session_start();

//! require once
require_once(dirname(__FILE__) . '/../models/user.php');
require_once(dirname(__FILE__) . '/../models/post.php');
require_once(dirname(__FILE__) . '/../config/offset.php');
require_once(dirname(__FILE__) . '/../config/regex.php');

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
//! first post
$limit = ($currentPage * $offset) - $offset;

//! Post::getAll($limit, $offset)
$listPost = Post::getAll($limit, $offset);
if ($listPost instanceof PDOException) {
    $message = $post->getMessage();
}

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
    $listPosts = Post::getAll($limit, $offset, $search);
    if ($listPosts instanceof PDOException) {
        $message = $post->getMessage();
    }
}

//! include
include(dirname(__FILE__) . '/../views/templates/header.php');
include(dirname(__FILE__) . '/../views/dashboard-post.php');
include(dirname(__FILE__) . '/../views/templates/footer.php');
