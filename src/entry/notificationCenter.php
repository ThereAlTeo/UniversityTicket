<?php
    //Lettura dei messaggi da abilitare
require_once './../bootFiles.php';

$templateParams["title"] = "Admin - Area Riservata";
$templateParams["menu"] = "reservedMenu.php";
$templateParams["menuIndex"] = -1;
$templateParams["main"] = "notificationMain.php";
$templateParams["navbar"] = "navbarFactory.php";
$templateParams["footer"] = "footer.php";
$templateParams["templateType"] = "dashboard.php";

if(isset($_SESSION["accountLog"]))
     require TEMPLATE_DIR.'ticketTemplate.php';
else
     header("Location: login.php");
?>
