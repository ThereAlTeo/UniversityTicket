<?php
require_once './../bootFiles.php';

if(!(isset($_COOKIE["checkout"]) && getNumticketInOrder(unserialize($_COOKIE["checkout"]))))
    header("Location: bacheca.php");

$templateParams["title"] = "University Ticket";
$templateParams["header"] = "header.php";
$_GET["login"] = "ORDINE SICURO";
$templateParams["checkoutTitle"] = "pagamento";
//$templateParams["main"] = "delivery.php";
$templateParams["summary"] = "defaultSummary.php";
$templateParams["footer"] = "footer.php";
$templateParams["templateType"] = "checkoutTemplate.php";
array_unshift($config["DEFAULTJS"], "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js");
//$templateParams["js"] = array(JS_DIR."delivery.js");

require TEMPLATE_DIR.'ticketTemplate.php';
?>
