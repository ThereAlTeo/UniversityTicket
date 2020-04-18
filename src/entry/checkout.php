<?php
require_once './../bootFiles.php';

if(!(isset($_COOKIE["checkout"]) && getNumticketInOrder(unserialize($_COOKIE["checkout"]))))
    header("Location: bacheca.php");

$templateParams["title"] = "University Ticket";
$templateParams["header"] = "header.php";
$_GET["login"] = "ORDINE SICURO";
$templateParams["main"] = "checkout.php";
$templateParams["summary"] = "defaultSummary.php";
$templateParams["footer"] = "footer.php";
$templateParams["templateType"] = "checkoutTemplate.php";
array_unshift($config["DEFAULTJS"], "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js");
$templateParams["js"] = array(JS_DIR."checkout.js");

$ticket = unserialize($_COOKIE["checkout"]);
//inserire anche $ticketGeneralInfo in cookie o SESSIOn
$ticketGeneralInfo = array();
$ticketFinalPrice = array("SubTotal" => 0);

foreach ($ticket as $key => $value) {
    $temp = $dbh->getGeneralInfoByIDEvent($key);
    if(count($temp)){
        $ticketEventInfo = array("IDEvent" => $temp[0]["IDEvento"], "Title" => $temp[0]["Titolo"], "Image" => getPathImageOrDefault($temp[0]),
                                 "IDArtist" => $temp[0]["IDArtista"], "LocationName" => $temp[0]["Nome"], "Date" => getLongDateFormat($temp[0]["DataInizio"]),
                                 "ManagerMail" => $temp[0]["Email"], "Sector" => array());
        foreach ($value as $section)
            $ticketEventInfo["Sector"] = array_merge($ticketEventInfo["Sector"], $dbh->getTicketInfoPrice($key, $section["IDSector"], $section["QNT"]));

        array_push($ticketGeneralInfo, $ticketEventInfo);
    }
}

foreach ($ticketGeneralInfo as $key => $value) {
    foreach ($value["Sector"] as $index => $item) {
        $ticketFinalPrice["SubTotal"] += $item["Price"];
    }
}

$ticketFinalPrice["Prevendita"] = $ticketFinalPrice["SubTotal"] * RATE_PREVENDITA;

require TEMPLATE_DIR.'ticketTemplate.php';
?>
