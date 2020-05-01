<?php
require_once './../bootFiles.php';

if(!(isset($_GET["IDEvent"]) && $dbh->exisitEvent($_GET["IDEvent"]))){
    header("Location: bacheca.php");
    exit();
}

$templateParams["title"] = "University Ticket";
$templateParams["header"] = "header.php";
$templateParams["main"] = "singleEvent.php";
$templateParams["navbar"] = "navbar.php";
$templateParams["footer"] = "footer.php";
$templateParams["jumbotron"] = "homeJumbotron.php";
$templateParams["templateType"] = "common.php";

array_push($config["DEFAULTJS"], JS_DIR."searchInput.js", JS_DIR."insertCheckout.js");
array_unshift($config["HEADJS"], "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js");

require TEMPLATE_DIR.'ticketTemplate.php';
?>
