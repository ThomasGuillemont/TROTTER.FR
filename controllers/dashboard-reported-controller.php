<?php

//! require once
require_once(dirname(__FILE__) . '/../utils/init.php');
require_once(dirname(__FILE__) . '/../models/Reported.php');

//! redirect
if ($_SESSION['user']->id_roles != 1) {
    header('location: /accueil');
    die;
}

//! what is the page
if (isset($_GET['page']) && !empty($_GET['page'])) {
    $currentPage = intval(filter_input(INPUT_GET, 'page', FILTER_SANITIZE_NUMBER_INT));
} else {
    $currentPage = 1;
}
//! number of reported
$reportedCount = Reported::count();
$reportedCount = intval($reportedCount);
//! total pages
$pages = intval(ceil($reportedCount / LIMIT));
//! first reported
$offset = ($currentPage * LIMIT) - LIMIT;

//! Reported::getAll($offset, LIMIT)
$listReported = Reported::getAll($offset, LIMIT);
if ($listReported instanceof PDOException) {
    $message = $listReported->getMessage();
}

if (isset($_GET['search']) && !empty($_GET['search'])) {
    //! initialize errors
    $error = [];

    //! control search
    $search = trim(filter_input(INPUT_GET, 'search', FILTER_SANITIZE_SPECIAL_CHARS));
    if (!empty($search)) {
        $searchValid = filter_var($search, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^" . SEARCH . "$/")));
        if ($searchValid === false) {
            $error['search'] = 'Veuillez vérifier le format de votre mot clé';
        }
    }

    //! Reported::getAll($offset, $userCount, $search)
    $listReported = Reported::getAll($offset, $reportedCount, $search);
    if ($listReported instanceof PDOException) {
        $message = $listReported->getMessage();
    }
}

//! include
include(dirname(__FILE__) . '/../views/templates/header.php');
include(dirname(__FILE__) . '/../views/dashboard-reported.php');
include(dirname(__FILE__) . '/../views/templates/footer.php');
