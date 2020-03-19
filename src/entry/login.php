<?php
require_once './../bootFiles.php';
//Base Template
$templateParams["title"] = "Login - Safety Mode";
$templateParams["header"] = "header.php";
$_GET["login"] = "ACCESSO CONTROLLATO";
$templateParams["main"] = "loginPrime.php";
//$templateParams["footer"] = "footer.php";
$templateParams["templateType"] = "C";
$templateParams["js"] = array(JS_DIR."jquery-3.4.1.min.js", "https://cdn.jsdelivr.net/npm/sweetalert2@9", JS_DIR."loginAction.js", "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js");

if(isset($_SESSION["accountLog"]))
     header("Location: reservedArea.php");
else
     require TEMPLATE_DIR.'ticketTemplate.php';
?>
