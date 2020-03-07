     <?php
     $templateParams["headerPage"] = array("Eventi", "da qui puoi monitorare l'andamento degli eventi che hai organizzato.", "");
     require(FACTORY_DIR."reservedPagesHeader.php");
     ?>
     <div class="row">
          <div class="col-12 col-lg-3">
               <?php
               $templateParams["menuPage"] = array(array("success", "fas fa-calendar-plus", "Aggiungi Evento", "addEvent"));
               require(FACTORY_DIR."reservedMenu.php");
               $templateParams["modal"] = "addEvent";
               require(FACTORY_DIR."modalItem.php");
               ?>
               <div class="row">
                    <div class="col-12 content">
                         <div class="card shadow my-5">
                           <a href="#eventDetails" class="d-block card-header py-3" data-toggle="collapse" role="button">
                             <h6 class="m-0 font-weight-bold text-primary">Dettagli Evento</h6>
                           </a>
                           <div class="collapse show" id="eventDetails">
                             <div class="card-body">
                               This is a collapsable card example using Bootstrap's built in collapse functionality. <strong>Click on the card header</strong> to see the card body collapse and expand!
                             </div>
                           </div>
                         </div>
                    </div>
               </div>
          </div>
                    <div class="col-12 col-lg-9">
                         <div class="card shadow mb-5">
                              <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                   <h6 class="m-0 font-weight-bold text-primary">Account DataTable  </h6>
                              </div>
                              <div class="card-body">
                                   <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                                             <thead>
                                                  <tr>
                                                       <th class="text-center">Nome evento</th>
                                                       <th class="text-center">Artista partecipante</th>
                                                       <th class="text-center">Biglietti venduti</th>
                                                  </tr>
                                             </thead>
                                             </tbody>
                                        </table>
                                   </div>
                                   <div class="d-flex justify-content-center my-2">
                                        <nav aria-label="Page navigation">
                                             <ul class="pagination">
                                             </ul>
                                        </nav>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
