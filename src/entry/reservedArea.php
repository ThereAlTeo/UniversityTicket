<?php
require_once './../bootFiles.php';

$templateParams["title"] = "Admin - Area Riservata";
$templateParams["menu"] = "reservedMenu.php";
$templateParams["menuIndex"] = 0;
$templateParams["main"] = "reservedAreaDashboard.php";
$templateParams["navbar"] = "navbarFactory.php";
$templateParams["footer"] = "footer.php";
$templateParams["templateType"] = "dashboard.php";
$templateParams["js"] = array(JS_DIR."Chart.js", "https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js");
$templateParams["scriptPlus"] = array("chartPie.php", "chartArea.php");

if(isset($_SESSION["accountLog"]))
     require TEMPLATE_DIR.'ticketTemplate.php';
else
     header("Location: login.php");
?>
