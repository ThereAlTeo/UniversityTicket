<?php
require_once './../bootFiles.php';
$msg = "";
if(isset($_POST)){
    $email = $_POST['email'];
    $password = sha1($_POST['password']);

    if ($dbh->AccountExistInDB($email) && $dbh->checkUserPassword($email, $password)) {
        $_SESSION["accountLog"] = array($email);
        foreach ($dbh->getAccountAccessInfo($email) as $key => $value)
            array_push($_SESSION["accountLog"], $value);

        $msg = array("success"=>"Bentornato ".$email."!");
    } else {
        $msg = array("error"=>"Credenziali inserite non corrette.");
    }
} else {
    $msg = array("error"=>"It is not possible to access the data entered.");
}

echo json_encode($msg);
die;
?>
