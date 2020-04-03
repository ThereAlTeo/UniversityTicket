<?php
require_once './../bootFiles.php';

$msg = "";

if(isset($_POST) && $_FILES['locationImage']){
    $locationName = $_POST['locationName'];
    $locationAddress = $_POST['locationAddress'];
    $sectorNames = $_POST['sectorNames'];
    $seats = $_POST['seats'];
    $index = 0;

    if($dbh->LocationExistInDB($locationName))
        $msg = array("error"=> "La location esiste già.");
    else {
        try {
            $locationImage = "\\locationImages\\".clearNameForPathValue($locationName).".".pathinfo($_FILES['locationImage']['name'])['extension'];
            $index =  $dbh->insertLocation($locationName, $locationAddress, $locationImage);
            if($index > 0 && (copyFileInOtherDir($_FILES['locationImage']['tmp_name'], ROOT_PAHT."\\res\\images".$locationImage)){
                $msg = array("success"=> "Il luogo è stato inserito correttamente.\nBUON LAVORO!");
                for ($i=0; $i < count($seats); $i++) {
                    if(!$dbh->insertSectorbyLocation($index, $sectorNames[$i], $seats[$i])){
                        $msg = array("error"=>"Ci scusiamo. Qualche settore presenta informazioni non adeguate.");
                        break;
                    }
                }
            } else throw new Exception("Error Processing Request", 1);
        } catch (Exception $e) {
            $msg = array("error"=>"Ci scusiamo. Non è stato possibile creare la location.");
            $dbh->deleteLocation($index);
        }
     }
} else
	$msg = array("error"=> "Non è stato possibile utilizzare corretamente i dati.");

echo json_encode($msg);
die;
?>
