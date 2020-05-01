<?php
require_once './../bootFiles.php';

if(isset($_GET["IDLocation"])){
    header("Location: locationEvent.php?IDLocation=".$_GET["IDLocation"]);
    exit();
}
elseif (isset($_GET["IDTour"])){
    $info = $dbh->getArtstInfoByEventID($_GET["IDTour"]);
    if(count($info))
        $_GET["IDArtist"] = $info[0]["IDArtista"];
    else
        header("Location: bacheca.php");
}

if(!count($dbh->getArtistInfo($_GET["IDArtist"])))
    header("Location: bacheca.php");

unset($_GET["IDTour"]);

$templateParams["title"] = "University Ticket";
$templateParams["header"] = "header.php";
$templateParams["main"] = "artistMainEvent.php";
$templateParams["navbar"] = "navbar.php";
$templateParams["footer"] = "footer.php";
$templateParams["templateType"] = "common.php";

array_push($config["DEFAULTJS"], JS_DIR."searchInput.js");
array_unshift($config["HEADJS"], "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js");

require TEMPLATE_DIR.'ticketTemplate.php';
?>
