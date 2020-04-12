<?php
require_once './../bootFiles.php';
//Base Template
$templateParams["title"] = "University Ticket";
$templateParams["header"] = "header.php";
$templateParams["main"] = "homeBacheca.php";
$templateParams["navbar"] = "navbar.php";
$templateParams["footer"] = "footer.php";
$templateParams["jumbotron"] = "homeJumbotron.php";
$templateParams["templateType"] = "common.php";
array_unshift($config["DEFAULTJS"], "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js");
$templateParams["js"] = array(JS_DIR."searchInput.js");

require TEMPLATE_DIR.'ticketTemplate.php';
?>
