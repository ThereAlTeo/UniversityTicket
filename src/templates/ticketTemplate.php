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
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <title><?php echo $templateParams["title"]; ?></title>
          <link rel="icon" href="<?php echo $templateParams["pageIcon"]; ?>">
          <?php
          println("");
          if(isset($templateParams["css"])){
              foreach($templateParams["css"] as $cssItem):
                   printTabln('<link rel="stylesheet" href="'.$cssItem.'"></script>', 3);
              endforeach;
         }
          ?>
     </head>
     <body>
          <?php
          require($templateParams["header"]);

          if(isset($templateParams["navbar"])){
              require($templateParams["navbar"]);
          }

          if(isset($templateParams["main"])){
              require($templateParams["main"]);
          }

          if(isset($templateParams["footer"])){
              require($templateParams["footer"]);
          }

          if(isset($templateParams["js"])){
              foreach($templateParams["js"] as $scriptItem):
                   printTabln('<script src="'.$scriptItem.'" type="text/javascript" crossorigin="anonymous"></script>', 2);
              endforeach;
         }
         ?>
     </body>
</html>
