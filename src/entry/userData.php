<?php
require_once './../bootFiles.php';
//Base Template
$templateParams["title"] = "Admin - Area Riservata";
$templateParams["header"] = "header.php";
$_GET["login"] = "AREA RISERVATA";
$templateParams["main"] = "userDataMain.php";
$templateParams["navbar"] = "navbarReservedArea.php";
$templateParams["footer"] = "footer.php";
$templateParams["js"] = array(JS_DIR."jquery-3.4.1.min.js", "https://cdn.jsdelivr.net/npm/sweetalert2@9", "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js", "https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js", "https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js", JS_DIR."userDataTable.js", JS_DIR."enableUser.js");

if(isset($_SESSION["accountLog"]) && $_SESSION["accountLog"][1] == 1)
     require TEMPLATE_DIR.'ticketTemplate.php';
else
     header("Location: logout.php");
?>
