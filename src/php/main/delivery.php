<div class="card mb-4 shadow-sm text-ticketBlue">
    <h5 class="card-header font-weight-bold text-white bg-info">METODO DI SPEDIZIONE</h5>
    <div class="card-body">
        <?php foreach ($dbh->getDeliveryMode() as $key => $value): ?>
            <div class="row my-1">
                <div class="col-9">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="delivertRadio<?php echo $value["IDDelivery"] ?>"  name="delivertRadio" class="custom-control-input"/>
                        <label class="custom-control-label font-weight-bold h6" for="delivertRadio<?php echo $value["IDDelivery"] ?>"><?php echo $value["Nome"] ?></label>
                    </div>
                </div>
                <div class="col-3">
                    <p class="h6 text-right font-weight-bold">€<?php echo $value["Prezzo"] ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php
$userInfo = $dbh->getFullUserInfo($_SESSION["accountLog"]["IDAccesso"])[0];
?>
<div class="card mb-4 shadow-sm text-ticketBlue">
    <p class="card-header font-weight-bold h5 text-white bg-ticketBlue">I TUOI DATI</p>
    <div class="card-body">
        <form class="text-center py-md-2 needs-validation formInvalidFB" id="deliveryForm" action="" method="POST" novalidate="">
            <div class="row text-left">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="firstname" form="deliveryForm" hidden>Nome</label>
                        <input class="form-control formControlUser" id="firstname" type="text" value="<?php echo ucfirst($userInfo["Nome"]) ?>" disabled/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="lastname" form="deliveryForm" hidden>Cognome</label>
                        <input class="form-control formControlUser" id="lastname" type="text" value="<?php echo ucfirst($userInfo["Cognome"]) ?>" disabled/>
                        <div class="invalid-feedback"></div>
                    </div>
                </div>
            </div>
            <div class="row text-left">
                <div class="col-md-9">
                    <div class="form-group">
                        <label for="loginEmail" form="deliveryForm" hidden>E-mail</label>
                        <input type="email" id="loginEmail" class="form-control formControlUser" value="<?php echo $_SESSION["accountLog"]["Mail"] ?>" disabled/>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="birth" form="deliveryForm" hidden>Nascita</label>
                        <input class="form-control formControlUser" id="birth" type="text" value="<?php echo sqlFormatDatetime(explode(" ", $userInfo["DataNascita"])[0]) ?>" disabled/>
                    </div>
                </div>
            </div>
            <div class="row text-left">
                <div class="col-md-9">
                    <div class="form-group">
                        <label for="street" form="deliveryForm" hidden>Via</label>
                        <input class="form-control formControlUser" id="street" type="text" name="street" placeholder="Inserisci Via, Viale, Piazza di residenza" pattern=".{2,}" title="Via di almeno 2 caratteri" required/>
                        <div class="invalid-feedback"></div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="cap" form="deliveryForm" hidden>CAP</label>
                        <input class="form-control formControlUser" id="cap" type="text" name="CAP" placeholder="Inserisci CAP" pattern="[0-9]{2,}" title="CAP di almeno 2 caratteri" required/>
                        <div class="invalid-feedback"></div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="row d-flex justify-content-sm-between align-items-center mt-3">
    <div class="d-none d-sm-inline col-sm-6">
        <a href="checkout.php" class="text-primary text-decoration-none text-left h6"><i class="fas fa-long-arrow-alt-left"></i> Torna indietro</a>
    </div>
    <div class="col-sm-6">
        <a class="btn btn-outline-ticketBlue btn-block" type="submit" id="delivery" href="./payment.php" role="button">Salva e vai al pagamento</a>
    </div>
</div>
