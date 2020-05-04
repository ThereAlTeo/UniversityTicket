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
                        <?php if ($_GET["ticketSector"]["Disponibilita"]): ?>
                            <select class="form-control" id="ticketQntSelect">
                                <option selected value="und">Scegli quantità</option>
                                <?php foreach (range(1, $_GET["ticketSector"]["Disponibilita"]) as $value): ?>
                                    <option value="<?php echo $value ?>"><?php echo $value ?></option>
                                <?php endforeach; ?>
                            </select>
                        <?php else: ?>
                            <p class="font-weight-bolder text-danger text-uppercase h5">sold out</p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-6 text-right">
                    <?php if ($_GET["ticketSector"]["Disponibilita"]): ?>
                        <button type="button" class="btn btn-outline-warning orderBtn">Aggiungi <i class="fas fa-shopping-cart"></i></button>
                    <?php else: ?>
                        <button type="button" class="btn btn-danger btn-sm"><i class="fas fa-shopping-cart"></i></button>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php
    unset($_GET["ticketSector"]);
endif; ?>
