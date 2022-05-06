<?php

//! require_once
require_once(dirname(__FILE__) . '/../utils/init.php');

//! redirect
$idGet = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
$id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
if (empty($_SESSION['user']) && !isset($_SESSION['user']) || $_SESSION['user']->id != $id) {
    header('location: /accueil');
    die;
}

//! include
include(dirname(__FILE__) . '/../views/templates/header.php');
include(dirname(__FILE__) . '/../views/friends.php');
include(dirname(__FILE__) . '/../views/templates/footer.php');
