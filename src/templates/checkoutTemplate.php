    <?php
    require(HEADER_DIR.$templateParams["header"]);
    ?>
    <div class="container">
        <div class="py-4 text-center text-ticketBlue">
            <h3><i class="fas fa-ticket-alt"></i> CARRELLO <i class="fas fa-ticket-alt"></i></h3>
        </div>
        <div class="row mb-3">
            <div class="col-md-8 mb-3">
                <?php
                if(isset($templateParams["main"]))
                    require(MAIN_DIR.$templateParams["main"]);
                ?>
            </div>
            <div class="col-md-4 mb-4">
                <?php
                if(isset($templateParams["summary"]))
                    require(SUMMARY_DIR.$templateParams["summary"]);
                ?>
            </div>
        </div>
    </div>
    <?php
    if(isset($templateParams["footer"]))
        require(FOOTER_DIR.$templateParams["footer"]);
    ?>
