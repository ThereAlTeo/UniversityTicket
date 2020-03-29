          <!-- Main Bacheca -->
          <header class="jumbotron bg-light">
               <div class="row align-items-center">
                    <div class="d-none d-md-none d-lg-inline col-md-2">
                         <a href="#"><img <?php echo 'src="'.ROOT_DIR.'../res/images/18App.jpg"'; ?> class="rounded mx-auto d-block w-50" alt="18App"></a>
                    </div>
                    <div class="col-lg-7 text-center">
                         <h1 class="display-3">UNIVERSITYTICKET <i class="fas fa-ticket-alt"></i></h1>
                         <p class="lead mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, ipsam, eligendi, in quo sunt possimus non incidunt odit vero aliquid similique quaerat nam nobis illo aspernatur vitae fugiat numquam repellat.</p>
                         <a href="#" class="stretched-link text-ticketBlue h5" style="position: relative;">Clicca per maggiori info</a>
                    </div>
                    <div class="d-none d-md-none d-lg-inline col-md-3">
                         <img <?php echo 'src="'.ROOT_DIR.'../res/images/ticketalert.jpg"'; ?> class="rounded mx-auto d-block w-50" alt="ticketAlert">
                    </div>
               </div>
          </header>

          <div class="container-fluid">
              <?php



              ?>
               <h3 class="pb-2 text-dark font-weight-bold">Portfolio Heading</h3>
               <div class="row mb-2 border-bottom">
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
                    <div class="col-lg-2 col-md-4 col-6 mb-2">
                         <div class="card mb-4 shadow-sm">
                              <img class="bd-placeholder-img card-img-top" src="./../../res/images/eventImages/maxPezzali.jpg" alt="">
                              <div class="card-body">
                                   <h4 class="card-title">
                                   <a href="./artistPageDedicated.php?ID=4" class="stretched-link">Max Pezzali</a>
                                   </h4>
                                   <div class="text-dark">
                                        <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
                                        4.0 stars
                                        <h6 class="mt-2">Biglietti da €24.99</h6>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
               <?php
               /**
               * La seguente parte realizza le prime 4 sezione della homepage
               */
               foreach (getPairEventElement() as $key => $value) {
                   foreach ($dbh->getBachecaSectionInfoByKindID($value) as $index => $item) {
                        $_GET["category"] = $item;
                        include FACTORY_DIR.'bachecaSection.php';
                   }
               }
               ?>
          </div>

          <!-- Main Bacheca -->
