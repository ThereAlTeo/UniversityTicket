     <?php
     $templateParams["headerPage"] = array("Eventi", "da qui puoi monitorare l'andamento degli eventi che hai organizzato.", count($dbh->getEventByManager($_SESSION["accountLog"]["IDUser"])));
     require(FACTORY_DIR."reservedPagesHeader.php");
     ?>
     <div class="row">
          <div class="col-12 col-lg-3">
               <?php
               $templateParams["menuPage"] = array(array("success", "fas fa-calendar-plus", "Aggiungi Evento", "addEvent"), array("warning", "fas fa-calendar-minus", "Modifica Evento", "modifyEvent"));
               require(FACTORY_DIR."reservedMenu.php");
               $templateParams["modal"] = "addEvent";
               require(FACTORY_DIR."modalItem.php");
              $templateParams["modal"] = "modifyEvent";
               require(FACTORY_DIR."modalItem.php");
               ?>
          </div>
                    <div class="col-12 col-lg-9">
                         <div class="card shadow mb-5">
                              <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                  <h6 class="m-0 font-weight-bold text-primary">Elenco Eventi</h6>
                              </div>
                              <div class="card-body">
                                   <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                                             <thead>
                                                  <tr>
                                                       <th class="text-center">Nome evento</th>
                                                       <th class="text-center">Artista partecipante</th>
                                                       <th class="text-center">Luogo</th>
                                                       <th class="text-center">Data evento</th>
                                                       <th class="text-center">Biglietti venduti</th>
                                                  </tr>
                                             </thead>
                                             <tbody>
                                                 <?php foreach ($dbh->getEventInfoReserved($_SESSION["accountLog"]["IDUser"]) as $key => $value): ?>
                                                 <tr id="<?php echo $value["IDEvento"]."-".$value["IDArtista"] ?>">
                                                     <td class="text-center"><?php echo $value["Titolo"] ?></td>
                                                     <td class="text-center"><?php echo getCorrectArtistName($value) ?></td>
                                                     <td class="text-center"><?php echo $value["NomeLocation"] ?></td>
                                                     <td class="text-center"><?php echo date_format(date_create($value["DataInizio"]), "d/m/Y H:i") ?></td>
                                                     <td class="text-center"><?php echo $value["TicketBuy"] ?></td>
                                                 </tr>
                                                 <?php endforeach; ?>
                                             </tbody>
                                        </table>
                                   </div>
                                   <div class="d-flex justify-content-center my-2">
                                        <nav aria-label="Page navigation">
                                             <ul class="pagination"></ul>
                                        </nav>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
