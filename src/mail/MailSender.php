<?php
class MailSender {
    function __construct() { }

    public function sendMail($MailTo, $MailObject, $MailBody){
        if(isset($MailTo) && isset($MailObject) && isset($MailBody))
            return mail($MailTo, $MailObject, $MailBody);
        return false;
    }
}


?>
