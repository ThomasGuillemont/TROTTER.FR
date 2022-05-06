<?php

//! logout
session_start();
$_SESSION = array();
session_destroy();
header('location: /accueil');
die();
