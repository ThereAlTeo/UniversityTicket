<div class="mx-5">
     <div class="my-3">
          <h1 class="h3 mb-2 text-ticketBlue">Location</h1>
     </div>
     <div class="row">
          <div class="col-12 col-lg-5">
               <div class="card shadow mb-5">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                         <h6 class="m-0 font-weight-bold text-primary">Location DataTable  </h6>
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
          <div class="col-12 col-lg-7">
               <div class="card shadow mb-5">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                         <h6 class="m-0 font-weight-bold text-primary">Aggiungi Nuova Location </h6>
                    </div>
                    <div class="card-body">
                         <div class="col-md-12">
                              <form id="locationForm" action="" method="POST">
                                   <h4 class="mb-3">Informazioni Generali</h4>
                                   <div class="row">
                                        <div class="col-md-6 mb-2">
                                             <label for="firstName">Nome</label>
                                             <input type="text" class="form-control" id="name" placeholder="Stadio San Siro" required>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                             <label for="address">Indirizzo</label>
                                             <input type="text" class="form-control" id="address" placeholder="Piazzale Angelo Moratti, 20151" required>
                                        </div>
                                   </div>
                                   <hr class="my-2">
                                   <h4 class="mb-3">Informazioni Settori</h4>
                                   <div class="locationSector mb-3">
                                   </div>
                                   <div class="d-flex justify-content-end">
                                        <button class="btn btn-success" type="submit" id="addSector"><i class="fa fa-plus-square"></i> Aggiugi settore</button>
                                        <button class="btn btn-danger ml-3" type="submit" id="deleteSector"><i class="fa fa-minus-square"></i></button>
                                   </div>
                                   <hr class="my-3">
                                   <div class="d-flex justify-content-center">
                                        <button class="btn btn-ticketBlue" type="submit" id="insertLocation">Inserisci Location</button>
                                   </div>
                              </form>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</div>
