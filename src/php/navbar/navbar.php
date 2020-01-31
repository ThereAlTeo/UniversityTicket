          <!-- Nav -->
          <nav class="p-3 bg-ticketBlue text-white mb-3">
               <form method="POST">
                    <div class="form-group d-inline d-flex row mx-3 justify-content-between">
                         <div class="col-3 col-sm-3 col-md-2">
                              <div class="btn-group">
                                   <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                   Eventi
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
                         <div class="col-6 col-sm-6 col-md-6">
                              <input class="form-control mr-sm-2" type="search" placeholder="Ricerca evento, artista o località ..." aria-label="Search">
                         </div>
                         <div class="d-none d-md-none d-lg-inline col-md-2">
                              <button class="btn btn-primary my-2 my-sm-0" type="submit"><i class="fa fa-search"></i> Search</button>
                         </div>
                         <div class="col-3 col-sm-3 col-md-2">
                              <a href="login.php" class="btn btn-primary pull-right" role="button">Carrello <i class="fa fa-shopping-cart"></i> <span class="badge badge-light">4</span></a>
                         </div>
                    </div>
               </form>
          </nav>
          <!-- Nav -->
