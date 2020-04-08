<div class="cardBoxSection">
    <?php
        $info = $dbh->getEventLocationInfoByID($_GET["IDLocation"]);
        if(strcmp($info["EventNum"], "0") != 0){
            $_GET["sectionBox"]["Name"] = $info["Nome"];
            $_GET["sectionBox"]["Number"] = $info["EventNum"];
            $_GET["sectionBox"]["Values"] = array();
            foreach ($dbh->getAllEventByLocationID($_GET["IDLocation"]) as $index => $item) {
                array_push($_GET["sectionBox"]["Values"], array("Path" => RES_DIR."images".$item["Locandina"],
                                                              "Name" => getCorrectArtistName($item),
                                                              "ID" => $item["IDEvento"],
                                                              "Star" => $item["Recommendation"],
                                                              "Price" => $item["Prezzounitario"],
                                                              "QueryKey" => "IDTour"));
            }
            include FACTORY_DIR.'kindSectionFactory.php';
        }else {
            $_GET["backHome"]["Section"] = $info["Nome"];
            $_GET["backHome"]["Text"] = "La location ".$info['Nome']." non contiene eventi al momenti.</br>Iscriviti alla newsletter per non perderti i prossimi in programmazione.";
            include FACTORY_DIR.'backToHome.php';
        }
    ?>
</div>
