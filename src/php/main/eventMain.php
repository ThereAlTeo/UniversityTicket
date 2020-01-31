          <div class="mx-5">
               <div class="my-3">
                    <h1 class="h3 mb-2 text-ticketBlue">Eventi</h1>
                    <p class="mb-3"><i class="font-weight-bold "> <?php echo $_SESSION["accountLog"][0] ?></i> da qui puoi monitorare l'andamento degli eventi che hai organizzato.</p>
               </div>
               <div class="row">
                    <div class="col-12 col-lg-4">
                         <div class="row">
                              <div class="col-12 content">
                                   <div class="card shadow mb-3">
                                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                             <h6 class="m-0 font-weight-bold text-primary">Dettagli Evento</h6>
                                             <i class="fa font-weight-bold fa-lg text-primary arrow"></i>
                                        </div>
                                        <div class="card-body">

                                        </div>
                                   </div>
                                   <div class="card shadow mb-5">
                                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                             <h6 class="m-0 font-weight-bold text-primary">Aggiungi Evento</h6>
                                             <a href="#exampleModalCenter" data-toggle="modal"><i class="fa font-weight-bold fa-lg text-primary"></i></a>
                                             <!-- Modal -->
                                             <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                             <div class="modal-dialog modal-dialog-centered" role="document">
                                             <div class="modal-content">
                                             <div class="modal-header">
                                             <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                             <span aria-hidden="true">&times;</span>
                                             </button>
                                             </div>
                                             <div class="modal-body">
                                             ...
                                             </div>
                                             <div class="modal-footer">
                                             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                             <button type="button" class="btn btn-primary">Save changes</button>
                                             </div>
                                             </div>
                                             </div>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
                    <div class="col-12 col-lg-8">
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

          </div>
