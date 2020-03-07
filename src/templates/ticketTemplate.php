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
              printTabln('<link rel="stylesheet" href="'.$cssItem.'">', 3);
     }
     ?>
     </head>
     <body id="pageTop">
          <?php
          if(isset($templateParams["templateType"]) && strcmp($templateParams["templateType"], "C") === 0)
               require "common.php";
          elseif (isset($templateParams["templateType"]) && strcmp($templateParams["templateType"], "D") === 0)
               require "dashboard.php";
          ?>
          <a class="scroll-to-top rounded" href="#pageTop">
               <i class="fas fa-angle-up"></i>
          </a>
          <?php
          if(isset($templateParams["js"])){
               foreach($templateParams["js"] as $scriptItem)
                    printTabln('<script src="'.$scriptItem.'" type="text/javascript" crossorigin="anonymous"></script>', 2);
          }

          if(isset($templateParams["scriptPlus"])){
               foreach($templateParams["scriptPlus"] as $scriptItem)
                    require(CHART_INFO_DIR.$scriptItem);
          }
          ?>
     </body>
</html>
