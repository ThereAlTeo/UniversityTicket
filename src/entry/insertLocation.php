<?php
require_once './../bootFiles.php';

$templateParams["title"] = "Admin - Area Riservata";
$templateParams["menu"] = "reservedMenu.php";
$templateParams["menuIndex"] = 1;
$templateParams["main"] = "insertLocationMain.php";
$templateParams["navbar"] = "navbarFactory.php";
$templateParams["footer"] = "footer.php";
$templateParams["templateType"] = "dashboard.php";

array_push($config["DEFAULTJS"], JS_DIR."userDataTable.js", JS_DIR."locationAction.js");
array_push($config["HEADJS"], "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js", "https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js",
                              "https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js");

if(isset($_SESSION["accountLog"]) && $_SESSION["accountLog"]["IDAccesso"] == 1)
     require TEMPLATE_DIR.'ticketTemplate.php';
else
     header("Location: logout.php");
?>
