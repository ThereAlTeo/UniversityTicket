    <!-- Nav -->
    <nav class="py-2 bg-ticketBlue text-white mb-3 sticky-top">
        <div class="d-flex row mx-3 justify-content-between">
            <div class="col-3 col-sm-3 col-md-2">
                <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-calendar-day"></i>
                    </button>
                    <div class="dropdown-menu">
                    <?php
                    $types = $dbh->getEventType();
                    for ($x = 0; $x < count($types); $x++): ?>
                        <a class="dropdown-item" href="./kindSection.php?IDType=<?php echo $types[$x]["IDTipologia"] ?>"><?php echo $types[$x]["Nome"] ?></a>
                        <?php if ($x != count($types) - 1): ?>
                            <div class="dropdown-divider"></div>
                        <?php endif; ?>
                    <?php endfor; ?>
                    </div>
                </div>
            </div>
            <div class="col-6 col-sm-6 col-md-8">
                <form method="POST">
                    <div class="input-group">
                        <input class="form-control" type="search" placeholder="Ricerca evento, artista o località ..." aria-label="Search" id="searchInput">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                    <div class="input-group">
                        <ul class="list-group animated--grow-in" id="searchResult"></ul>
                    </div>
                </form>
            </div>
                <div class="col-3 text-right col-sm-3 col-md-2">
                    <a href="./checkout.php" class="btn btn-primary navCheckout" role="button" aria-pressed="true"><i class="fas fa-shopping-cart mr-2"></i>
                    <?php if(isset($_COOKIE["checkout"])): ?>
                        <span class="badge badge-pill badge-light"><?php echo getNumticketInOrder(unserialize($_COOKIE["checkout"])) ?></span>
                    <?php endif; ?>
                    </a>
                </div>
            </div>
    </nav>
    <!-- Nav -->
