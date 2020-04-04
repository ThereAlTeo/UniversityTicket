     <?php
     $templateParams["headerPage"] = array("Eventi", "da qui puoi monitorare l'andamento degli eventi che hai organizzato.", "");
     require(FACTORY_DIR."reservedPagesHeader.php");
     ?>
     <div class="row">
          <div class="col-12 col-lg-3">
               <?php
               $templateParams["menuPage"] = array(array("success", "fas fa-calendar-plus", "Aggiungi Evento", "addEvent"), array("warning", "fas fa-calendar-minus", "Modifica Evento", "modifyEvent"), array("danger", "fas fa-calendar-times", "Elimina Evento", "deleteEvent"));
               require(FACTORY_DIR."reservedMenu.php");
               $templateParams["modal"] = "addEvent";
               require(FACTORY_DIR."modalItem.php");
               ?>
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
                                                       <th class="text-center">Data evento</th>
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
