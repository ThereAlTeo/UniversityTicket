<?php
require_once './../bootFiles.php';
//Base Template
$templateParams["title"] = "University Ticket";
$templateParams["pageIcon"] = "./../../res/images/logoForse.png";
$templateParams["header"] = "./../php/header.php";
$templateParams["main"] = "./../php/homeBacheca.php";
$templateParams["navbar"] = "./../php/navbar.php";
$templateParams["footer"] = "./../php/footer.php";
$templateParams["css"] = array("./../css/theme.css", "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css", "./../css/footerB.css");;
$templateParams["js"] = array("./../js/jquery-1.11.3.min.js", "https://code.jquery.com/jquery-3.2.1.slim.min.js", "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js", "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js");

require 'ticketTemplate.php';
?>
