<?php
require_once './../bootFiles.php';

$templateParams["title"] = "Login - Safety Mode";
$templateParams["header"] = "header.php";
$_GET["login"] = "ACCESSO CONTROLLATO";
$templateParams["action"] = isset($_GET["next"]) ? $_GET["next"] : "reservedArea";
$templateParams["main"] = "loginPrime.php";
$templateParams["templateType"] = "common.php";

array_push($config["DEFAULTJS"], JS_DIR."loginAction.js");

if(isset($_SESSION["accountLog"]))
     header("Location: reservedArea.php");
else
     require TEMPLATE_DIR.'ticketTemplate.php';
?>
