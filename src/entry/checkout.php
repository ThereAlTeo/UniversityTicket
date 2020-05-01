<?php
require_once './../bootFiles.php';

if(!(isset($_COOKIE["checkout"]) && getNumticketInOrder(unserialize($_COOKIE["checkout"]))))
    header("Location: bacheca.php");

$templateParams["title"] = "University Ticket";
$templateParams["header"] = "header.php";
$_GET["login"] = "ORDINE SICURO";
$templateParams["checkoutTitle"] = "Carrello";
$templateParams["main"] = "checkout.php";
$templateParams["summary"] = "checkoutSummary.php";
$templateParams["footer"] = "footer.php";
$templateParams["templateType"] = "checkoutTemplate.php";

array_push($config["DEFAULTJS"], JS_DIR."checkout.js");
array_unshift($config["HEADJS"], "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js");

$ticket = unserialize($_COOKIE["checkout"]);
if(isset($_SESSION["ticketDelivery"]))
    unset($_SESSION["ticketDelivery"]);
if(isset($_SESSION["ticketDeliveryStreet"]))
    unset($_SESSION["ticketDeliveryStreet"]);
$_SESSION["ticketGeneralInfo"] = array();
$_SESSION["ticketFinalPrice"] = array("SubTotal" => 0);

foreach ($ticket as $key => $value) {
    $temp = $dbh->getGeneralInfoByIDEvent($key);
    if(count($temp)){
        $ticketEventInfo = array("IDEvent" => $temp[0]["IDEvento"], "Title" => $temp[0]["Titolo"], "Image" => getPathImageOrDefault($temp[0]),
                                 "IDArtist" => $temp[0]["IDArtista"], "IDLocation" => $temp[0]["IDLocation"], "LocationName" => $temp[0]["Nome"],
                                 "Date" => getLongDateFormat($temp[0]["DataInizio"]), "ManagerMail" => $temp[0]["Email"], "Sector" => array());
        foreach ($value as $section)
            $ticketEventInfo["Sector"] = array_merge($ticketEventInfo["Sector"], $dbh->getTicketInfoPrice($key, $section["IDSector"], $section["QNT"]));

        array_push($_SESSION["ticketGeneralInfo"], $ticketEventInfo);
    }
}

foreach ($_SESSION["ticketGeneralInfo"] as $key => $value) {
    foreach ($value["Sector"] as $index => $item) {
        $_SESSION["ticketFinalPrice"]["SubTotal"] += $item["Price"];
    }
}

$_SESSION["ticketFinalPrice"]["Prevendita"] = $_SESSION["ticketFinalPrice"]["SubTotal"] * RATE_PREVENDITA;

require TEMPLATE_DIR.'ticketTemplate.php';
?>
