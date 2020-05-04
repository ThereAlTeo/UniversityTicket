<?php
require_once './../bootFiles.php';

$templateParams["title"] = "Admin - Area Riservata";
$templateParams["menu"] = "reservedMenu.php";
$templateParams["navbar"] = "navbarFactory.php";
$templateParams["footer"] = "footer.php";
$templateParams["templateType"] = "dashboard.php";

if (!isset($_SESSION["accountLog"])) {
    header("Location: login.php");
    exit();
} elseif ($_SESSION["accountLog"]["IDAccesso"] < 3) {
    $templateParams["menuIndex"] = 3;
    //$templateParams["main"] = "reservedAreaDashboard.php";
} else {
    $templateParams["menuIndex"] = 1;
}

array_unshift($config["HEADJS"], "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js");

require TEMPLATE_DIR.'ticketTemplate.php';
?>
