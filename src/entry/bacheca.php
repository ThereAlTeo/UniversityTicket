<?php
require_once './../bootFiles.php';
//Base Template
$templateParams["title"] = "University Ticket";
$templateParams["header"] = "header.php";
$templateParams["main"] = "homeBacheca.php";
$templateParams["navbar"] = "navbar.php";
$templateParams["footer"] = "footer.php";
$templateParams["templateType"] = "C";
$templateParams["js"] = array(JS_DIR."jquery-1.11.3.min.js", "https://code.jquery.com/jquery-3.2.1.slim.min.js", "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js", "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js");

require TEMPLATE_DIR.'ticketTemplate.php';
?>
