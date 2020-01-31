          <!--Navbar -->
          <nav class="navbar navbar-expand-sm navbar-dark" style="background-color: #043353;">
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse px-4" id="navbarNav">
                    <ul class="navbar-nav">
     <?php
     if (isset($_GET["barAccess"])) {
          foreach ($_GET["barAccess"] as $key => $value) {
               printTabln(' <li class="nav-item dropdown mr-2">
                              <a class="nav-link dropdown-toggle btn-lg" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.$key.'</a>
                              <div class="dropdown-menu" aria-labelledby="navbarDropdown">', 5);

                    foreach ($_GET["barAccess"][$key] as $index => $item) {
                         printTabln(' <a class="dropdown-item" href="./'.$item[1].'">'.$item[0].'</a>', 8);
                    }

               printTabln('      </div>
                         </li>', 6);
          }
     }
     ?>
                    </ul>
                    <ul class="navbar-nav ml-auto nav-flex-icons ">
                         <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle h6 align-middle" id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                   <i class="fa fa-user mr-1"></i> <?php echo $_SESSION["accountLog"][0]; ?> </a>
                              <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
                                   <a class="dropdown-item" href="./logout.php">Log out</a>
                              </div>
                         </li>
                    </ul>
               </div>
          </nav>
          <!--Navbar -->
