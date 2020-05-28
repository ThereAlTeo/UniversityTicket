<?php
    require(SUMMARY_DIR.'defaultSummary.php');
?>
    <h4 class="border-bottom font-weight-normal text-uppercase pb-2">Modalità di Spedizione</h4>
    <ul class="list-inline">
    <?php foreach ($dbh->getDeliveryMode() as $key => $value): ?>
        <li class="list-inline-item bg-white border border-info rounded text-ticketBlue p-2 mb-2">
            <p class="card-text font-weight-bold"><?php echo $value["Nome"] ?></p>
        </li>
    <?php endforeach; ?>
    </ul>
    <h4 class="border-bottom font-weight-normal text-uppercase pb-2">Modalità di Pagamento</h4>
    <ul class="list-inline">
    <?php foreach ($dbh->getPaymentMode() as $key => $value): ?>
        <li class="list-inline-item bg-white border border-warning rounded text-ticketBlue p-2 mb-2">
            <p class="card-text font-weight-bold"><?php echo $value["Nome"] ?></p>
        </li>
    <?php endforeach; ?>
    </ul>
