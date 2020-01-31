<?php
     if(isset($_GET["category"])){
               println('
               <div class="row">
                    <div class="col-12 col-sm-12 ">
                         <p class="text-left">'.$_GET["category"].'</p>
                    </div>
               </div>');
               unset($_GET["category"]);
     }
 ?>
