<?php
require_once './../bootFiles.php';
//Base Template
$templateParams["title"] = "Admin - Area Riservata";
$templateParams["header"] = "header.php";
$_GET["login"] = "AREA RISERVATA";
$templateParams["main"] = "eventMain.php";
$templateParams["navbar"] = "navbarReservedArea.php";
$templateParams["footer"] = "footer.php";
$templateParams["js"] = array(JS_DIR."jquery-3.4.1.min.js", "https://cdn.jsdelivr.net/npm/sweetalert2@9", "https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js", "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js", JS_DIR."userDataTable.js", JS_DIR."event.js");

if(isset($_SESSION["accountLog"]) && $_SESSION["accountLog"][1] == 2)
     require TEMPLATE_DIR.'ticketTemplate.php';
else
     header("Location: logout.php");
?>
