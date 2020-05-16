<?php
include './../bootFiles.php';

try {
    $notifyIDs = $_POST['notifyIDs'];

    foreach ($notifyIDs as $key => $value) {
        $dbh->updateSegreteria($value);
    }
} catch (Exception $e) { }
?>
