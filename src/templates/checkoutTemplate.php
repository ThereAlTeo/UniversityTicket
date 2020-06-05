    <?php
    require(HEADER_DIR.$templateParams["header"]);
    ?>
    <div class="container">
        <div class="py-4 text-center text-ticketBlue">
            <p class="h3"><i class="fas fa-ticket-alt"></i> <?php echo strtoupper($templateParams["checkoutTitle"]) ?> <i class="fas fa-ticket-alt"></i></p>
        </div>
        <div class="row mb-3">
            <div class="col-lg-8 mb-3">
                <?php
                if(isset($templateParams["main"]))
                    require(MAIN_DIR.$templateParams["main"]);
                ?>
            </div>
            <div class="col-lg-4 mb-4">
                <aside class="">
                    <?php
                    if(isset($templateParams["summary"]))
                        require(SUMMARY_DIR.$templateParams["summary"]);
                    ?>
                </aside>
            </div>
        </div>
    </div>
    <?php
    if(isset($templateParams["footer"]))
        require(FOOTER_DIR.$templateParams["footer"]);
    ?>
