<?php
require_once './../bootFiles.php';

if(!(isset($_COOKIE["checkout"]) && getNumticketInOrder(unserialize($_COOKIE["checkout"]))))
    header("Location: bacheca.php");

$templateParams["title"] = "University Ticket";
$templateParams["header"] = "header.php";
$_GET["login"] = "ORDINE SICURO";
$templateParams["checkoutTitle"] = "pagamento";
$templateParams["main"] = "payment.php";
$templateParams["summary"] = "defaultSummary.php";
$templateParams["footer"] = "footer.php";
$templateParams["templateType"] = "checkoutTemplate.php";

array_push($config["DEFAULTJS"], JS_DIR."payment.js");
array_unshift($config["HEADJS"], "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js");

require TEMPLATE_DIR.'ticketTemplate.php';
?>
