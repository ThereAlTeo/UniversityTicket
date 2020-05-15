<?php
require_once './../bootFiles.php';

$msg = "";
if(isset($_POST)){
     $email = $_POST['email'];

     if ($dbh->enableUser($email)){
         $notificationManager->notifyUserEnable($email);
         $msg = array("success"=>"Account abilitato correttamente!");
     }
     else
          $msg = array("error"=>"Impossibile abilitare l'account.");
}
else {
     $msg = array("error"=>"It is not possible to access the data entered.");
}

echo json_encode($msg);
die;
?>
