<?php

//! session_start();
session_start();

//! require_once
require_once(dirname(__FILE__) . '/../helpers/sessionFlash.php');

//! include
include(dirname(__FILE__) . '/../views/templates/header.php');
include(dirname(__FILE__) . '/../views/home.php');
include(dirname(__FILE__) . '/../views/templates/footer.php');
