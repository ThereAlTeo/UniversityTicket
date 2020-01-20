<?php

if (isset($_GET["infoCard"])) {
     $values = $_GET["infoCard"];
                    println('
                    <div class="col-xl-3 col-sm-6 mb-4">
                         <div class="card shadow py-2">
                              <div class="card-body">
                                   <div class="row align-items-center">
                                        <div class="col mr-2">
                                             <div class="text-xs font-weight-bold '.$values[1].' text-uppercase mb-1">'.$values[0].'</div>
                                             <div class="h5 mb-0 font-weight-bold">$40,000</div>
                                        </div>
                                             <div class="col-auto">
                                             <i class="fa '.$values[2].' fa-2x"></i>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>');
     unset($_GET["infoCard"]);
}
?>
