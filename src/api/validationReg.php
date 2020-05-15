<?php
require_once './../bootFiles.php';
$msg = "";
if(isset($_POST)){
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$password = sha1($_POST['password']);
	$userType = $_POST['userType'];
	$fiscalCode = strcmp($_POST['fiscalCode'], "") == 0 ? null : $_POST['fiscalCode'];
	$birth = sqlFormatDatetime($_POST['birth']);

	if($dbh->AccountExistInDB($email))
		$msg = array("error"=>"L'account esiste già.");
	elseif ($dbh->insertNewTicketUser($firstname, $lastname, $fiscalCode, $birth, $email, $password, parseUserPermission($userType))){
		$notificationManager->notifyNewUserRegistration($email);
		$msg = array("success"=>"L'account è stato creato correttamente.\nE' possibile utilizzarlo.");
	}
	else
		$msg = array("error"=>"Ci scusiamo. Non è stato possibile creare correttamente l'account.");
} else{
	$msg = array("error"=>"It is not possible to access the data entered.");
}

echo json_encode($msg);
die;
?>
