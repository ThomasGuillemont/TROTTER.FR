<?php
//! require_once
require_once(dirname(__FILE__) . '/../helpers/sessionFlash.php');

//! logout
session_start();
$_SESSION = array();
session_destroy();
unset($_SESSION);
header('location: /accueil');
die();
