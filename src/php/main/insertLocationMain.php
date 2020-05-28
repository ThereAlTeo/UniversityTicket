     <?php
     $templateParams["headerPage"] = array("Location", "all'interno di questa sezione, potrai gestire in maniera opportuna i posti nei quali verranno svolti eventi.", $dbh->getLocationRecordNumber());
     require(FACTORY_DIR."reservedPagesHeader.php");
     ?>
     <div class="row">
          <div class="col-12 col-lg-6">
               <div class="card shadow mb-5">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Elenco Location</h6>
                    </div>
                    <div class="card-body">
                         <div class="table-responsive">
                              <table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                                   <thead>
                                        <tr>
                                             <th class="text-center">Nome</th>
                                             <th class="text-center">Indirizzo</th>
                                             <th class="text-center">Nr Eventi</th>
                                             <th class="text-center">Biglietti venduti</th>
                                        </tr>
                                   </thead>
                                   <tbody>
                                   <?php foreach ($dbh->getAllLocationInfo() as $key => $value): ?>
                                       <tr>
                                       <?php foreach ($value as $index => $item): ?>
                                           <td class="text-center"><?php echo $item ?></td>
                                       <?php endforeach; ?>
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
          <div class="col-12 col-lg-6">
               <div class="card shadow mb-5">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Aggiungi Nuova Location</h6>
                    </div>
                    <div class="card-body">
                         <div class="col-md-12">
                              <form id="locationForm" action="" method="POST" class="formInvalidFB needs-validation text-ticketBlue" novalidate="">
                                  <h4 class="mb-3">Informazioni Generali</h4>
                                   <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="firstName" form="locationForm">Nome</label>
                                                <input type="text" class="form-control formControlUser text-capitalize" id="name" placeholder="Stadio San Siro" pattern=".{3,}" title="Campo Nome Obbligatorio" required/>
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="address" form="locationForm">Indirizzo</label>
                                                <input type="text" class="form-control formControlUser text-capitalize" id="address" placeholder="Piazzale Angelo Moratti, 20151" pattern=".{3,}" title="Campo Indirizzo Obbligatorio" required/>
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                   </div>
                                   <div class="row">
                                       <div class="col-12">
                                           <div class="form-group">
                                               <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="locationImage" accept="image/*" name="locationImage" title="Campo Obbligatorio" required/>
                                                    <label class="custom-file-label" for="locationImage">Carica foto del luogo</label>
                                                    <div class="invalid-feedback"></div>
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                                   <hr class="my-2">
                                   <h4 class="mb-3">Informazioni Settori</h4>
                                   <div class="locationSector mb-3">
                                   </div>
                                   <div class="col-12 d-flex justify-content-end">
                                           <button class="btn btn-success formBtnUser" type="submit" id="addSector"><i class="fa fa-plus-square"></i> Aggiugi settore</button>
                                           <button class="btn btn-danger ml-3" type="submit" id="deleteSector"><i class="fa fa-minus-square"></i></button>
                                   </div>
                                   <hr class="my-3">
                                   <div class="d-flex justify-content-center">
                                        <button class="btn btn-ticketBlue formBtnUser" type="submit" id="insertLocation">Inserisci Location</button>
                                   </div>
                              </form>
                         </div>
                    </div>
               </div>
          </div>
     </div>
