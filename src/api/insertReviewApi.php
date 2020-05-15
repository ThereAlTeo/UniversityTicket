<?php
require_once './../bootFiles.php';

$msg = array("error"=>"It is not possible to access the data entered.");
if(isset($_POST)){
    $reviewSelectItem = explode("_", $_POST['reviewSelectItem']);
    $matricola = $reviewSelectItem[0];
    $IDAcquisto = $reviewSelectItem[1];
    $reviewTextArea = $_POST['reviewTextArea'];
    $rate = !empty($_POST['rate']) ? $_POST['rate'] : null;
    $alreadyDone = true;
    foreach ($dbh->getReviewDoneByIDUser($_SESSION["accountLog"]["IDUser"]) as $value){
        if ($value["IDEvento"] == intval(explode("-", $matricola)[2]))
            $alreadyDone = false;
    }

    if ($alreadyDone) {
        if ($dbh->insertRecensione($matricola, $IDAcquisto, $reviewTextArea, $rate)){
            $notificationManager->insertNewReview($dbh->getMailMangerByticketID($matricola));
            $msg = array("success"=>"Recensione inserita con successo");
        }
    } else
        $msg = array("error"=>"Non è possibile inserire 2 volte una recensione per lo stesso evento.");
}

echo json_encode($msg);
die;
?>
