          <!-- Reserved Area Dashboard -->
    <div>
        <div class="d-sm-flex align-items-center justify-content-between my-4">
            <h1 class="h3 mb-0 text-ticketBlue">Dashboard</h1>
        </div>
        <div class="row">
        <?php
        $infoCardText = $config['infoCardText'][$_SESSION["accountLog"]["IDAccesso"]];
        $infoCardColor = $config['infoCardColor'];
        $infoCardIcon = $config['infoCardIcon'][$_SESSION["accountLog"]["IDAccesso"]];
        $infoCardValue = array();

        switch ($_SESSION["accountLog"]["IDAccesso"]) {
            case 1: $infoCardValue = array("$".$dbh->getCahsTicketSold(), $dbh->getNumTicketSold(), $dbh->getLocationRecordNumber(), $dbh->getAccountRecordNumber());
                break;
            case 2: $infoCardValue = array("$".$dbh->getCahsTicketSold($_SESSION["accountLog"]["IDUser"]), $dbh->getEventNumByManager($_SESSION["accountLog"]["IDUser"]), $dbh->getArtistNumByManager($_SESSION["accountLog"]["IDUser"]), "$40,000");
                break;
            case 3: $infoCardValue = array("$40,000", "$40,000", "$40,000", "$40,000");
                break;
            default: throw new Exception("Error Processing Request", 1);
        }

        for ($i=0; $i < 4; $i++): ?>
            <div class="col-xl-3 col-sm-6 mb-4">
                <div class="card border-left-<?php echo $infoCardColor[$i] ?> shadow py-2">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-<?php echo $infoCardColor[$i] ?> text-uppercase mb-1"><?php echo $infoCardText[$i] ?></div>
                                <div class="h5 mb-0 font-weight-bold"><?php echo $infoCardValue[$i] ?></div>
                            </div>
                            <div class="col-auto text-gray-300">
                                <i class="<?php echo $infoCardIcon[$i] ?> fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endfor; ?>
        </div>
        <div class="row">
            <?php
            if ($_SESSION["accountLog"]["IDAccesso"] < 3):
                $idValues = array("chart-area", "chart-pie");
                $headerValues = $config['chartCardHeader'][$_SESSION["accountLog"]["IDAccesso"]];
                $column = array(8, 4);
                for ($i=0; $i < 2; $i++): ?>
                    <div class="col-12 col-md-<?php echo $column[$i] ?> p-2">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-ticketBlue"><?php echo $headerValues[$i] ?></h6>
                            </div>
                            <div class="card-body">
                                <div class="<?php echo $idValues[$i] ?>">
                                    <canvas id="reserved<?php echo ucfirst(explode("-", $idValues[$i])[1]).ucfirst(explode("-", $idValues[$i])[0]) ?>"></canvas>
                                </div>
                                <?php if (strcmp($idValues[$i], $idValues[1]) === 0): ?>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i> Direct
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> Social
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-info"></i> Referral
                                        </span>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endfor; ?>
            <?php endif; ?>
        </div>
    </div>
          <!-- Reserved Area Dashboard -->
