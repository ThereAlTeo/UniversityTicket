<ul class="navbar-nav bg-ticketBlue sidebar sidebar-dark">
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="reservedArea.php">
          <div class="ml-2">
               <img <?php echo 'src="'.ROOT_DIR.'../res/images/logoForse.png"'; ?> width="40" height="40" class="d-inline-block align-top" alt="Logo">
          </div>
          <div class="sidebar-brand-text ml-1 mr-3">Universityticket</div>
     </a>
     <hr class="sidebar-divider my-0">
     <li class="nav-item <?php if(!isset($templateParams["menuIndex"]) || (isset($templateParams["menuIndex"]) && $templateParams["menuIndex"] == 0)) echo "active"; ?>">
          <a class="nav-link" href="reservedArea.php">
               <i class="fas fa-fw fa-tachometer-alt"></i>
               <span>Dashboard</span>
          </a>
     </li>
     <?php
     foreach(getMenuItem() as $key => $value){
          println('<hr class="sidebar-divider">');
          println('<div class="sidebar-heading">'.$key.'</div>');
          for ($i=0; $i <count($value); $i++) {
               println('<li class="nav-item'.((isset($templateParams["menuIndex"]) && $templateParams["menuIndex"] == $i + 1) ? " active" : "").'">
               <a class="nav-link" href="'.$value[$i][1].'">
               <i class="'.$value[$i][2].'"></i>
               <span>'.$value[$i][0].'</span></a>
               </li>');
          }
     }
     ?>
</ul>