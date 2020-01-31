<?php
require_once './../bootFiles.php';
//Base Template
$templateParams["title"] = "Admin - Area Riservata";
$templateParams["pageIcon"] = "./../../res/images/logoForse.png";
$templateParams["header"] = "./header.php";
$_GET["login"] = "AREA RISERVATA";
$templateParams["main"] = "./userDataMain.php";
$templateParams["navbar"] = "./navbarReservedArea.php";
$templateParams["footer"] = "./footer.php";
$templateParams["css"] = array("./../css/theme.css", "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css", "./../css/footerB.css");
$templateParams["js"] = array("./../js/jquery-3.4.1.min.js", "https://cdn.jsdelivr.net/npm/sweetalert2@9", "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js", "./../js/userDataTable.js");

if(isset($_SESSION["accountLog"]) && $_SESSION["accountLog"][1] == 1)
     require './../templates/ticketTemplate.php';
else
     header("Location: logout.php");
?>
