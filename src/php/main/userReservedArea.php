<div class="col-md-8">
    <div class="card shadow mb-4">
        <a href="#collapseCardTicketSold" class="d-block card-header py-3 d-flex flex-row align-items-center justify-content-between" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardTicketSold">
            <p class="m-0 font-weight-bold text-primary h6">Biglietti Acquistati</p>
        </a>
        <div class="collapse show" id="collapseCardTicketSold">
            <div class="card-body">
                 <div class="table-responsive">
                      <table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                           <thead>
                                <tr>
                                     <th class="text-center">Artista</th>
                                     <th class="text-center">Luogo</th>
                                     <th class="text-center">Data evento</th>
                                     <th class="text-center">Biglietti acquistati</th>
                                </tr>
                           </thead>
                           <tbody>
                               <?php foreach ($dbh->getInfoTicketBuy($_SESSION["accountLog"]["IDUser"]) as $key => $value): ?>
                               <tr>
                                   <td class="text-center"><?php echo getCorrectArtistName($value) ?></td>
                                   <td class="text-center"><?php echo $value["NomeLocation"] ?></td>
                                   <td class="text-center"><?php echo date_format(date_create($value["DataInizio"]), "d/m/Y H:i") ?></td>
                                   <td class="text-center"><?php echo $value["NumTicket"] ?></td>
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
<div class="col-md-4">
    <div class="card shadow mb-4">
        <a href="#collapseCardPersonalData" class="d-block card-header py-3 d-flex flex-row align-items-center justify-content-between" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardPersonalData">
            <p class="m-0 font-weight-bold text-info h6">Dati Personali</p>
        </a>
        <div class="collapse show" id="collapseCardPersonalData">
            <div class="card-body">
                <?php $info = $dbh->getPersonInfoByID($_SESSION["accountLog"]["IDUser"])[0]; ?>
                <h5><small><strong>Nome:</strong> <?php echo $info["Nome"] ?></small></h5>
                <h5><small><strong>Cognome:</strong> <?php echo $info["Cognome"] ?></small></h5>
                <h5><small><strong>CF:</strong> <?php echo (isset($info["CF"])) ? $info["CF"] : "Non disponibille" ?></small></h5>
                <h5><small><strong>Data Nascita: </strong> <?php echo (isset($info["DataNascita"])) ? date_format(date_create($info["DataNascita"]), 'd/m/Y') : "Non disponibile" ?></small></h5>
                <h5><small><strong>Data Iscizione: </strong> <?php echo date_format(date_create($info["DataRegistrazione"]), 'd/m/Y') ?></small></h5>
            </div>
        </div>
    </div>
    <div class="card shadow mb-4">
        <a href="#collapseCardPassword" class="d-block card-header py-3 d-flex flex-row align-items-center justify-content-between" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardPassword">
            <p class="m-0 font-weight-bold text-warning h6">Modifica password</p>
        </a>
        <div class="collapse show" id="collapseCardPassword">
            <div class="card-body">
                <form class="text-ticketBlue needs-validation formInvalidFB" action="" method="POST" id="changePasswordForm" novalidate="">
                    <div class="form-group">
                         <label for="actualPassword" form="changePasswordForm">Password attuale</label>
                         <input type="password" id="actualPassword" class="form-control formControlUser" placeholder="Inserisci password attuale" pattern=".{1,}" title="La password attuale deve essere presente" required/>
                         <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                         <label for="newPassword" form="changePasswordForm">Password nuova</label>
                         <input type="password" id="newPassword" class="form-control formControlUser" placeholder="Inserisci nuova password" pattern=".{4,}" title="Inserisci la nuova password" required/>
                         <div class="invalid-feedback"></div>
                    </div>
                    <button class="btn btn-ticketBlue btn-block formBtnUser" type="submit" id="changePassword">Conferma</button>
                </form>
            </div>
        </div>
    </div>
    <div class="card shadow mb-4">
        <a href="#collapseCardHelp" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardHelp">
            <p class="m-0 font-weight-bold text-danger h6">Help e contatti</p>
        </a>
        <div class="collapse show" id="collapseCardHelp">
            <div class="card-body">
                <p>Il progetto gestisce l'acquisto di biglietti per eventi dislocati sul territorio italiano e non solo. Gli ugenti che possono essere organizzatori o user dispongono di funzionalità per monitorare le operazioni che svolgono.</p>
                <p>Per info, si prega di contattare il creatore della piattaforma <strong>matteo.alesiani2@studio.unibo.it</strong></p>
            </div>
        </div>
    </div>
</div>
