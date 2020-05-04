<?php
require_once './../bootFiles.php';
//Base Template
$templateParams["title"] = "Admin - Area Riservata";
$templateParams["menu"] = "reservedMenu.php";
$templateParams["menuIndex"] = 2;
$templateParams["main"] = "userDataMain.php";
$templateParams["navbar"] = "navbarFactory.php";
$templateParams["footer"] = "footer.php";
$templateParams["templateType"] = "dashboard.php";


array_push($config["DEFAULTJS"], JS_DIR."userDataTable.js", JS_DIR."enableUser.js");
array_push($config["HEADJS"], "https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js", "https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js");

if(isset($_SESSION["accountLog"]) && $_SESSION["accountLog"]["IDAccesso"] == 1)
     require TEMPLATE_DIR.'ticketTemplate.php';
else
     header("Location: logout.php");
?>
