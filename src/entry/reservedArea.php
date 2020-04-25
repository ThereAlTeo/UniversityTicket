<?php
require_once './../bootFiles.php';

$templateParams["title"] = "Admin - Area Riservata";
$templateParams["menu"] = "reservedMenu.php";
$templateParams["menuIndex"] = 0;
$templateParams["main"] = "reservedAreaDashboard.php";
$templateParams["navbar"] = "navbarFactory.php";
$templateParams["footer"] = "footer.php";
$templateParams["templateType"] = "dashboard.php";
array_unshift($config["DEFAULTJS"], "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js");
$templateParams["js"] = array(JS_DIR."Chart.js");
$templateParams["scriptPlus"] = array("chartPie.php", "chartArea.php");

if(isset($_SESSION["accountLog"]))
     require TEMPLATE_DIR.'ticketTemplate.php';
else
     header("Location: login.php");
?>
