<?php
require_once './../bootFiles.php';
//Base Template
$templateParams["title"] = "University Ticket";
$templateParams["header"] = "header.php";
$templateParams["main"] = "sectionMain.php";
$templateParams["navbar"] = "navbar.php";
$templateParams["footer"] = "footer.php";
$templateParams["jumbotron"] = "homeJumbotron.php";
$templateParams["templateType"] = "C";
array_unshift($config["DEFAULTJS"], "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js");

require TEMPLATE_DIR.'ticketTemplate.php';
?>
