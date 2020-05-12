    <?php
    $reviews = $dbh->getReviewReceiptsByIDManager($_SESSION["accountLog"]["IDUser"]);
    $templateParams["headerPage"] = array("Recensioni", "all'interno di questa sezione, potrai visualizzare le recensioni relative agli eventi da te creati.", count($reviews));
    require(FACTORY_DIR."reservedPagesHeader.php");
    ?>
    <div class="container">
        <div class="p-3 my-3 text-white-50 bg-info rounded shadow-sm">
            <p class="h4 mb-0 text-white">Elenco Recensioni</p>
        </div>
        <div class="my-3 p-3 bg-white rounded shadow-sm">
            <p class="border-bottom border-gray pb-2 mb-0 h5">Recensioni recenti</p>
            <?php if (count($reviews)): ?>
                <?php foreach ($reviews as $key => $value): ?>
                    <div class="row text-muted mx-1 pt-3 d-flex align-items-between border-bottom border-gray">
                        <div class="d-none d-sm-inline col-sm-2">
                            <img class="img-fluid rounded float-left mb-4" src="<?php echo getPathImageOrDefault($value) ?>" alt="" width="100" height="100">
                        </div>
                        <div class="col-sm-10 mb-2">
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="h5"><small><strong>Luogo: </strong><?php echo $value["NomeLocation"] ?></small></p>
                                </div>
                                <div class="col-md-6">
                                    <p class="h5"><small><strong>Data: </strong><?php echo getEventDate(date_format(date_create($value["DataInizio"]), 'Y m d H:i')) ?></small></p>
                                </div>
                            </div>
                            <p class="h5"><small><strong>Recensione:</strong></small><h4><?php echo $value["Recensione"] ?></h4></p>
                            <span class="text-warning">
                            <?php for ($i=1; $i <= 5; $i++) {
                                echo $i <= floatval($value["Recommendation"]) ? "&#9733; " : "&#9734; ";
                            } ?></span>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>

            <?php endif; ?>
        </div>
    </div>
