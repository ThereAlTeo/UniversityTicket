<?php
require_once './../bootFiles.php';
$msg = "";
if(isset($_POST)){
    $email = $_POST['email'];
    $password = sha1($_POST['password']);

    if ($dbh->AccountExistInDB($email) && $dbh->checkUserPassword($email, $password)) {
        $accountInfo = $dbh->getAccountAccessInfo($email);
        $next = substr($_POST['next'], 0, strrpos($_POST['next'], '.', 0));

        if(strcmp($next, "reservedArea") == 0) {
            $_SESSION["accountLog"] = array("Mail" => $email, "IDUser" => $accountInfo["IDUser"], "IDAccesso" => $accountInfo["IDAccesso"]);
            $msg = array("success"=>"Bentornato ".$email."!");
        } else if (strcmp($next, "deliveryInfo") == 0 &&  $accountInfo["IDAccesso"] > 2) {
            $_SESSION["accountLog"] = array("Mail" => $email, "IDUser" => $accountInfo["IDUser"], "IDAccesso" => $accountInfo["IDAccesso"]);
            $msg = array("success"=>"Bentornato ".$email."!");
        } else
            $msg = array("error"=>"I suoi permessi non le concedono l'accesso.");
    } else {
        $msg = array("error"=>"Credenziali inserite non corrette.");
    }
} else {
    $msg = array("error"=>"It is not possible to access the data entered.");
}

echo json_encode($msg);
die;
?>
