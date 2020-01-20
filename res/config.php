<?php

$config = array(
     "db" => array(
          "DBname" => "ticket",
          "username" => "root",
          "password" => "",
          "HOST" => "localhost"
     ),
     "urls" => array(),
     "paths" => array(
         "res" => "/../../res/",
         "images" => "/../../res/images/"
    ),
    "infoCardText" => array(
         1 => array("Earnings (Monthly)", "Earnings (Monthly)1", "Earnings (Monthly)2", "Earnings (Monthly)3"),
         2 => array("", "", "", ""),
         3 => array("", "", "", "")
    ),
    "infoCardIcon" => array(
         1 => array("fa-calendar", "fa-calendar", "fa-calendar", "fa-calendar"),
         2 => array("", "", "", ""),
         3 => array("", "", "", "")
    ),
    "infoCardColor" => array("text-primary", "text-success", "text-info", "text-warning"),
);

ini_set("error_reporting", "true");
error_reporting(E_ALL|E_STRCT);

?>
