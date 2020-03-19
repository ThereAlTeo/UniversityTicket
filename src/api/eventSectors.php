<?php
require_once './../bootFiles.php';

$msg = array();

if(isset($_POST)){

     foreach ($dbh->getSectorByLocationID($_POST['IDLocation']) as $key => $value)
          array_push($msg, array("IDSettore" => $value['IDSettore'], "Nome" => $value['Nome'], "Capienza" => $value['Capienza'])); 
}

echo json_encode($msg);
die;
?>
