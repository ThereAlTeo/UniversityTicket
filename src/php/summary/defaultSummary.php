<div class="card mb-4 shadow-sm border-ticketBlue text-ticketBlue">
    <h5 class="card-header font-weight-bold text-white bg-ticketBlue">Riepilogo</h5>
    <div class="card-body">
        <?php
        foreach ($_SESSION["ticketGeneralInfo"] as $key => $value):
            $numTicket = $totPrice = 0;
            foreach ($value["Sector"] as $index => $item){
                $numTicket++;
                $totPrice += $item["Price"];
            }
            ?>
            <div class="eventSummary mb-3">
                <div class="row">
                    <div class="col-9">
                        <p class="h5"><?php echo $numTicket."x".$value["Title"] ?></p>
                    </div>
                    <div class="col-3">
                        <p class="h5 text-right">€<?php echo $totPrice ?></p>
                    </div>
                </div>
                <p class="h6"><?php echo $value["LocationName"] ?></p>
                <p class="h6"><?php echo $value["Date"] ?></p>
            </div>
        <?php endforeach; ?>
        <div class="row mt-4 text-muted">
            <div class="col-9">
                <p class="h6">Spese di prevendita</p>
            </div>
            <div class="col-3">
                <p class="h6 text-right">€<?php echo $_SESSION["ticketFinalPrice"]["Prevendita"] ?></p>
            </div>
        </div>
        <?php
        $totalPrice = $_SESSION["ticketFinalPrice"]["SubTotal"] + $_SESSION["ticketFinalPrice"]["Prevendita"];
        if(isset($_SESSION["ticketDelivery"])): ?>
            <div class="row mt-4 text-muted">
                <div class="col-9">
                    <p class="h6"><?php echo $_SESSION["ticketDelivery"]["Nome"] ?></p>
                </div>
                <div class="col-3">
                    <p class="h6 text-right">€<?php echo $_SESSION["ticketDelivery"]["Prezzo"] ?></p>
                </div>
            </div>
        <?php
        $totalPrice += $_SESSION["ticketDelivery"]["Prezzo"];
        endif; ?>
    </div>
     <div class="card-footer text-white bg-ticketBlue">
         <div class="row">
             <div class="col-8">
                 <p class="h5 font-weight-bold">Totale Prezzo Biglietti</p>
             </div>
             <div class="col-4">
                 <p class="h5 text-right font-weight-bold">€<?php echo $totalPrice ?></p>
             </div>
         </div>
     </div>
</div>
