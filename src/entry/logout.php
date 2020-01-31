<?php
/**
* TODO: verificare se il Logout è corretto effettuarlo in questo modo
*/

session_start();
$_SESSION = array();
session_destroy();
header("Location: bacheca.php");
?>
