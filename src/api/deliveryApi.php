<?php
include './../bootFiles.php';

try {
    $_SESSION["ticketDelivery"] = $dbh->getDeliveryItemByID(substr($_POST['radioValue'], -1));
    $_SESSION["ticketDeliveryStreet"] = array("Street" => $_POST['street'], "CAP" => $_POST['cap']);
    $msg = array("success"=> "Procedura completata correttamente.");
} catch (Exception $e) {
    $msg = array("error"=>"It is not possible to access the data entered.");
}

echo json_encode($msg);
die;
?>
