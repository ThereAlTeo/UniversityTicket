<?php if (isset($_GET["ticketLocation"])): ?>
    <div class="row m-2 d-flex align-items-center px-1 border-bottom border-gray ticketInfo">
        <div class="col-md-6">
            <div class="row align-items-center">
                <div class="col-4">
                    <p class="text-center font-weight-bold"> <?php echo $_GET["ticketLocation"]["Name"] ?></p>
                </div>
                <div class="col-8 text-left">
                    <p class="h5"><?php echo $_GET["ticketLocation"]["Location"] ?></p>
                    <p class="blockquote-footer"><?php echo $_GET["ticketLocation"]["Address"] ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-4">
                    <p class="text-left font-weight-bold"><?php echo $_GET["ticketLocation"]["Date"] ?></p>
                </div>
                <div class="col-8 text-left d-flex justify-content-around align-items-center">
                    <p class="h6">Biglietti da €<?php echo $_GET["ticketLocation"]["Price"] ?></p>
                    <a href="./singleEventPage.php?IDEvent=<?php echo $_GET["ticketLocation"]["IDEvent"] ?>"><button type="button" class="btn btn-outline-success btn-sm"><i class="fas fa-credit-card"></i></button></a>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
