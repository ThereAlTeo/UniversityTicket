<?php
require_once './../bootFiles.php';

$msg = array("error"=>"It is not possible to access the data entered.");
if(isset($_POST)){
    $name = ucfirst($_POST['name']);
    $surname = ucfirst($_POST['surname']);
    $cf = !empty($_POST['cf']) ? strtoupper($_POST['cf']) : null;
    $birth = sqlFormatDatetime($_POST['birth']);
    $bio = $_POST['bio'];
    $artName = !empty($_POST['artName']) ? ucfirst($_POST['artName']) : null;

    if ($dbh->nameExistInDB($name, $surname)) {
        if ($dbh->insertNewArtist($name, $surname, $cf, $birth, $bio, $artName, $_SESSION["accountLog"]["IDUser"]))
            $msg = array("success"=>"Artista inserito con successo!");
    } else
        $msg = array("error"=>"Nome di persona già esistente.");
}

echo json_encode($msg);
die;
?>
