<?php

$config = array(
     "db" => array(
          "DBname" => "ticket",
          "username" => "root",
          "password" => "",
          "HOST" => "localhost"
     ),
    "infoCardText" => array(
         1 => array("Guadagno Complessivo", "Biglietti venduti", "Nr Location", "Nr Utenti"),
         2 => array("Guadagno Complessivo", "Eventi Creati", "Nr Artisti", "Affluenza Maggiore"),
         3 => array("Biglietti Acquistati", "Artista Preferito", "Prossimo Evento", "Recensioni Fatte")
    ),
    "infoCardIcon" => array(
         1 => array("fas fa-dollar-sign", "fas fa-ticket-alt", "fas fa-map-marked-alt", "fas fa-users"),
         2 => array("fas fa-dollar-sign", "far fa-calendar-alt", "far fa-address-card", "fas fa-map-marked-alt"),
         3 => array("fas fa-ticket-alt", "far fa-grin-hearts", "fas fa-map-marked-alt", "fas fa-pen-fancy")
    ),
    "chartCardHeader" => array(
         1 => array("Andamento incassi", "Manager più attivi"),
         2 => array("Concerti in programmazione", "Artisti più attivi")
    ),
    "infoCardColor" => array("primary", "success", "info", "warning"),
    "pageIcon" => ROOT_DIR."../res/images/logoForse.png",
    "CSS" => array("https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css", "https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css", CSS_DIR."fontawesome-free/css/all.min.css", CSS_DIR."OfficialTheme.css", CSS_DIR."serviceStyle.css"),
    "HEADJS" => array("https://code.jquery.com/jquery-3.4.1.slim.min.js", JS_DIR."jquery-3.4.1.min.js", "https://cdn.jsdelivr.net/npm/sweetalert2@9", "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"),
    "DEFAULTJS" => array(JS_DIR."generalTicketAction.js"),
);

ini_set("error_reporting", "true");
error_reporting(E_ALL|E_STRCT);
?>
