<?php
session_start();
require_once('./../../res/config.php');
require_once("./../utilities/generalFunctions.php");
require_once("db/database.php");
$dbh = new DatabaseHelper("localhost", "root", "", "ticket");
?>
