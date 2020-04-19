<?php
session_start();

if(isset($_SESSION["accountLog"]))
    unset($_SESSION["accountLog"]);

header("Location: bacheca.php");
?>
