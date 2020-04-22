<?php
    $formID = str_replace(" ", "", $_GET["paymentCardBody"]["Nome"])."Form";
?>
<form class="text-ticketBlue py-md-2 needs-validation formInvalidFB" id="<?php echo $formID ?>" action="" method="POST" novalidate="">
    <p class="text-center font-weight-bold h4 mb-4">Inserisci informazioni relative all'account PayPal in tuo possesso</p>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <input class="form-control formControlUser" id="email"  type="email" name="email" placeholder="Inserisci E-mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="La mail deve rispettare le convenzioni internazionali" required>
                <div class="invalid-feedback"></div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <input type="password" name="password" id="password" class="form-control formControlUser" placeholder="Inserisci Password" pattern=".{6,}" title="La password deve contenere almeno 7 caratteri" required>
                <div class="invalid-feedback"></div>
            </div>
        </div>
    </div>
</form>
