<?php
    $formID = str_replace(" ", "", $_GET["paymentCardBody"]["Nome"])."Form";
?>
<form class="py-md-2 needs-validation formInvalidFB text-ticketBlue" id="<?php echo $formID ?>" action="" method="POST" novalidate="">
    <p class="text-center font-weight-bold h4 mb-4">Inserisci informazioni relative al titolare della carta</p>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <input class="form-control formControlUser" id="firstname" type="text" name="firstname" placeholder="Inserisci nome" pattern=".{2,}" title="Nome di almeno 2 caratteri" required>
                <div class="invalid-feedback"></div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <input class="form-control formControlUser" id="lastname"  type="text" name="lastname" placeholder="Inserisci cognome" pattern=".{2,}" title="Cognome di almeno 2 caratteri" required>
                <div class="invalid-feedback"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <input class="form-control formControlUser" id="cardNumber" type="text" name="firstname" placeholder="Inserisci numero di carta di credito" pattern=".[0-9]{12,}" title="I caratteri non sono sufficienti per identificare la carta" required>
                <div class="invalid-feedback"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 form-group mb-3">
            <label>Mese Scadenza</label>
            <select class="custom-select" id="monthSelect">
                <?php foreach (range(1, 12) as $key => $value): ?>
                    <option value="month<?php echo $value ?>"><?php echo $value ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-4 form-group mb-3">
            <label>Anno Scadenza</label>
            <select class="custom-select" id="yearSelect">
                <?php foreach (range(0, 25) as $key => $value):
                    $value += date("Y")?>
                    <option value="year<?php echo $value ?>"><?php echo $value ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="CVV" class="">Inserisci CVV</label><br>
                <input class="form-control" id="CVV" type="text" name="firstname" placeholder="Inserisci CVV" pattern=".[0-9]{2,}" title="Il CVV è il numero collocato sul retro della carta" required>
                <div class="invalid-feedback"></div>
            </div>
        </div>
    </div>
</form>
