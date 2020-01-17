          <!-- Main Bacheca -->
          <div class="row mx-5 mx-sm-5 d-flex justify-content-center">
               <div class="d-none d-sm-none d-md-inline col-sm-3">
                    <div class="text-center ">
                         <a href="#"><img src="18App.jpg" class="rounded d-block w-75" alt="18App"></a>
                    </div>
               </div>
               <div class="col-12 col-sm-6">
                    <div id="mainEventCarousel" class="carousel slide carousel-fade" data-ride="carousel">
                         <div class="carousel-inner" role="listbox">
                              <?php

                               ?>
                              <div class="carousel-item active">
                                   <img src="1.jpeg" class="d-block w-100" alt=""/>
                              </div>
                              <div class="carousel-item">
                                   <img src="2.jpg" class="d-block w-100" alt=""/>
                              </div>
                         </div>
                         <a class="carousel-control-prev" href="#mainEventCarousel" role="button" data-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="sr-only">Previous</span>
                         </a>
                         <a class="carousel-control-next" href="#mainEventCarousel" role="button" data-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="sr-only">Next</span>
                         </a>
                    </div>
               </div>
               <div class="d-none d-sm-none d-md-inline col-sm-3 align-items-center">

               </div>
          </div>
          <div class="m-5 mx-sm-5 mt-sm-5">
               <?php
                    var_dump($dbh->AccountExistInDB("Prova"));
                    foreach ($dbh->getRandonEventOfCategory(2, 1) as $key => $value) {
                         $GET["category"] = $value["Name"];
                         include 'bachecaSection.php';
                    }

                    foreach ($dbh->getRandonEventOfCategory(1, 2) as $key => $value) {
                         $GET["category"] = $value["Name"];
                         include 'bachecaSection.php';
                    }

                    foreach ($dbh->getRandonEventOfCategory(1, 3) as $key => $value) {
                         $GET["category"] = $value["Name"];
                         include 'bachecaSection.php';
                    }

                    unset($GET["category"]);
               ?>
          </div>
          <!-- Main Bacheca -->
