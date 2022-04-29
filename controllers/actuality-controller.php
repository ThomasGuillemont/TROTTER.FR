<?php

//! session_start();
session_start();

//! redirect
if (empty($_SESSION['id_user']) && !isset($_SESSION['id_user'])) {
    header('location: /accueil');
    die;
}

//! require_once
require_once(dirname(__FILE__) . '/../models/post.php');

//! include
include(dirname(__FILE__) . '/../views/templates/header.php');
include(dirname(__FILE__) . '/../views/actuality.php');
include(dirname(__FILE__) . '/../views/templates/footer.php');
