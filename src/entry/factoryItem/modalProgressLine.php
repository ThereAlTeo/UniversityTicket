<?php
     if(isset($_GET["progressLineItems"])){?>
          <h3 class="text-uppercase mb-2"><?php echo $_GET["progressLineItems"][0] ?></h3>
          <div class="modalSteps">
               <div class="modalProgress">
                    <div class="modalProgressLine bg-ticketBlue"></div>
               </div>
               <div class="d-flex justify-content-around">
                    <div class="modalStep text-center active">
                         <div class="modalStepIcon"><i class="<?php echo $_GET["progressLineItems"][1] ?>"></i></div>
                         <p><?php echo $_GET["progressLineItems"][2] ?></p>
                    </div>
                    <div class="modalStep text-center">
                         <div class="modalStepIcon"><i class="<?php echo $_GET["progressLineItems"][3] ?>"></i></div>
                         <p><?php echo $_GET["progressLineItems"][4] ?></p>
                    </div>
                    <div class="modalStep text-center">
                         <div class="modalStepIcon"><i class="<?php echo $_GET["progressLineItems"][5] ?>"></i></div>
                         <p><?php echo $_GET["progressLineItems"][6] ?></p>
                    </div>
               </div>
          </div>
<?php
          unset($_GET["progressLineItems"]);
     }
 ?>
