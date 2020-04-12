<?php
require_once './../bootFiles.php';

$templateParams["title"] = "Login - Safety Mode";
$templateParams["header"] = "header.php";
$_GET["login"] = "ACCESSO CONTROLLATO";
$templateParams["main"] = "loginPrime.php";
$templateParams["templateType"] = "common.php";
$templateParams["js"] = array(JS_DIR."loginAction.js");

if(isset($_SESSION["accountLog"]))
     header("Location: reservedArea.php");
else
     require TEMPLATE_DIR.'ticketTemplate.php';
?>
