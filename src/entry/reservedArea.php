<?php
require_once './../bootFiles.php';

$templateParams["title"] = "Admin - Area Riservata";
$templateParams["menu"] = "reservedMenu.php";
$templateParams["menuIndex"] = 0;
$templateParams["main"] = "reservedAreaDashboard.php";
$templateParams["navbar"] = "navbarFactory.php";
$templateParams["footer"] = "footer.php";
$templateParams["templateType"] = "dashboard.php";

if (!isset($_SESSION["accountLog"])) {
    header("Location: login.php");
    exit();
}

if ($_SESSION["accountLog"]["IDAccesso"] < 3) {
    $templateParams["scriptPlus"] = array("chartPie.php", "chartArea.php");
    array_push($config["DEFAULTJS"], JS_DIR."Chart.js");
} else {
    array_push($config["DEFAULTJS"], JS_DIR."userDataTable.js");
    array_push($config["HEADJS"], "https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js", "https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js");
}

array_push($config["DEFAULTJS"], JS_DIR."reservedUserData.js");
array_unshift($config["HEADJS"], "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js");

require TEMPLATE_DIR.'ticketTemplate.php';
?>
