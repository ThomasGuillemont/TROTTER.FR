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

//! include
include(dirname(__FILE__) . '/../views/templates/header.php');
include(dirname(__FILE__) . '/../views/actuality.php');
include(dirname(__FILE__) . '/../views/templates/footer.php');
