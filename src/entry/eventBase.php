<?php
require_once './../bootFiles.php';

$templateParams["title"] = "Admin - Area Riservata";
$templateParams["menu"] = "reservedMenu.php";
$templateParams["menuIndex"] = 1;
$templateParams["main"] = "eventMain.php";
$templateParams["navbar"] = "navbarFactory.php";
$templateParams["footer"] = "footer.php";
$templateParams["templateType"] = "dashboard.php";

array_push($config["DEFAULTJS"], JS_DIR."userDataTable.js", JS_DIR."modal.js", JS_DIR."event.js");
array_push($config["HEADJS"], "https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/js/select2.min.js", "https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js",
                              "https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js", "https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js",
                              "https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js");

array_push($config["CSS"], "https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/css/select2.min.css", "https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css");
if(isset($_SESSION["accountLog"]) && $_SESSION["accountLog"]["IDAccesso"] == 2)
     require TEMPLATE_DIR.'ticketTemplate.php';
else
     header("Location: logout.php");
?>
