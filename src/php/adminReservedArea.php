          <!-- Admin Area -->
          <div class="mx-5">
               <div class="d-sm-flex align-items-center justify-content-between my-4">
                    <h1 class="h3 mb-0 text-ticketBlue">Dashboard</h1>
               </div>
               <div class="row">
                    <?php
                         $infoCardText = $config['infoCardText'][$_SESSION["accountLog"][1]];
                         $infoCardColor = $config['infoCardColor'];
                         $infoCardIcon = $config['infoCardIcon'][$_SESSION["accountLog"][1]];

                         for ($i=0; $i < 4; $i++) {
                              $_GET["infoCard"] = array($infoCardText[$i], $infoCardColor[$i], $infoCardIcon[$i]);
                              include './../php/factoryItem/infoCard.php';
                         }
                    ?>
               </div>
          </div>
          <!-- Admin Area -->
