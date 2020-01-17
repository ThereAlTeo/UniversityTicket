<?php
require_once './../bootFiles.php';
//Base Template
$templateParams["title"] = "Login - Safety Mode";
$templateParams["pageIcon"] = "./../../res/images/logoForse.png";
$templateParams["header"] = "./../php/header.php";
$GET["login"] = "ACCESSO CONTROLLATO";
$templateParams["main"] = "./../php/loginForm.php";
$templateParams["css"] = array("./../css/theme.css", "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css", "./../css/loginStyle.css");;
$templateParams["js"] = array("./../js/jquery-3.4.1.min.js", "https://cdn.jsdelivr.net/npm/sweetalert2@9", "./../js/loginAction.js", "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js");

require 'ticketTemplate.php';
?>
