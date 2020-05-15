<?php
class NotificationManager {
    private $adminMails;
    private $dbh;

    function __construct($dbh) {
        $this->adminMails = array();
        $this->dbh = $dbh;

        foreach ($this->dbh->getAllUser() as $key => $value)
            array_push($this->adminMails, $value["Email"]);
    }

    private function insertNewMessageInSecretary($IDUser, $Message){
        $this->dbh->insertNewMessageInSecretary($IDUser, $Message);
    }

    public function notifyNewUserRegistration($MailnewUser){
        // code...
    }

    public function notifyUserEnable($MailUser){
        // code...
    }

    public function insertNewReview($IDManager){
        // code...
    }

    public function sectorSoldOut($IDEvent, $IDSector){
        // code...
    }

    public function eventSoldOut($IDEvent){
        // code...
    }

    public function eventDeleted($IDEvent){
        // code...
    }
}
?>
