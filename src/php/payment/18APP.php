<?php
    $formID = str_replace(" ", "", $_GET["paymentCardBody"]["Nome"])."Form";
?>
<form class="text-center text-ticketBlue py-md-2 needs-validation formInvalidFB" id="<?php echo $formID ?>" action="" method="POST" novalidate="">
    <p class="font-weight-bold h4 mb-4">Inserisci il codice del buono in tuo possesso</p>
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            <div class="form-group">
                <label for="vaucherApp" form="18APPForm" hidden>Vaucher Nr.</label>
                <input class="form-control formControlUser" id="vaucherApp"  type="text" name="vaucherApp" placeholder="Inserisci codice" pattern=".{3,}" title="Il codice deve essere di almeno 3 caratteri" required/>
                <div class="invalid-feedback"></div>
            </div>
        </div>
    </div>
</form>
