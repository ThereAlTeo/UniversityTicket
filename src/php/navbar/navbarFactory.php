          <!--Navbar -->
          <nav class="navbar navbar-expand-md navbar-light bg-white shadow justify-content-end py-2">
               <div class="nav-item dropdown no-arrow mx-1">
                    <a class="nav-link dropdown-toggle text-muted" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         <i class="fas fa-bell fa-fw "></i>
                         <span class="badge badge-danger badge-counter">3</span>
                    </a>
               </div>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#reservedAreaNavbar" aria-controls="reservedAreaNavbar" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
               </button>
               <div class="collapse navbar-collapse flex-grow-0" id="reservedAreaNavbar">
                    <ul class="navbar-nav m-auto text-right">
                         <li class="nav-item dropdown no-arrow active" id="navbarSupportedContent">
                              <a class="nav-link dropdown-toggle text-secondary" id="userAction" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fa fa-user mr-1"></i> <?php echo $_SESSION["accountLog"][0]; ?> </a>
                              <div class="dropdown-menu dropdown-menu-right dropdown-info">
                                   <a class="dropdown-item" href="./logout.php">Log out</a>
                              </div>
                         </li>
                    </ul>
               </div>
          </nav>
          <!--Navbar -->
