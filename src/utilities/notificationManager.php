<?php
class NotificationManager {
    private $adminMails;
    private $dbh;
    private $mail;
    function __construct($dbh, $mail) {
        $this->adminMails = array();
        $this->dbh = $dbh;
        $this->mail = $mail;

        foreach ($this->dbh->getAllUser() as $key => $value)
            array_push($this->adminMails, $value);
    }

    private function insertNewMessageInSecretary($IDUser, $Message){
        return $this->dbh->insertNewMessageInSecretary($IDUser, $Message);
    }

    private function sendMail($MailTo, $MailBody){
        return $this->mail->sendMail($MailTo, "Universityticket Notifica", $MailBody);
    }

    public function notifyFactory($IDUser, $MailTo, $Message){
        $this->insertNewMessageInSecretary($IDUser, $Message);
        $this->sendMail($MailTo, $Message);
    }

    public function notifyNewUserRegistration($MailnewUser){
        foreach ($this->adminMails as $key => $value)
            $this->notifyFactory($value["IDUser"], $value["Email"], "L'account ".$MailnewUser." ha appena compiuto la registrazione.\nAbilitalo e rendilo subito operativo.");

        $user = $this->dbh->getAccountAccessInfo($MailnewUser);
        $this->notifyFactory($user["IDUser"], $user["Email"], "Grazie per esserti registrato al nostro servizio.");
    }

    public function notifyUserEnable($MailUser){
        $user = $this->dbh->getAccountAccessInfo($MailUser);
        $this->notifyFactory($user["IDUser"], $user["Email"], "Sei stato abilitato dall'admin.\nPuò ora usufruire di tutti i servizi a tua disposizione.");
    }

    public function insertNewReview($IDManager){
        $user = $this->dbh->getAccountAccessInfo($IDManager);
        $this->notifyFactory($user["IDUser"], $user["Email"], "E' stata inserita una recensione per un evento da te organizzato.");
    }

    public function sectorSoldOut($IDEvent, $IDSector){
        $event = $this->dbh->getGeneralInfoByIDEvent($IDEvent);
        if (count($event)) {
            $user = $this->dbh->getAccountAccessInfo($event[0]["Email"]);
            $sectorInfo = $this->dbh->getRateEvent($IDEvent, $IDSector);
            if (count($sectorInfo)) {
                $message = "Il settore \"".$sectorInfo[0]["Nome"]."\" dell'evento con titolo\"".$event[0]["Titolo"]."\" è ufficialmente SOLDOUT.\nCONGRATULAZIONI!!!";
                foreach ($this->adminMails as $key => $value)
                    $this->notifyFactory($value["IDUser"], $value["Email"], $message);

                $this->notifyFactory($user["IDUser"], $user["Email"], $message);
            }
        }
    }

    public function eventSoldOut($IDEvent){
        $event = $this->dbh->getGeneralInfoByIDEvent($IDEvent);
        if (count($event)) {
            $user = $this->dbh->getAccountAccessInfo($event[0]["Email"]);
            $message = "L'evento con titolo\"".$event[0]["Titolo"]."\" è ufficialmente SOLDOUT.\nCONGRATULAZIONI!!!";
            foreach ($this->adminMails as $key => $value)
                $this->notifyFactory($value["IDUser"], $value["Email"], $message);

            $this->notifyFactory($user["IDUser"], $user["Email"], $message);

            $message = "L'evento con titolo\"".$event[0]["Titolo"]."\" fissato per il" .getEventDate(date_format(date_create($event[0]["DataInizio"]), 'Y m d H:i'))." è SOLDOUT.\nBUON DIVERTIMENTO!!!";
            foreach ($this->dbh->getAllParticipantsByEvent($IDEvent) as $key => $value)
                $this->notifyFactory($value["IDUser"], $value["Email"], $message);
        }
    }

    public function eventDeleted($IDEvent){
        $event = $this->dbh->getGeneralInfoByIDEvent($IDEvent);
        if (count($event)) {
            $message = "L'evento con titolo\"".$event[0]["Titolo"]."\" è stato cancellato.";
            foreach ($this->adminMails as $key => $value)
                $this->notifyFactory($value["IDUser"], $value["Email"], $message);

            foreach ($this->dbh->getAllParticipantsByEvent($IDEvent) as $key => $value)
                $this->notifyFactory($value["IDUser"], $value["Email"], $message."\nA breve riceverai info in merito al rimborso.\nGRAZIE!");
        }
    }

    public function notifyTicketPurchased(){
        $event = $this->dbh->getGeneralInfoByIDEvent($_SESSION["accountLog"]["Mail"]);
        $message = "Ciao ".$_SESSION["accountLog"]["Mail"].",\n";
        $message = $message."Il resoconto del tuo acquisto è il seguente:\n";
        foreach ($_SESSION["ticketGeneralInfo"] as $key => $value){
            $numTicket = $totPrice = 0;
            foreach ($value["Sector"] as $index => $item){
                $numTicket++;
                $totPrice += $item["Price"];
            }
            $message = $message.$numTicket."x".$value["Title"].": ".$totPrice."\n";
        }

        $message = $message."Ti ringraziamo per aver utilizziato il nostro servizio e ti invitiamo a farci visita di nuovo.\n";

    }
}
?>
