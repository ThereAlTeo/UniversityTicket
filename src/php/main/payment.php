<div class="accordion" id="accordionPayment">
    <?php foreach ($dbh->getPaymentMode() as $key => $value):
        $paymentRadioID = "paymentRadio".$value["IDPayment"];
        $collapseID = "collapse".str_replace(" ", "", $value["Nome"]);
        $headingID = "heading".$value["IDPayment"];
        ?>
        <div class="card">
          <div class="card-header" id="<?php echo $headingID ?>">
              <div class="col-9">
                  <div class="custom-control custom-radio custom-control-inline">
                      <input type="radio" id="<?php echo $paymentRadioID ?>"  name="paymentRadio" class="custom-control-input" data-toggle="collapse" data-target="#<?php echo $collapseID ?>" aria-expanded="false" aria-controls="<?php echo $collapseID ?>">
                      <label class="custom-control-label font-weight-bold h6 text-ticketBlue" for="<?php echo $paymentRadioID ?>"><?php echo $value["Nome"] ?></label>
                  </div>
              </div>
          </div>
          <div id="<?php echo $collapseID ?>" class="collapse" aria-labelledby="<?php echo $headingID ?>" data-parent="#accordionPayment">
            <div class="card-body">
                <?php
                    $_GET["paymentCardBody"] = $value;
                    require PAYMENT_DIR.getPaymentFormSection($value["IDPayment"]);
                    unset($_GET["paymentCardBody"]);
                ?>
            </div>
          </div>
        </div>
    <?php endforeach; ?>
</div>
<div class="row d-flex flex-sm-row-reverse mt-3">
    <div class="col-sm-6">
        <a class="btn btn-outline-ticketBlue btn-block" type="submit" id="payment" href="#" role="button">Effettua il pagamento</a>
    </div>
</div>
