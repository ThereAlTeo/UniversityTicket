        <!-- Main Bacheca -->
        <div class="">
            <?php
                require(JUMBOTRN_DIR.$templateParams["jumbotron"]);

                foreach (getPairEventElement() as $key => $value) {
                    $info =  $dbh->getTipologiaInfo($value[0]);
                    if(strcmp($info["EventNum"], "0") != 0){
                        $_GET["kindSection"] = $value;
                        include FACTORY_DIR.'kindSectionFactory.php';
                    }
                }
            ?>
        </div>
        <!-- Main Bacheca -->
