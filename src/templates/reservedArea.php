<?php
require_once './../bootFiles.php';
//Base Template
$templateParams["title"] = "Admin - Area Riservata";
$templateParams["pageIcon"] = "./../../res/images/logoForse.png";
$templateParams["header"] = "./../php/header.php";
$_GET["login"] = "AREA RISERVATA";
$templateParams["main"] = "./../php/homeReservedArea.php";
$templateParams["navbar"] = "./../php/navbarReservedArea.php";
$templateParams["footer"] = "./../php/footer.php";
$templateParams["css"] = array("./../css/theme.css", "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css", "./../css/footerB.css");
$templateParams["js"] = array("./../js/jquery-3.4.1.min.js", "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js");

if(isset($_SESSION["accountLog"]))
     require 'ticketTemplate.php';
else
     header("Location: login.php");

?>
