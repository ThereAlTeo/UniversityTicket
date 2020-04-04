     <?php
     $templateParams["headerPage"] = array("Artisti", "da qui puoi monitorare l'operato degli artisti scritturati.", count($dbh->getArtistByManager($_SESSION["accountLog"][2])));
     require(FACTORY_DIR."reservedPagesHeader.php");
     ?>
     <div class="row">
          <div class="col-12 col-lg-2">
          <?php
          $templateParams["menuPage"] = array(array("success", "fas fa-user-plus", "Aggiungi Artista", "addArtist"));
          require(FACTORY_DIR."reservedMenu.php");
          $templateParams["modal"] = "addArtist";
          require(FACTORY_DIR."modalItem.php");
          ?>
          </div>
          <div class="col-12 col-lg-10">
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
                                             <th class="text-center">Nome evento</th>
                                             <th class="text-center">Artista partecipante</th>
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
