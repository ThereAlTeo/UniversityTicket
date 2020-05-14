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

    public function notifyNewUserRegistration($IDnewUser){
        // code...
    }

    public function notifyUserEnable($IDUser){
        // code...
    }

    public function insertNewReview($IDManager){
        // code...
    }

    public function sectorSoldOut($IDManager, $IDSector){
        // code...
    }

    public function eventSoldOut($IDManager, $IDSector){
        // code...
    }

    public function eventDeleted($IDEvent){
        // code...
    }
}
?>
