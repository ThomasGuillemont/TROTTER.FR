<?php

//! require_once
require_once(dirname(__FILE__) . '/../utils/init.php');
require_once(dirname(__FILE__) . '/../models/Post.php');

//! Post::getAll($limit, $offset)
$listposts = Post::getAll(0, LIMIT);

$result = [
    'user' => $_SESSION['user'] ?? null,
    'data' => $listposts
];
echo json_encode($result);
