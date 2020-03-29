<?php
require_once './../bootFiles.php';
//Base Template
$templateParams["title"] = "Registration Account";
$templateParams["header"] = "header.php";
$_GET["login"] = "REGISTRAZIONE CONTROLLATA";
$templateParams["main"] = "registration.php";
$templateParams["templateType"] = "C";
$templateParams["js"] = array("https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js", "https://code.jquery.com/jquery-3.4.1.slim.min.js", JS_DIR."jquery-3.4.1.min.js", "https://cdn.jsdelivr.net/npm/sweetalert2@9", JS_DIR."registrationAction.js", "https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js", "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js", "https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js", "https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js");

array_push($config["CSS"], "https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css");
require TEMPLATE_DIR.'ticketTemplate.php';
?>
