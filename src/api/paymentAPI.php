<?php
require_once './../bootFiles.php';

function checkSoldOutSector($IDEvent, $IDSector) {
    if(intval($dbh->getSectoTicketSold($IDEvent, $IDSector)) == intval($dbh->getSectoTotalTicket($IDEvent, $IDSector)))
        $notificationManager->sectorSoldOut($IDEvent, $IDSector);
}

function checkSoldOutEvent($IDEvent) {
    if(intval($dbh->getEventTicketSold($IDEvent)) == intval($dbh->getEventTotalTicket($IDEvent)))
        $notificationManager->eventSoldOut($IDEvent);
}

$msg = array();
try {
    $payment = substr($_POST['IDPayment'], -1);
    $totPrice = $_SESSION["ticketFinalPrice"]["SubTotal"] + $_SESSION["ticketFinalPrice"]["Prevendita"] + $_SESSION["ticketDelivery"]["Prezzo"];
    $IDAcquisto = $dbh->insertAcquisto($payment, $_SESSION["ticketDelivery"]["IDDelivery"], $_SESSION["accountLog"]["IDUser"], $totPrice);
    foreach ($_SESSION["ticketGeneralInfo"] as $key => $value) {
        foreach ($value["Sector"] as $index => $item) {
            $matricola = $value["IDLocation"]."-".$item["IDSector"]."-".$value["IDEvent"]."-".$item["Seat"];
            $dbh->insertTicket($matricola, $item["IDSector"], $value["IDLocation"], $value["IDEvent"]);
            if(!$dbh->insertAcquistoMultiplo($matricola, $IDAcquisto))
                throw new Exception("Error Processing Request", 1);

            checkSoldOutSector($value["IDEvent"], $item["IDSector"]);
        }
        checkSoldOutEvent($value["IDEvent"]);
    }

    setcookie("checkout", null, time() - 3600, "/");
    $msg = array("success"=> "successo");
} catch (Exception $e) {
    $msg = array("error"=>"Ci scusiamo, ma ci sono stati degli errori durante l'elaborazione della richiesta.");
}

echo json_encode($msg);
die;
?>
