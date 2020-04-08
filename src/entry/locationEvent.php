<?php
require_once './../bootFiles.php';

if (!isset($_GET["IDLocation"]))
    header("Location: bacheca.php");

//Base Template
$templateParams["title"] = "University Ticket";
$templateParams["header"] = "header.php";
$templateParams["main"] = "locationEventMain.php";
$templateParams["navbar"] = "navbar.php";
$templateParams["jumbotron"] = "homeJumbotron.php";
$templateParams["footer"] = "footer.php";
$templateParams["templateType"] = "C";
array_unshift($config["DEFAULTJS"], "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js");
$templateParams["js"] = array(JS_DIR."searchInput.js");

require TEMPLATE_DIR.'ticketTemplate.php';
?>
