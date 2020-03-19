<?php
require_once './../bootFiles.php';

$msg = array("error"=>"It is not possible to access the data entered.");
if(isset($_POST)){
     $name = ucfirst($_POST['name']);
     $surname = ucfirst($_POST['surname']);
     $cf = strtoupper($_POST['cf']);
     $birth = $_POST['birth'];
     if(strlen($birth) > 8){
          $arr = explode('-', $birth);
          $birth = $arr[2].'-'.$arr[1].'-'.$arr[0];
     }

     $bio = $_POST['bio'];
     $artName = ucfirst($_POST['artName']);

     if ($dbh->nameExistInDB($name, $surname)) {
          if($dbh->insertNewArtist($name, $surname, $cf, $birth, $bio, $artName, $_SESSION["accountLog"][2]))
               $msg = array("success"=>"Artista inserito con successo!");
     }
     else {
          $msg = array("error"=>"Credenziali inserite non corrette.");
     }
}

echo json_encode($msg);
die;
?>
