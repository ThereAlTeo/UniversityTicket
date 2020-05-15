<?php
require_once './../bootFiles.php';
$info = $dbh->getEventInfo($_GET["IDEvent"])[0];
$nameType = "Artista/i partecipante: ";

if (isset($info["IDArtista"]))
    $name = getCorrectArtistName($dbh->getArtistInfo($info["IDArtista"])[0]);
else {
    $nameType = "Evento di: ";
    $name = $dbh->getKindOfMusicInfo($info["IDGenere"])["Name"];
}
?>
<div class="container text-dark">
    <div class="row mb-3">
        <div class="col-md-3 mb-3 mt-2">
            <p class="mb-2 h2"><?php echo $name ?></p><hr>
            <div class="row">
                <div class="col-md-12">
                    <div id="eventPageLegend" class="list-group">
                        <a class="font-weight-bold list-group-item list-group-item-action active" href="#ticket">Biglietti</a>
                        <a class="font-weight-bold list-group-item list-group-item-action" href="#info">Info</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9 mb-3 mt-2">
            <div class="row">
                <div class="d-none d-sm-inline col-sm-3">
                    <img class="img-fluid img-thumbnail rounded mx-auto mb-4" src="<?php echo getPathImageOrDefault($info) ?>" alt="">
                </div>
                <div class="col-sm-9 mb-2">
                    <h2>Informazioni Generali</h2><hr>
                    <h5><small><strong>Titolo Evento:</strong> <?php echo $info["Titolo"] ?></small></h5>
                    <h5><small><strong><?php echo $nameType ?></strong><?php echo $name ?></small></h5>
                    <h5><small><strong>Luogo: </strong><?php echo $info["Nome"].", ".$info["Indirizzo"] ?></small></h5>
                    <h5><small><strong>Data: </strong><?php echo getEventDate(date_format(date_create($info["DataInizio"]), 'Y m d H:i')) ?></small></h5>
                </div>
            </div>
            <div>
                <div class="mb-4 text-ticketBlue ticketPublicInfo" id="ticket">
                    <div class="bg-white rounded-lg shadow">
                        <div class="p-3 bg-ticketBlue text-white">
                            <p class="font-weight-bold h5">Biglietti</p>
                        </div>
                        <?php
                        $sectorEvent = $dbh->getSectorInfoByEvent($_GET["IDEvent"]);
                        if (count($sectorEvent)):
                            foreach ($sectorEvent as $key => $value) {
                                $_GET["ticketSector"]["Name"] = $value["Nome"];
                                $_GET["ticketSector"]["Price"] = $value["Prezzounitario"];
                                $_GET["ticketSector"]["IDSettore"] = $value["IDSettore"];
                                $_GET["ticketSector"]["Disponibilita"] = min(5, $value["Disponibilita"], $value["Disponibilita"] - $dbh->getSectoTicketSold($value["IDEvento"], $value["IDSettore"]));

                                include FACTORY_DIR.'buyTicketSector.php';
                            }
                        else: ?>
                        <div class="text-center text-ticketBlue m-2 p-1">
                            <p class="font-weight-bolder font-italic h4">Non ci sono biglietti disponibili per questo evento.</p>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="mb-4 text-ticketBlue" id="info">
                    <div class="bg-white rounded-lg shadow">
                        <div class="p-3 bg-danger text-white">
                            <p class="font-weight-bold h5">Info</p>
                        </div>
                        <?php if(isset($info["Info"])): ?>
                            <div class="m-2 p-3">
                                <p class="font-italic"><?php echo $info["Info"] ?></p>
                            </div>
                        <?php else: ?>
                            <div class="text-center text-ticketBlue m-2 p-1">
                                <p class="font-weight-bolder font-italic h4">Non sono disponibili info rilevanti per questo evento.</br>BUON DIVERTIMENTO.</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php unset($_GET["IDEvent"]); ?>
