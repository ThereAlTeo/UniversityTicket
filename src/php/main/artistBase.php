    <?php
    $templateParams["headerPage"] = array("Artisti", "da qui puoi monitorare l'operato degli artisti scritturati.", count($dbh->getArtistByManager($_SESSION["accountLog"]["IDUser"])));
    require(FACTORY_DIR."reservedPagesHeader.php");
    ?>
    <div class="row">
        <div class="col-12 col-lg-3">
        <?php
        $templateParams["menuPage"] = array(array("success", "fas fa-user-plus", "Aggiungi Artista", "addArtist"));
        require(FACTORY_DIR."reservedMenu.php");
        $templateParams["modal"] = "addArtist";
        require(FACTORY_DIR."modalItem.php");
        ?>
        </div>
        <div class="col-12 col-lg-9">
            <div class="card shadow mb-5">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Elenco Artisti o Compagnia</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="text-center" id="ArtistName">Nome Artista</th>
                                    <th class="text-center" id="ArtistBirth">Data Nascita</th>
                                    <th class="text-center" id="ArtistEvents">Eventi svolti</th>
                                    <th class="text-center" id="ArtistTicket">Biglietti venduti</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($dbh->getArtistWorkInfo($_SESSION["accountLog"]["IDUser"]) as $key => $value): ?>
                                <tr>
                                    <td class="text-center" headers="ArtistName"><?php echo getCorrectArtistName($value) ?></td>
                                    <td class="text-center" headers="ArtistBirth">
                                    <?php if (isset($value["DataNascita"])): ?>
                                    <?php echo date_format(date_create($value["DataNascita"]), "d/m/Y") ?>
                                    <?php else: ?>
                                    Non registrata
                                    <?php endif; ?>
                                    </td>
                                    <td class="text-center" headers="ArtistEvents"><?php echo $value["EventNum"] ?></td>
                                    <td class="text-center" headers="ArtistTicket"><?php echo $value["TicketBuy"] ?></td>
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
