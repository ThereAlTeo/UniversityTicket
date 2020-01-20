<?php
require_once './../bootFiles.php';
//Base Template
$templateParams["title"] = "Registration Account";
$templateParams["pageIcon"] = "./../../res/images/logoForse.png";
$templateParams["header"] = "./../php/header.php";
$_GET["login"] = "REGISTRAZIONE CONTROLLATA";
$templateParams["main"] = "./../php/registration.php";
$templateParams["css"] = array("./../css/theme.css", "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css", "./../css/registrationStyle.css");
$templateParams["js"] = array("./../js/jquery-3.4.1.min.js", "https://cdn.jsdelivr.net/npm/sweetalert2@8", "./../js/registrationAction.js", "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js");

require 'ticketTemplate.php';
?>
