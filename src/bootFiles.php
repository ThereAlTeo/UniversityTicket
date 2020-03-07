<?php
session_start();
define("ROOT_DIR", "./../");
define("HEADER_DIR", ROOT_DIR."php/header/");
define("NAVBAR_DIR", ROOT_DIR."php/navbar/");
define("MAIN_DIR", ROOT_DIR."php/main/");
define("MENU_DIR", ROOT_DIR."php/menu/");
define("CHART_INFO_DIR", ROOT_DIR."php/chart/");
define("FOOTER_DIR", ROOT_DIR."php/footer/");
define("TEMPLATE_DIR", ROOT_DIR."templates/");
define("JS_DIR", ROOT_DIR."js/");
define("CSS_DIR", ROOT_DIR."css/");
define("FACTORY_DIR", "./factoryItem/");

require_once(ROOT_DIR.'../res/config.php');
require_once(ROOT_DIR."utilities/generalFunctions.php");
require_once(ROOT_DIR."db/database.php");
$dbh = new DatabaseHelper("localhost", "root", "", "ticket");
?>
