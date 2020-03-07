
          <?php
          require(HEADER_DIR.$templateParams["header"]);

          if(isset($templateParams["navbar"])){
             require(NAVBAR_DIR.$templateParams["navbar"]);
          }
          ?>
          <div class="container-fluid">
          <?php
          if(isset($templateParams["main"])){
             require(MAIN_DIR.$templateParams["main"]);
          }
          ?>
          </div>
          <?php
          if(isset($templateParams["footer"])){
             require(FOOTER_DIR.$templateParams["footer"]);
          }
          ?>
