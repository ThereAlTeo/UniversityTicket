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
                                             <div class="col-auto text-secondary">
                                             <i class="fa '.$values[2].' fa-2x"></i>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>');
     unset($_GET["infoCard"]);
}

if (isset($_GET["chartCard"])) {
     $values = $_GET["chartCard"];
                    println('
                    <div class="col-12 col-md-'.$values[3].' p-2">
                         <div class="card shadow mb-4">
                              <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                   <h6 class="m-0 font-weight-bold text-danger">'.$values[1].'</h6>
                              </div>
                              <div class="card-body">
                                   <div class="chart-container">
                                        <canvas id="'.$values[0].'" height="'.$values[2].'"></canvas>
                                   </div>
                              </div>
                         </div>
                    </div>');
     unset($_GET["chartCard"]);
}
?>
