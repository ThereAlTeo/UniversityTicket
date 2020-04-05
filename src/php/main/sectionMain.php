        <div class="cardBoxSection">
            <?php
                require(JUMBOTRN_DIR.$templateParams["jumbotron"]);

                $value = array($_GET["IDType"], 0);
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
                                                                      "Price" => $item["Prezzounitario"]));
                    }
                    include FACTORY_DIR.'kindSectionFactory.php';
                }else { ?>
                    <div class="text-center text-ticketBlue">
                        <h1 class="display-1 text-uppercase font-weight-bold mt-5"><?php echo $info["Nome"] ?></h1>
                        <h3 class="font-weight-light mb-5"> La sezione <?php echo $info["Nome"] ?> non contiene eventi al momenti.</br> Iscriviti alla newsletter per non perderti i prossimi in programmazione. </h3>
                        <p class="my-2">
                            <a href="./bacheca.php" class="my-2">&larr; Torna alla HOMEPAGE</a>
                        </p>
                    </div>
            <?php
                }
            ?>
        </div>
