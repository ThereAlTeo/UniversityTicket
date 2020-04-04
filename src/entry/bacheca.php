<?php
require_once './../bootFiles.php';
//Base Template
$templateParams["title"] = "University Ticket";
$templateParams["header"] = "header.php";
$templateParams["main"] = "homeBacheca.php";
$templateParams["navbar"] = "navbar.php";
$templateParams["footer"] = "footer.php";
$templateParams["jumbotron"] = "homeJumbotron.php";
$templateParams["templateType"] = "C";
$templateParams["js"] = array("https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js", JS_DIR."searchInput.js");

require TEMPLATE_DIR.'ticketTemplate.php';
?>
