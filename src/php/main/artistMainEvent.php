<?php
require_once './../bootFiles.php';

$info = $dbh->selectedEventInfo($_GET["IDTour"]);
$name = getCorrectArtistName($info);
$luoghi = $dbh->selectedEventLocationInfo($_GET["IDTour"]);
?>
<div class="container text-dark">
    <div class="row mb-3">
        <div class="col-md-3 mb-3 mt-2">
            <h2 class="mb-2"><?php echo $name ?></h2><hr>
            <div class="row">
                <div class="col-md-12">
                    <div id="artistPageLegend" class="list-group">
                        <a class="font-weight-bold list-group-item list-group-item-action active" href="#ticket">Biglietti</a>
                        <a class="font-weight-bold list-group-item list-group-item-action" href="#bio">Biografia</a>
                        <a class="font-weight-bold list-group-item list-group-item-action" href="#reviews">Recensioni</a>
                        <?php
                        if (count($luoghi)) { ?>
                            <a class="font-weight-bold list-group-item list-group-item-action" href="#reviews">Luoghi</a>
                    <?php }
                        ?>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-9 mb-3 mt-2">
            <div class="row">
                <div class="col-3">
                    <img class="img-fluid img-thumbnail rounded mx-auto mb-4" src="<?php echo RES_DIR."images".$info["Locandina"] ?>" alt="">
                </div>
                <div class="col-9">
                    <h2>Informazioni Generali</h2><hr>
                    <h5><small><strong>Artista/i partecipante: </strong><?php echo $name ?></small></h5>
                    <h5><small><strong>Eventi realizzati: </strong>16</small></h5>
                    <h5><small><strong>Luoghi con evento attualmente: </strong><?php echo count($luoghi) ?></small></h5>
                    <h5><small><strong>Votazione media: </strong></small><span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span></h5>
                </div>
            </div>
            <div>
                <div class="mb-4 text-ticketBlue" id="ticket">
                    <div class="bg-white rounded-lg shadow">
                        <div class="p-3 bg-info text-white">
                            <h5 class="font-weight-bold">Biglietti</h5>
                        </div>
                        <?php
                            foreach ($dbh->selectedEventsInfo($_GET["IDTour"]) as $key => $value) {
                                $_GET["ticketLocation"]["Name"] = getCorrectArtistName($value);
                                $_GET["ticketLocation"]["Location"] = $value["LocationName"];
                                $_GET["ticketLocation"]["Address"] = $value["Indirizzo"];
                                $_GET["ticketLocation"]["Date"] = getEventDate(date_format(date_create($value["DataInizio"]), 'Y m d H:i'));
                                $_GET["ticketLocation"]["Price"] = $value["Price"];
                                $_GET["ticketLocation"]["IDEvent"] = $value["IDEvento"];

                                include FACTORY_DIR.'ticketLocation.php';
                            }
                        ?>
                    </div>
                </div>
                <div class="mb-4 text-ticketBlue" id="bio">
                    <div class="bg-white rounded-lg shadow">
                        <div class="p-3 bg-warning text-white">
                            <h5 class="font-weight-bold">Biografia</h5>
                        </div>
                        <div class="m-2 p-3">
                            <p class="font-italic">
                                <?php echo $info["Biografia"] ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="mb-4 text-ticketBlue" id="reviews">
                    <div class="bg-white rounded-lg shadow">
                        <div class="p-3 bg-ticketBlue text-white">
                            <h5 class="font-weight-bold">Recensioni</h5>
                        </div>
                        <div class="row m-2 p-2 border-bottom border-gray">
                            <div class="col-md-3 font-weight-bold text-left">
                                <p>Stadio San Siro</p>
                                <p class="small">21/09/2020</p>
                            </div>
                            <div class="col-md-9 text-left">
                                <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
                                <p class="pb-3 mb-0 small lh-125">
                                    Il nome d'arte "Marracash" viene addottato dall'artista perchè da piccolo, essendo di <a href="#" id="textContinue"> Continua a leggere ...</a>
                                </p>
                                <p class="d-none d-print-block">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
unset($_GET["IDEvento"]);
?>
