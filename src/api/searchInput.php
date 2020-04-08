<?php
require_once './../bootFiles.php';

$msg = array("error" => "It is not possible to access the data entered.");
if(isset($_POST["search"])){

     try {
        $locationArr = $artistArr = array();

         foreach ($dbh->filterArtistByValue($_POST['search']) as $key => $value)
             array_push($artistArr, array("Text" => getCorrectArtistName($value), "PagRef" => "./selectedCardBox.php?IDTour=".$value["IDArtista"], "BadgeValue" => $value["eventNum"]));

        foreach ($dbh->filterLocationByValue($_POST['search']) as $key => $value)
             array_push($locationArr, array("Text" => $value["Nome"], "PagRef" => "./selectedCardBox.php?IDLocation=".$value["IDLocation"], "BadgeValue" => $value["eventNum"]));

         $msg = array("success" => array("Location" => $locationArr, "Artista" => $artistArr));
     } catch (Exception $e) {
         $msg = array("error" => "Problemi durante la comunicazione con il DB.");
     }
}

echo json_encode($msg);
die;

?>
