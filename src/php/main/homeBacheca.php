        <!-- Main Bacheca -->
        <div class="cardBoxSection">
            <?php
                foreach (getPairEventElement() as $key => $value) {
                    $info =  $dbh->getTipologiaInfo($value[0]);
                    if(strcmp($info["EventNum"], "0") != 0){
                        $_GET["sectionBox"]["Name"] = $info["Nome"];
                        $_GET["sectionBox"]["Number"] = $info["EventNum"];
                        $_GET["sectionBox"]["Values"] = array();
                        foreach ($dbh->getBachecaSectionInfoByKindID($value) as $index => $item) {
                            array_push($_GET["sectionBox"]["Values"], array("Path" => RES_DIR."images".$item["Locandina"],
                                                                          "Name" => getCorrectArtistName($item),
                                                                          "ID" => $item["IDEvento"],
                                                                          "Star" => $item["Recommendation"],
                                                                          "Price" => $item["Prezzounitario"],
                                                                          "QueryKey" => "IDTour"));
                        }
                        include FACTORY_DIR.'kindSectionFactory.php';
                    }
                }

                $info = $dbh->getLocationWithEvent();
                if(count($info) > 0){
                    $_GET["sectionBox"]["Name"] = "Location";
                    $_GET["sectionBox"]["Number"] = count($info);
                    $_GET["sectionBox"]["Values"] = array();
                    foreach (range(0, 5) as $key => $value) {
                        if (isset($info[$value])) {
                            $eventRateInfo = $dbh->getLocationWithEventRateInfo($info[$value]["IDLocation"]);
                            array_push($_GET["sectionBox"]["Values"], array("Path" => RES_DIR."images".$info[$value]["Immagine"],
                                        "Name" => $info[$value]["Nome"], "ID" => $info[$value]["IDLocation"], "Star" => $eventRateInfo["Recommendation"],
                                        "Price" => $eventRateInfo["Prezzounitario"], "QueryKey" => "IDLocation"));
                        }

                    }
                    include FACTORY_DIR.'kindSectionFactory.php';
                }
            ?>
        </div>
        <!-- Main Bacheca -->
