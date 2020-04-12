<?php if (isset($_GET["ticketSector"])): ?>
    <div class="row m-2 d-flex align-items-center ticketInfo border-bottom border-gray" id="<?php echo $_GET["ticketSector"]["IDSettore"] ?>">
        <div class="col-md-6">
            <div class="row d-flex align-items-center">
                <div class="col-6">
                    <p class="text-center font-weight-bold my-2"><?php echo $_GET["ticketSector"]["Name"] ?></p>
                </div>
                <div class="col-6">
                    <p class="text-center font-weight-bold my-2">€<?php echo $_GET["ticketSector"]["Price"] ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row d-flex align-items-center">
                <div class="col-6">
                    <div class="form-group d-flex align-items-center my-2">
                        <select class="form-control" id="ticketQntSelect">
                            <option selected>Scegli quantità</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                </div>
                <div class="col-6 text-right">
                    <button type="button" class="btn btn-outline-warning orderBtn">Aggiungi <i class="fas fa-shopping-cart"></i></button>
                </div>
            </div>
        </div>
    </div>
<?php
    unset($_GET["ticketSector"]);
endif; ?>
