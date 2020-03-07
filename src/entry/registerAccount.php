<?php
require_once './../bootFiles.php';
//Base Template
$templateParams["title"] = "Registration Account";
$templateParams["header"] = "header.php";
$_GET["login"] = "REGISTRAZIONE CONTROLLATA";
$templateParams["main"] = "registration.php";
$templateParams["templateType"] = "C";
$templateParams["js"] = array(JS_DIR."jquery-3.4.1.min.js", "https://cdn.jsdelivr.net/npm/sweetalert2@8", JS_DIR."registrationAction.js", "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js");

require TEMPLATE_DIR.'ticketTemplate.php';
?>
