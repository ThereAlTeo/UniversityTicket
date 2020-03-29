<?php
     if(isset($_GET["category"])){?>
         <h3 class="pb-2 text-dark font-weight-bold"><?php echo "Qualcosa"; ?></h3>
         <div class="row mb-2 border-bottom">
         <?php
         foreach ($_GET["category"] as $key => $value) { ?>
             <div class="col-lg-2 col-md-4 col-6 mb-2">
                  <div class="card mb-4 shadow-sm">
                       <img class="bd-placeholder-img card-img-top" src="./../../res/images/eventImages/maxPezzali.jpg" alt="">
                       <div class="card-body">
                            <h4 class="card-title">
                            <a href="#" class="stretched-link">Max Pezzali</a>
                            </h4>
                            <div class="text-dark">
                                 <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
                                 4.0 stars
                                 <h6 class="mt-2">Biglietti da €24.99</h6>
                            </div>
                       </div>
                  </div>
             </div>
    <?php } ?>
         </div>
         <?php 
         unset($_GET["category"]);
     }
 ?>
