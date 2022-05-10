<?php

//! require_once
require_once(dirname(__FILE__) . '/../config/constants.php');
require_once(dirname(__FILE__) . '/../models/Post.php');

//! Post::getAll($limit, $offset)
$listposts = Post::getAll(0, LIMIT);

echo json_encode($listposts);
