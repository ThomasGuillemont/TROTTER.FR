<?php

//! require_once
require_once(dirname(__FILE__) . '/../config/offset.php');
require_once(dirname(__FILE__) . '/../models/Post.php');

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
$offset = LIMIT;
//! total pages
$pages = ceil($postCount / $offset);
//! first post
$limit = ($currentPage * $offset) - $offset;

//! Post::getAll($limit, $offset)
$listposts = Post::getAll($limit, $offset);

echo json_encode($listposts);
