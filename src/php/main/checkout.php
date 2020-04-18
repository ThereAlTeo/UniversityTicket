<div class="card mb-2 shadow-sm">
    <?php foreach ($ticketGeneralInfo as $key => $value): ?>
        <div class="ticketEventInfo" id="<?php echo $value["IDEvent"]  ?>">
            <div class="row px-3 pt-3">
                <div class="d-none d-sm-inline col-sm-3">
                    <img class="img-fluid img-thumbnail rounded mx-auto mb-4" src="<?php echo $value["Image"] ?>" alt="">
                </div>
                <div class="col-sm-9 mb-2 text-secondary">
                    <h3 class="text-uppercase mb-3 text-ticketBlue"><?php echo $value["Title"] ?></h3>
                    <div class="row">
                        <div class="col-sm-4">
                            <p class="h5"><?php echo $value["LocationName"] ?></p>
                        </div>
                        <div class="col-sm-8">
                            <p class="h5 mb-3"><?php echo $value["Date"] ?></p>
                        </div>
                    </div>
                    <p class="h6"><small>Organizzato da: <?php echo $value["ManagerMail"] ?></small></p>
                </div>
            </div>
        </div>
        <div class="ticketEventSectorInfo">
            <?php foreach ($value["Sector"] as $index => $item): ?>
                <div class="row px-3" id="<?php echo $item["IDSector"] ?>">
                    <div class="col-7 col-sm-9">
                        <p class="h5 text-success"><?php echo $item["SectoreName"] ?>, Intero</p>
                        <p class="h6 text-ticketBlue mb-3">Posto <?php echo $item["Seat"] ?></p>
                    </div>
                    <div class="col-5 col-sm-3">
                        <p class="h5 text-right">€<?php echo $item["Price"] ?> <small class="text-danger"><i class="far fa-trash-alt"></i></small></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>
    <hr>
    <div class="row px-3 text-ticketBlue">
        <div class="col-8">
            <p class="h5">Subtotale</p>
        </div>
        <div class="col-4">
            <p class="h5 text-right">€<?php echo $ticketFinalPrice["SubTotal"] ?></p>
        </div>
        <div class="col-9">
            <p class="h5">Prevendita</p>
        </div>
        <div class="col-3">
            <p class="h5 text-right">€<?php echo $ticketFinalPrice["Prevendita"] ?></p>
        </div>
        <div class="col-6">
            <p class="h4 font-weight-bold">Totale Prezzo biglietti</p>
        </div>
        <div class="col-6">
            <p class="h4 text-right font-weight-bold">€<?php echo $ticketFinalPrice["SubTotal"] + $ticketFinalPrice["Prevendita"] ?></p>
        </div>
    </div>
</div>
<div class="row d-flex flex-sm-row-reverse mt-3">
    <div class="col-sm-6">
        <a class="btn btn-outline-ticketBlue btn-block" href="#" role="button">Procedi con l'acquisto</a>
    </div>
</div>
