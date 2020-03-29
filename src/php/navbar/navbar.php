          <!-- Nav -->
          <nav class="py-2 bg-ticketBlue text-white mb-3 sticky-top">
               <form method="POST">
                    <div class="d-flex row mx-3 justify-content-between">
                         <div class="col-3 col-sm-3 col-md-2">
                              <div class="btn-group">
                                   <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                       <i class="fas fa-calendar-day"></i>
                                   </button>
                                   <div class="dropdown-menu">
                                        <?php
                                             $types = $dbh->getEventType();

                                             for ($x = 0; $x < count($types); $x++) {
                                                  echo('<a class="dropdown-item" href="#">'.$types[$x]["Nome"].'</a>');
                                                  if($x != count($types) - 1){
                                                       echo ('<div class="dropdown-divider"></div>');
                                                  }
                                             }
                                        ?>
                                   </div>
                              </div>
                         </div>
                         <div class="col-6 col-sm-6 col-md-8">
                              <div class="input-group">
                                   <input class="form-control" type="search" placeholder="Ricerca evento, artista o località ..." aria-label="Search">
                                   <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
                                   </div>
                              </div>
                         </div>
                         <div class="col-3 text-right col-sm-3 col-md-2">
                              <a href="login.php" class="btn btn-primary" role="button"><i class="fas fa-shopping-cart mr-2"></i><span class="badge badge-light">4</span></a>
                         </div>
                    </div>
               </form>
          </nav>
          <!-- Nav -->
