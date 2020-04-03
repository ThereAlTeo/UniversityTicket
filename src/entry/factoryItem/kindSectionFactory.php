<?php
require_once './../bootFiles.php';

if (isset($_GET["kindSection"])) {
    $info =  $dbh->getTipologiaInfo($_GET["kindSection"][0]);
    if(strcmp($info["EventNum"], "0") != 0){
        println('<h3 class="pb-2 text-dark font-weight-bold text-capitalize">'.$info["Nome"].' <small>('.$info["EventNum"].')</small></h3>');
        println('<div class="row mb-2 border-bottom d-flex justify-content-center">');
        foreach ($dbh->getBachecaSectionInfoByKindID($_GET["kindSection"]) as $index => $item) {
            $_GET["ticketBox"]["Path"] = RES_DIR."images".$item["Locandina"];
            $_GET["ticketBox"]["Name"] = getCorrectArtistName($item);
            $_GET["ticketBox"]["IDEvent"] = $item["IDEvento"];
            $_GET["ticketBox"]["Star"] = $item["Recommendation"];
            $_GET["ticketBox"]["Price"] = $item["Prezzounitario"];
            include FACTORY_DIR.'ticketBoxFactory.php';
        }
        println('</div>');
    }
    unset($_GET["kindSection"]);
}
?>
