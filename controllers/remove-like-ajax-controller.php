<?php

//! require_once
require_once(dirname(__FILE__) . '/../utils/init.php');
require_once(dirname(__FILE__) . '/../models/Post.php');
require_once(dirname(__FILE__) . '/../models/Like.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //! id_post
    $id_post = $_POST['id_post'];

    //! id_user
    $id_user = intval($_SESSION['user']->id);

    //! Like::delete($id_post, $id_user)
    $unlike = Like::delete($id_post, $id_user);
}

//! include
include(dirname(__FILE__) . '/../views/templates/header.php');
include(dirname(__FILE__) . '/../views/actuality.php');
include(dirname(__FILE__) . '/../views/templates/footer.php');
