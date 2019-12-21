<?php
if (session_status() === PHP_SESSION_NONE){
  session_start();
}

require_once('./../../res/config.php');

?>
<!DOCTYPE html>
<html lang="it" dir="ltr">
     <head>
          <meta charset="utf-8">
          <title>University Ticket</title>
          <?php include './../utilities/style.php'; ?>
          <!-- Sostituire l'inserimento dei file js rendendolo dinamico tramite php (esempio eserczio lab UNI) -->
          <script src="./../js/jquery-1.11.3.min.js" type="text/javascript"></script>
          <script src="./../js/footer.js" type="text/javascript"></script>

          <link rel="stylesheet" href="./../css/main.css">
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
     </head>
     <body>

          <!-- header dinamico tramite inserito su variabile globale -->

          <?php include './../php/footer.php'; ?>
     </body>
</html>
