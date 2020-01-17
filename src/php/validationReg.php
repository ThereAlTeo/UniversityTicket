<?php
require_once './../bootFiles.php';

$msg = "";

if(isset($_POST)){
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$password = sha1($_POST['password']);
	$userType = $_POST['userType'];

	$msg = array("error"=>"The account is already registered.");

	if($dbh->AccountExistInDB($email)){
		$msg = array("error"=>"The account is already registered.");
	}
	elseif ($dbh->insertNewUser($firstname, $lastname, $email, $password, parseUserPermission($userType))) {
		$msg = array("success"=>"The account was successfully created. It is possible to use it.");
	}
	else {
		$msg = array("error"=>"We're sorry. The account could not be created.");
	}
}else{
	$msg = array("error"=>"It is not possible to access the data entered.");
}

echo json_encode($msg);
die;
?>
