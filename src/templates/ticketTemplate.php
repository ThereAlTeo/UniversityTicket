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
      <?php if (isset($config["CSS"])):
                foreach ($config["CSS"] as $cssItem): ?>
                    <link rel="stylesheet" href="<?php echo $cssItem ?>">
          <?php endforeach;
            endif; ?>
     </head>
     <body id="pageTop">
          <?php
          if(isset($templateParams["templateType"]))
               require $templateParams["templateType"];
          ?>
          <a class="scroll-to-top rounded" href="#pageTop">
               <i class="fas fa-angle-up"></i>
          </a>
          <?php foreach ($config["DEFAULTJS"] as $scriptItem): ?>
              <script src="<?php echo $scriptItem ?>" type="text/javascript" crossorigin="anonymous"></script>
          <?php endforeach;
          if (isset($templateParams["js"])):
              foreach ($templateParams["js"] as $scriptItem): ?>
                  <script src="<?php echo $scriptItem ?>" type="text/javascript" crossorigin="anonymous"></script>
              <?php endforeach;
          endif;
          if(isset($templateParams["scriptPlus"])){
               foreach($templateParams["scriptPlus"] as $scriptItem)
                    require(CHART_INFO_DIR.$scriptItem);
          }
          ?>
     </body>
</html>
