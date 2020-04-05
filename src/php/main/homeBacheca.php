        <!-- Main Bacheca -->
        <div class="cardBoxSection">
            <?php
                require(JUMBOTRN_DIR.$templateParams["jumbotron"]);

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

                $info =  $dbh->getLocationWithEvent(6);
                if(count($info) > 0){
                    $_GET["sectionBox"]["Name"] = "Location";
                    $_GET["sectionBox"]["Number"] = count($info);
                    $_GET["sectionBox"]["Values"] = array();
                    foreach ($info as $key => $value) {
                        array_push($_GET["sectionBox"]["Values"], array("Path" => RES_DIR."images".$value["Immagine"],
                                                                      "Name" => $value["Nome"],
                                                                      "ID" => $value["IDLocation"],
                                                                      "Star" => $value["Recommendation"],
                                                                      "Price" => $value["Prezzounitario"],
                                                                      "QueryKey" => "IDLocation"));

                    }
                    include FACTORY_DIR.'kindSectionFactory.php';
                }

            ?>
        </div>
        <!-- Main Bacheca -->
