<?php
require_once './../bootFiles.php';

$msg = "";

if(isset($_POST)){
     $locationName = $_POST['locationName'];
     $locationAddress = $_POST['locationAddress'];
     $sectorNames = $_POST['sectorNames'];
     $seats = $_POST['seats'];
     
	if($dbh->LocationExistInDB($locationName)){
		$msg = array("error"=>"La location esiste già.");
	}
	else {
          $index =  $dbh->insertLocation($locationName, $locationAddress);
          if($index > 0){
               /*
               * Controllare meglio tutto
               */
               $msg = array("success"=>"The account was successfully created. It is possible to use it.");
               for ($i=0; $i < count($seats); $i++) {
                    if(!$dbh->insertSectorbyLocation($sectorNames[$i], $index, $seats[$i])){
                         $msg = array("error"=>"We're sorry. The Settor could not be created.");
                         break;
                    }
               }
          }
          else{
               $msg = array("error"=>"We're sorry. The Location could not be created.");
          }
	}
}else{
	$msg = array("error"=>"It is not possible to access the data entered.");
}

echo json_encode($msg);
die;
?>
