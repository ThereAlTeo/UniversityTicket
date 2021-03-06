    <div class="container">
        <div class="p-3 my-3 text-white-50 bg-info rounded shadow-sm">
            <h4 class="mb-0 text-white">Elenco Notifiche</h4>
        </div>
        <div class="my-3 p-3 bg-white rounded shadow-sm">
            <p class="border-bottom border-gray pb-2 mb-0 h5">Notifiche recenti</p>
            <?php foreach ($dbh->getMessageByIDUser($_SESSION["accountLog"]["IDUser"]) as $key => $value): ?>
                <div class="text-muted pt-3 d-flex align-items-center border-bottom border-gray">
                    <div class="mr-3">
                        <div class="iconCircle bg-<?php echo getNoticeColor($key%6) ?>">
                        </div>
                    </div>
                    <div>
                        <div class="small text-gray-500"><?php echo getLongDateFormat($value["DataMessaggio"]) ?></div>
                        <p class="media-body py-2 my-0 small lh-125"><?php echo $value["Contenuto"] ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
