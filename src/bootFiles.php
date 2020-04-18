<?php
if (session_status() === PHP_SESSION_NONE)
    session_start();

/// Provare ad utilizzare la variabile $_SERVER per gestire la ROOT_DIR, e di conseguenza tutte le altre define, in modo migliore e più adeguato.
define("ROOT_DIR", "./../");
define("HEADER_DIR", ROOT_DIR."php/header/");
define("NAVBAR_DIR", ROOT_DIR."php/navbar/");
define("MAIN_DIR", ROOT_DIR."php/main/");
define("MENU_DIR", ROOT_DIR."php/menu/");
define("SUMMARY_DIR", ROOT_DIR."php/summary/");
define("CHART_INFO_DIR", ROOT_DIR."php/chart/");
define("FOOTER_DIR", ROOT_DIR."php/footer/");
define("JUMBOTRN_DIR", ROOT_DIR."php/jumbotron/");
define("TEMPLATE_DIR", ROOT_DIR."templates/");
define("JS_DIR", ROOT_DIR."js/");
define("CSS_DIR", ROOT_DIR."css/");
define("FACTORY_DIR", "./factoryItem/");
define("RES_DIR", ROOT_DIR."../res/");
define("DEFAULT_IMAGE", RES_DIR."images/DefaultArtist.png");
define("ROOT_PAHT", substr(__DIR__, 0, strrpos(__DIR__, '\\', -1)));

require_once(ROOT_DIR.'../res/config.php');
require_once(ROOT_DIR."utilities/generalFunctions.php");
require_once(ROOT_DIR."db/database.php");
$dbh = new DatabaseHelper("localhost", "root", "", "ticket");
?>
