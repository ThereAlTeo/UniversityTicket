<?php
require_once './../bootFiles.php';

$msg = array();

if(isset($_POST)){
    switch ($_POST['mode']) {
        case "changeKindOf":
            $msg = $dbh->getKindOfMusicByType($_POST['idKindMusic']);
        break;
        case "changeLocationSectors":
            foreach ($dbh->getSectorByLocationID($_POST['IDLocation']) as $key => $value)
                array_push($msg, array("IDSettore" => $value['IDSettore'], "Nome" => $value['Nome'], "Capienza" => $value['Capienza']));
        break;
        case "artistEventModify":
            $msg = $dbh->eventInfoByIDArtist($_POST['IDArtist']);
        break;
        case "deleteEvent":
            if ($dbh->deleteEvent($_POST['IDEvent'])){
                $notificationManager->eventDeleted($_POST['IDEvent']);
                $msg = array("success" => "L'evento è stato ufficialmente cancellato!");
            }
            else
                $msg = array("error" => "Non è stato possibile elimanare correttamente l'evento.");
        break;
        case "insertEvent":
            if ($_FILES['locandinaImage']) {
                $eventTitle = $_POST['eventTitle'];
                $IDGenere = $_POST['IDGenere'];
                $IDArtista = $dbh->getKindOfMusicInfo($IDGenere)["IDTipologia"] != 2 ? $_POST['IDArtista'] : null;
                $IDLocation = $_POST['IDLocation'];
                $sectors = $_POST['sectors'];
                $startEvent = sqlFormatDatetime($_POST['startEvent']);
                $endEvent = sqlFormatDatetime($_POST['endEvent']);
                $publicedDateEvent = sqlFormatDatetime($_POST['publicedDateEvent']);
                $eventDescription = strlen($_POST['eventDescription']) > 0 ? $_POST['eventDescription'] : null;
                $eventID = 0;
                try {
                    if ($dbh->checkExistEvent($IDLocation, $startEvent, $endEvent)) {
                        $msg = array("error"=> "Un altro evento è già stato programmato alla stessa ora.");
                    } else {
                        $eventID = $dbh->insertEvent($eventTitle, $IDArtista, $IDLocation, $IDGenere, $eventDescription, $startEvent, $endEvent, $publicedDateEvent);
                        if($eventID){
                            $locandinaName = "\\eventImages\\".$dbh->getResImageName($IDGenere, $IDArtista, $eventID).".".pathinfo($_FILES['locandinaImage']['name'])['extension'];

                            if(!(copyFileInOtherDir($_FILES['locandinaImage']['tmp_name'], ROOT_PATH."\\res\\images".$locandinaName) && $dbh->upgradeEventImage($eventID, $locandinaName))){
                                $msg = array("error"=> "Non è stato possibile gestire correttamente l'immagine caricata.\nControllare e riprovare.");
                                throw new Exception('Immagine non copiata correttamente');
                            }

                            foreach ($sectors as $key => $value) {
                                $item = explode("-", $value);
                                if(!$dbh->insertTariffarioEvento($eventID, $item[0], $IDLocation, $item[2], $item[1])) {
                                    $msg = array("error"=> "Non è stato possibile gestire correttamente l'immagine caricata.\nControllare e riprovare.");
                                    throw new Exception('Immagine non copiata correttamente');
                                }
                            }

                            $msg = array("success"=> "Evento creato correttamente!\n BUON LAVORO !!!");
                        } else
                            $msg = array("error"=> "Non è stato possibile creare correttamente l'evento.");
                    }
                } catch (Exception $e) {
                    if($eventID)
                        $dbh->deleteEventByID($eventID);
                }
            } else
                $msg = array("error"=> "Alcuni elementi del form non possono essere caricati correttamente.");
        break;
    }
}

echo json_encode($msg);
die;
?>
