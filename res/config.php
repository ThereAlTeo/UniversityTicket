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
         1 => array("Guadagno Complessivo", "Biglietti venduti", "Nr Location", "Nr Utenti"),
         2 => array("Guadagno Complessivo", "Eventi Creati", "Nr Artisti", "Affluenza Maggiore"),
         3 => array("Biglietti Acquistati", "Artista Preferito", "Luogo Preferito", "Ultimo Evento")
    ),
    "infoCardIcon" => array(
         1 => array("fa-dollar", "fa-ticket", "fa-map-marker", "fa-users"),
         2 => array("fa-dollar", "fa-calendar", "fa-address-card", "fa-map-marker"),
         3 => array("fa-ticket", "fa-star", "fa-map-marker", "fa-eye")
    ),
    "chartCardHeader" => array(
         1 => array("Non lo so", "Prova"),
         2 => array("", "")
    ),
    "infoCardColor" => array("text-primary", "text-success", "text-info", "text-warning"),
);

ini_set("error_reporting", "true");
error_reporting(E_ALL|E_STRCT);

?>
