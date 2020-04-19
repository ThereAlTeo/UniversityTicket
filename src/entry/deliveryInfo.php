<?php
require_once './../bootFiles.php';

if(!(isset($_COOKIE["checkout"]) && getNumticketInOrder(unserialize($_COOKIE["checkout"]))))
    header("Location: bacheca.php");

if (!isset($_SESSION["accountLog"]))
    header("Location: login.php?next=deliveryInfo");

$templateParams["title"] = "University Ticket";
$templateParams["header"] = "header.php";
$_GET["login"] = "ORDINE SICURO";
$templateParams["checkoutTitle"] = "Consegna";
$templateParams["main"] = "delivery.php";
$templateParams["summary"] = "defaultSummary.php";
$templateParams["footer"] = "footer.php";
$templateParams["templateType"] = "checkoutTemplate.php";
array_unshift($config["DEFAULTJS"], "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js");
$templateParams["js"] = array(JS_DIR."delivery.js");
require TEMPLATE_DIR.'ticketTemplate.php';
?>
