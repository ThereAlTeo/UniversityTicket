<?php
require_once './../bootFiles.php';
//Base Template
$templateParams["title"] = "Admin - Area Riservata";
$templateParams["header"] = "header.php";
$_GET["login"] = "AREA RISERVATA";
$templateParams["main"] = "homeReservedArea.php";
$templateParams["navbar"] = "navbarReservedArea.php";
$templateParams["footer"] = "footer.php";
$templateParams["js"] = array(JS_DIR."jquery-3.4.1.min.js", "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js");

if(isset($_SESSION["accountLog"]))
     require TEMPLATE_DIR.'ticketTemplate.php';
else
     header("Location: login.php");

?>
