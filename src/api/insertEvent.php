<?php
require_once './../bootFiles.php';

$msg = array();

if(isset($_POST)){
     $idKindMusic = substr($_POST['idKindMusic'], strlen($_POST['idKindMusic']) - 1);

     foreach ($dbh->getKindOfMusicByType($idKindMusic) as $key => $value)
          array_push($msg, array("IDGenere" => $value['IDGenere'], "Name" => $value['Name'])); 
}

echo json_encode($msg);
die;
?>
