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
    $templateParams["main"] = "reviewManager.php";
} else {
    $templateParams["menuIndex"] = 1;
    $templateParams["main"] = "reviewUser.php";
}

array_push($config["DEFAULTJS"], JS_DIR."review.js");
array_push($config["HEADJS"], "https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/js/select2.min.js");
array_push($config["CSS"], "https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/css/select2.min.css");
array_unshift($config["HEADJS"], "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js");

require TEMPLATE_DIR.'ticketTemplate.php';
?>
