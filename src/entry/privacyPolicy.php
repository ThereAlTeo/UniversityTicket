<?php
require_once './../bootFiles.php';

$templateParams["title"] = "Cookie Polocy - University Ticket";
$templateParams["header"] = "header.php";
$templateParams["main"] = "privacyPolicy.php";
$templateParams["footer"] = "footer.php";
$templateParams["templateType"] = "common.php";

require TEMPLATE_DIR.'ticketTemplate.php';
?>
