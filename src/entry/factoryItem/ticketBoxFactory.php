<?php
     if(isset($_GET["ticketBox"])){?>
             <div class="col-lg-2 col-md-4 col-6 mb-2 cardBoxEvent">
                  <div class="card mb-4 shadow-sm">
                       <img class="bd-placeholder-img card-img-top" src="<?php echo $_GET["ticketBox"]["Path"] ?>" alt="">
                       <div class="m-3">
                           <h4 class="card-title">
                               <a href="./selectedEvent.php?IDEvento=<?php echo $_GET["ticketBox"]["IDEvent"] ?>" class="stretched-link"><?php echo $_GET["ticketBox"]["Name"] ?></a>
                           </h4>
                           <div class="text-dark">
                               <span class="text-warning">
                                 <?php
                                 for ($i=1; $i <= 5; $i++) {
                                     echo $i <= floatval($_GET["ticketBox"]["Star"]) ? "&#9733;" : "&#9734;";
                                 }
                              ?></span>
                              <?php echo $_GET["ticketBox"]["Star"] ?> stars
                              <h6 class="mt-2">Biglietti da €<?php echo $_GET["ticketBox"]["Price"] ?> </h6>
                          </div>
                       </div>

                  </div>
             </div>
    <?php
        unset($_GET["ticketBox"]);
     }
 ?>
