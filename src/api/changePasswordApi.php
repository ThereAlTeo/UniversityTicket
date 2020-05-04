<?php
require_once './../bootFiles.php';
try {
    $actualPassword = sha1($_POST['actualPassword']);
    $newPassword = sha1($_POST['newPassword']);
    $email = $_SESSION["accountLog"]["Mail"];

    if ($dbh->AccountExistInDB($email) && $dbh->checkUserPassword($email, $actualPassword)) {
        if ($dbh->changePassword($newPassword, $email))
            $msg = array("success"=>"Dal prossimo accesso sarà necessario accedere con la nuova password.");
        else
            $msg = array("error"=>"Non è stato possible aggiornare la password.");
    } else
        $msg = array("error"=>"Credenziali inserite non corrette.");

} catch (Exception $e) {
    $msg = array("error"=>"It is not possible to access the data entered.");
}

echo json_encode($msg);
die;
?>
