<?php
require_once './../bootFiles.php';

$templateParams["title"] = "Registration Account";
$templateParams["header"] = "header.php";
$_GET["login"] = "REGISTRAZIONE CONTROLLATA";
$templateParams["main"] = "registration.php";
$templateParams["templateType"] = "common.php";
$templateParams["js"] = array(JS_DIR."registrationAction.js", "https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js", "https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js", "https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js");

array_push($config["CSS"], "https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css");
require TEMPLATE_DIR.'ticketTemplate.php';
?>
