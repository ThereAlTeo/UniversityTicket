<?php
require_once './../bootFiles.php';
$msg = array();
try {
    $payment = substr($_POST['IDPayment'], -1);
    $totPrice = $_SESSION["ticketFinalPrice"]["SubTotal"] + $_SESSION["ticketFinalPrice"]["Prevendita"] + $_SESSION["ticketDelivery"]["Prezzo"];
    $IDAcquisto = $dbh->insertAcquisto($payment, $_SESSION["ticketDelivery"]["IDDelivery"], $_SESSION["accountLog"]["IDUser"], $totPrice);
    foreach ($_SESSION["ticketGeneralInfo"] as $key => $value) {
        foreach ($value["Sector"] as $index => $item) {
            $matricola = $payment = $value["IDLocation"]."-".$item["IDSector"]."-".$value["IDEvent"]."-".$item["Seat"];
            $dbh->insertTicket($matricola, $item["IDSector"], $value["IDLocation"], $value["IDEvent"]);
            if(!$dbh->insertAcquistoMultiplo($matricola, $IDAcquisto))
                throw new Exception("Error Processing Request", 1);
        }
    }

    setcookie("checkout", null, time() - 3600, "/");
    $msg = array("success"=> "successo");
} catch (Exception $e) {
    $msg = array("error"=>"Ci scusiamo, ma ci sono stati degli errori durante l'elaborazione della richiesta.");
}

echo json_encode($msg);
die;
?>
