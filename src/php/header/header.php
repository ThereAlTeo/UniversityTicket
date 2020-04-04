<!-- Header -->
          <header class="py-3 bg-ticketBlue text-white">
               <div class="row mx-3 d-flex justify-content-sm-between align-items-center">
                    <div class="col-6 col-md-2 text-left">
                         <a href="bacheca.php">
                              <img <?php echo 'src="'.RES_DIR.'images/logoForse.png"'; ?> width="70" height="70" class="d-inline-block align-top" alt="Logo">
                         </a>
                    </div>
                    <div class="d-none d-md-inline text-md-center col-sm-8">
                        <h1 class=""><i class="fas fa-ticket-alt"></i> UNIVERSITYTICKET <i class="fas fa-ticket-alt"></i></h1>
                         <p class="text-md-center mx-5">
                              Biglietti, Concerti, Spettacolo, Sport & Cultura
                         </p>
                    </div>
                    <div class="col-6 col-md-2 text-right">
                         <?php
                         if(isset($_GET["login"])){
                              println('<p class="font-weight-bold font-italic text-right text-warning small">'.$_GET["login"].'</p>');
                              unset($_GET["login"]);
                         }
                         else
                              println('<a href="login.php" class="btn btn-outline-warning btn-rounded pull-right" role="button">Accedi<i class="fa fa-user ml-3"></i></a>');
                         ?>
                    </div>
               </div>
          </header>
          <!-- Header -->
