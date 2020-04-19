<?php
include './../bootFiles.php';

function createSectorArray($IDSector, $QNT){
    return array("IDSector" => $IDSector, "QNT" => $QNT);
}

function createTicketItem($IDSector, $QNT){
    return array(createSectorArray($IDSector, $QNT));
}

$msg = array("error"=>"It is not possible to access the data entered.");
if(isset($_POST) && isset($_POST['mode'])){
    switch ($_POST['mode']) {
        case "create":
            if(isset($_COOKIE["checkout"])){
                $ticket = unserialize($_COOKIE["checkout"]);
                if(array_key_exists($_POST['IDEvent'], $ticket)) {
                    $idSectors = array_column($ticket[$_POST['IDEvent']], 'IDSector');
                    if (in_array($_POST['IDSector'], $idSectors)) {
                        $msg = array("error"=> "Posti già selezionati per questo settore.");
                        echo json_encode($msg);
                        die;
                    } else
                        array_push($ticket[$_POST['IDEvent']], createSectorArray($_POST['IDSector'], $_POST['qnt']));
                } else
                    $ticket[$_POST['IDEvent']] = createTicketItem($_POST['IDSector'], $_POST['qnt']);
            } else {
                $ticket = array();
                $ticket[$_POST['IDEvent']] = createTicketItem($_POST['IDSector'], $_POST['qnt']);
            }

            $msg = array("success"=> array('Text' => "I biglietti sono stati aggiunti correttamente al carrello.", 'NumProduct' => getNumticketInOrder($ticket)));
            setcookie ("checkout", serialize($ticket), strtotime("+7 days"), "/");
            break;
        case "delete":
            setcookie("checkout", null, time() - 3600, "/");
            $msg = array("error"=>"Credenziali inserite non corrette.");
            break;
        case "checkoutNum":
            if(isset($_COOKIE["checkout"])){
                if(getNumticketInOrder(unserialize($_COOKIE["checkout"])))
                    $msg = array("success"=> "E' possibile accedere al carrello.");
                else
                    $msg = array("info"=> "Non è possibile accedere al carrello quando risulta vuoto.");
            } else
                $msg = array("info"=> "Non è possibile accedere al carrello quando risulta vuoto.");
            break;
        case "update":
            try {
                $ticket = unserialize($_COOKIE["checkout"]);
                foreach ($ticket[$_POST['IDEvent']] as $key => $value) {
                    if ($value["IDSector"] == $_POST['IDSector']) {
                        $ticket[$_POST['IDEvent']][$key]["QNT"]--;
                        if(!$ticket[$_POST['IDEvent']][$key]["QNT"])
                            unset($ticket[$_POST['IDEvent']][$key]);
                        break;
                    }
                }

                if(!count($ticket[$_POST['IDEvent']]))
                    unset($ticket[$_POST['IDEvent']]);

                if(count($ticket))
                    setcookie ("checkout", serialize($ticket), strtotime("+7 days"), "/");
                else
                    setcookie("checkout", null, time() - 3600, "/");

                $msg = array("success"=> "Completate le operazioni");
            } catch (Exception $e) {
                $msg = array("error"=> "Non è possibile eliminare questo biglietto.");
            }
            break;
        default: throw new Exception("Error Processing Request", 1);
    }
}

echo json_encode($msg);
die;
?>
