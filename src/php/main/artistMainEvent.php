<?php
require_once './../bootFiles.php';

$info = $dbh->getArtistInfo($_GET["IDArtist"])[0];
$name = getCorrectArtistName($info);
$locandinaPath = $dbh->getLocandinaByArtist($_GET["IDArtist"]);
$locandinaPath = !count($locandinaPath) ? getPathImageOrDefault() : getPathImageOrDefault($locandinaPath[0]);
?>
<div class="container text-dark">
    <div class="row mb-3">
        <div class="col-md-3 mb-3 mt-2">
            <p class="mb-2 h2"><?php echo $name ?></p><hr>
            <div class="row">
                <div class="col-md-12">
                    <div id="artistPageLegend" class="list-group">
                        <a class="font-weight-bold list-group-item list-group-item-action active" href="#ticket">Biglietti</a>
                        <a class="font-weight-bold list-group-item list-group-item-action" href="#bio">Biografia</a>
                        <a class="font-weight-bold list-group-item list-group-item-action" href="#reviews">Recensioni</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9 mb-3 mt-2">
            <div class="row">
                <div class="d-none d-sm-inline col-sm-3">
                    <img class="img-fluid img-thumbnail rounded mx-auto mb-4" src="<?php echo $locandinaPath ?>" alt="">
                </div>
                <div class="col-sm-9 mb-2">
                    <h2>Informazioni Generali</h2><hr>
                    <h5><small><strong>Artista/i partecipante: </strong><?php echo $name ?></small></h5>
                    <h5><small><strong>Eventi realizzati: </strong><?php echo count($dbh->selectedEventNumByArtist($_GET["IDArtist"], true)) ?></small></h5>
                    <h5><small><strong>Luoghi con evento attualmente: </strong><?php echo count($dbh->selectedEventNumByArtist($_GET["IDArtist"])) ?></small></h5>
                    <h5><small><strong>Votazione media: </strong></small><span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span></h5>
                </div>
            </div>
            <div>
                <div class="mb-4 text-ticketBlue ticketPublicInfo" id="ticket">
                    <div class="bg-white rounded-lg shadow">
                        <div class="p-3 bg-info text-white">
                            <p class="font-weight-bold h5">Biglietti</p>
                        </div>
                        <?php
                        $artistEvent = $dbh->selectedEventsInfo($_GET["IDArtist"]);

                        if(count($artistEvent)):
                            foreach ($artistEvent as $key => $value) {
                                $_GET["ticketLocation"]["Name"] = getCorrectArtistName($value);
                                $_GET["ticketLocation"]["Location"] = $value["LocationName"];
                                $_GET["ticketLocation"]["Address"] = $value["Indirizzo"];
                                $_GET["ticketLocation"]["Date"] = getEventDate(date_format(date_create($value["DataInizio"]), 'Y m d H:i'));
                                $_GET["ticketLocation"]["Price"] = $value["Price"];
                                $_GET["ticketLocation"]["IDEvent"] = $value["IDEvento"];

                                include FACTORY_DIR.'ticketLocation.php';
                            }
                    else: ?>
                        <div class="text-center text-ticketBlue m-2 p-1">
                            <p class="font-weight-bolder font-italic h4">L'artista <?php echo $name ?> al momento non ha eventi in programmazione.</p>
                        </div>
                    <?php endif; ?>
                    </div>
                </div>
                <div class="mb-4 text-ticketBlue" id="bio">
                    <div class="bg-white rounded-lg shadow">
                        <div class="p-3 bg-warning text-white">
                            <p class="font-weight-bold h5">Biografia</p>
                        </div>
                        <div class="m-2 p-3">
                            <p class="font-italic"><?php echo $info["Biografia"] ?></p>
                        </div>
                    </div>
                </div>
                <div class="mb-4 text-ticketBlue" id="reviews">
                    <div class="bg-white rounded-lg shadow cardBoxSection">
                        <div class="p-3 bg-ticketBlue text-white">
                            <p class="font-weight-bold">Recensioni</p>
                        </div>
                        <?php
                        $review = $dbh->getReviewDoneByIDArtista($_GET["IDArtist"]);
                        if(count($review)): ?>
                            <?php foreach ($review as $key => $value): ?>
                                <div class="row m-2 p-2 border-bottom border-gray">
                                    <div class="col-md-3 font-weight-bold text-left">
                                        <p><?php echo $value["NomeLocation"] ?><br><small><?php echo date_format(date_create($value["DataInizio"]), "d/m/Y") ?></small></p>
                                    </div>
                                    <div class="col-md-9 text-left">
                                        <span class="text-warning">
                                        <?php for ($i=1; $i <= 5; $i++) {
                                            echo $i <= floatval($value["Recommendation"]) ? "&#9733; " : "&#9734; ";
                                        } ?></span>
                                        <p class="h6"> <?php echo $value["Recensione"] ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="text-center text-ticketBlue m-2 p-1">
                                <p class="font-weight-bolder font-italic h5">L'artista non possiede al momento recensioni.<br>Acquista il biglietto e diventa il primo! </p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php unset($_GET["IDEvento"]); ?>
