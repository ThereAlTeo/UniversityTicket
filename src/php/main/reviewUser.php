    <?php
    $templateParams["headerPage"] = array("Recensioni", "all'interno di questa sezione, potrai inserire e visualizzare le recensioni fatte.", count($dbh->getReviewDoneByIDUser($_SESSION["accountLog"]["IDUser"])));
    require(FACTORY_DIR."reservedPagesHeader.php");
    ?>
    <div class="row">
        <div class="col-12 col-lg-5">
            <div class="card shadow mb-5">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <p class="m-0 font-weight-bold text-primary h6">Inserisci Recensione</p>
                </div>
                <div class="card-body">
                    <div class="col-md-12">
                        <form id="reviewForm" action="" method="POST" class="formInvalidFB needs-validation text-ticketBlue" novalidate="">
                            <p class="mb-3 h4">Informazioni Generali</p>
                            <div class="row text-left">
                                 <div class="col-12 form-group mb-3">
                                   <label for="locationSelect" form="reviewForm">Scegli Evento per recensione</label>
                                   <select class="custom-select form-control" id="reviewSelect" style="width: 100%;">
                                       <option value="none"></option>
                                   <?php foreach ($dbh->getEventEnableReview($_SESSION["accountLog"]["IDUser"]) as $key => $value): ?>
                                       <option value="<?php echo $value["Matricola"]."_".$value["IDAcquisto"] ?>"><?php echo getCorrectArtistName($value)." in ".$value["NomeLocation"] ?></option>
                                   <?php endforeach; ?>
                                   </select>
                                 </div>
                            </div>
                            <div class="form-group">
                                <label for="reviewTextArea" form="reviewForm">Inserisci la recensione</label>
                                <textarea class="form-control" id="reviewTextArea" rows="4" placeholder="Inserisci la recensione relativa al'evento selezionato" title="Il testo della recensione è obbligatorio" required></textarea>
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="row">
                                <label>Inserisci voto <small>(facoltativo)</small></label>
                            </div>
                            <div class='rating-stars text-center text-secondary'>
                                <ul class="list-inline" id="stars">
                                    <li class='star list-inline-item' title='Brutto' data-value='1'><i class='fa fa-star fa-fw fa-2x'></i></li>
                                    <li class='star list-inline-item' title='Niente di che' data-value='2'><i class='fa fa-star fa-fw fa-2x'></i></li>
                                    <li class='star list-inline-item' title='Buono' data-value='3'><i class='fa fa-star fa-fw fa-2x'></i></li>
                                    <li class='star list-inline-item' title='Eccellente' data-value='4'><i class='fa fa-star fa-fw fa-2x'></i></li>
                                    <li class='star list-inline-item' title='Epico' data-value='5'><i class='fa fa-star fa-fw fa-2x'></i></li>
                                </ul>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button class="btn btn-ticketBlue formBtnUser" type="submit" id="insertReview">Inserisci recensione</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
         </div>
         <div class="col-12 col-lg-7">
             <div class="mb-4 text-ticketBlue" id="reviews">
                 <div class="bg-white rounded-lg shadow cardBoxSection">
                     <div class="p-3 bg-ticketBlue text-white">
                         <p class="font-weight-bold h5">Elenco Recensioni</p>
                     </div>
                     <?php
                     $reviews = $dbh->getReviewDoneByIDUser($_SESSION["accountLog"]["IDUser"]);
                     ?>
                     <?php if (count($reviews)): ?>
                         <?php foreach ($reviews as $key => $value): ?>
                             <div class="row m-2 p-2 border-bottom border-gray d-flex align-items-start">
                                 <div class="col-md-3 font-weight-bold text-left">
                                     <p><?php echo $value["NomeLocation"] ?><br><small><?php echo date_format(date_create($value["DataInizio"]), "d/m/Y") ?></small></p>
                                 </div>
                                 <div class="col-md-9 text-left">
                                     <p class="h6"><?php echo getCorrectArtistName($value) ?></p>
                                     <p class="h6 small"> <?php echo $value["Recensione"] ?></p>
                                 </div>
                             </div>
                         <?php endforeach; ?>
                     <?php else: ?>
                         <div class="text-center text-ticketBlue m-2 p-1">
                             <p class="font-weight-bolder font-italic h5">Devi ancora inserire la tua prima recensione.<br>Facci sapere cosa hai provato durante gli eventi a cui hai parteciapto!</p>
                         </div>
                     <?php endif; ?>
                 </div>
             </div>
         </div>
    </div>
