     <div class="my-3">
          <h1 class="h3 mb-2 text-ticketBlue"><?php echo $templateParams["headerPage"][0] ?></h1>
          <?php
          if (strcmp($templateParams["headerPage"][1], "") != 0) { ?>
               <p class="mb-3"><i class="font-weight-bold "> <?php echo $_SESSION["accountLog"][0] ?></i> <?php echo $templateParams["headerPage"][1] ?></p>
          <?php } ?>
     </div>
     <?php
     if (strcmp($templateParams["headerPage"][2], "") != 0) { ?>
          <h1 class="h6 mb-4 text-ticketBlue"> <?php echo $templateParams["headerPage"][0]." Nr. " ?><b><?php echo $templateParams["headerPage"][2] ?></b></h1>
     <?php } ?>
