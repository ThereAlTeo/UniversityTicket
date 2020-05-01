<?php
require_once './../bootFiles.php';

if (!isset($_GET["IDLocation"]))
    header("Location: bacheca.php");

$templateParams["title"] = "University Ticket";
$templateParams["header"] = "header.php";
$templateParams["main"] = "locationEventMain.php";
$templateParams["navbar"] = "navbar.php";
$templateParams["jumbotron"] = "homeJumbotron.php";
$templateParams["footer"] = "footer.php";
$templateParams["templateType"] = "common.php";

array_push($config["DEFAULTJS"], JS_DIR."searchInput.js");
array_unshift($config["HEADJS"], "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js");

require TEMPLATE_DIR.'ticketTemplate.php';
?>
