<?php

//! session_start();
session_start();

//! redirect
$idGet = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
$idSession = intval($_SESSION['id_user']);
if (empty($_SESSION['id_user']) && !isset($_SESSION['id_user']) || $idSession != $idGet) {
    header('location: /accueil');
    die;
}

//! include
include(dirname(__FILE__) . '/../views/templates/header.php');
include(dirname(__FILE__) . '/../views/friends.php');
include(dirname(__FILE__) . '/../views/templates/footer.php');
