<?php
require_once './../bootFiles.php';
if (isset($_GET["sectionBox"])): ?>
    <h3 class="pb-2 text-dark font-weight-bold text-capitalize"><?php echo $_GET["sectionBox"]["Name"] ?><small>(<?php echo $_GET["sectionBox"]["Number"] ?>)</small></h3>
    <div class="row mb-2 border-bottom d-flex justify-content-center mx-5 ">
    <?php foreach ($_GET["sectionBox"]["Values"] as $index => $item) {
        $_GET["ticketBox"]["Path"] = $item["Path"];
        $_GET["ticketBox"]["Name"] = $item["Name"];
        $_GET["ticketBox"]["ID"] = $item["ID"];
        $_GET["ticketBox"]["Star"] = $item["Star"];
        $_GET["ticketBox"]["Price"] = $item["Price"];
        $_GET["ticketBox"]["QueryKey"] = $item["QueryKey"];
        include FACTORY_DIR.'ticketBoxFactory.php';
    } ?>
    </div>
<?php unset($_GET["sectionBox"]);
endif; ?>
