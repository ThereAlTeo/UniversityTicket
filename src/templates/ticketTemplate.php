<?php
if (session_status() === PHP_SESSION_NONE){
  session_start();
}

require_once(ROOT_DIR.'../res/config.php');
?>
<!DOCTYPE html>
<html lang="it" dir="ltr">
     <head>
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <title><?php echo $templateParams["title"]; ?></title>
          <link rel="icon" href="<?php echo $config["pageIcon"]; ?>">
     <?php
     if(isset($config["CSS"])){
          foreach($config["CSS"] as $cssItem)
              printTabln('<link rel="stylesheet" href="'.$cssItem.'"></script>', 3);
     }
     ?>
     </head>
     <body>
          <?php
          require(HEADER_DIR.$templateParams["header"]);

          if(isset($templateParams["navbar"])){
              require(NAVBAR_DIR.$templateParams["navbar"]);
          }

          if(isset($templateParams["main"])){
              require(MAIN_DIR.$templateParams["main"]);
          }

          if(isset($templateParams["footer"])){
              require(FOOTER_DIR.$templateParams["footer"]);
          }

          if(isset($templateParams["js"])){
              foreach($templateParams["js"] as $scriptItem)
                   printTabln('<script src="'.$scriptItem.'" type="text/javascript" crossorigin="anonymous"></script>', 2);
         }
         ?>
     </body>
</html>
