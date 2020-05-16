<?php
     function replaceGetMethod($value) {
          return str_replace(" ", "+", $value);
     }

     function parseUserPermission($value) {
          switch ($value) {
               case "Admin":
                    return 1;
               case "Manager":
                    return 2;
               case "User":
                    return 3;
               default:
                    return 0;
          }
     }

     function getMenuItem(){
          switch ($_SESSION["accountLog"]["IDAccesso"]) {
               case 1:
                    return array("Aggiungi" => array(array("Locale", "insertLocation.php", "fas fa-map-marker-alt"), array("Account", "userData.php", "fas fa-user-circle")));
               case 2:
                    return array("Visualizza" => array(array("Eventi", "eventBase.php", "far fa-calendar-alt"), array("Artisti", "artistBase.php", "fas fa-user-tie")), "Info" => array(array("Recensioni", "review.php", "fas fa-pen-fancy")));
                    break;
                case 3: return array("Info" => array(array("Recensioni", "review.php", "fas fa-pen-fancy")));
                    break;
               default: return array();
          }
     }

     function getPairEventElement(){
         return array(array(1, 6), array(4, 6), array(2, 6), array(3, 6));
     }

     function copyFileInOtherDir($tmpFile, $newPathFile){
         return move_uploaded_file($tmpFile, $newPathFile);
     }

     function sqlFormatDatetime($input){
         if(strlen($input) > 8){
             $datetime = explode(" ", $input);
             $date = explode("-", $datetime[0]);
             $sqlFormat = $date[2]."-".$date[1]."-".$date[0];

             return $sqlFormat.(count($datetime) == 2 ? " ".$datetime[1].":00" : "");
         }

         return null;
     }

     function clearNameForPathValue($value){
         $values = explode(" ", $value);
         foreach ($values as $key => $item)
            $item = ucfirst(preg_replace("/[^a-zA-Z0-9]+/", "", $item));

         return join("", $values);
     }

     function getCorrectArtistName($item){
         return isset($item["NomeDArte"]) ? $item["NomeDArte"] : $item["Nome"]." ".$item["Cognome"];
     }

     function convertNumberInMonth($value){
         switch (intval($value)) {
             case 1: return "Gen";
             case 2: return "Feb";
             case 3: return "Mar";
             case 4: return "Apr";
             case 5: return "Mag";
             case 6: return "Giu";
             case 7: return "Lug";
             case 8: return "Ago";
             case 9: return "Set";
             case 10: return "Ott";
             case 11: return "Nov";
             case 12: return "Dic";
             default: throw new Exception("Error Processing Request", 1);
         }
     }

     function convertNumberInTextualDaby($value){
         switch (intval($value)) {
             case 1: return "Lunedì";
             case 2: return "Martedì";
             case 3: return "Mercoledì";
             case 4: return "Giovedì";
             case 5: return "Venerdì";
             case 6: return "Sabato";
             case 7: return "Domenica";
             default: throw new Exception("Error Processing Request", 1);
         }
     }

     function getEventDate($value) {
         $date = explode(" ", $value);
         return $date[2]." ".convertNumberInMonth($date[1])." ".$date[0]." ".$date[3];
     }

     function getPathImageOrDefault($Path = NULL){
         if(is_null($Path))
            return DEFAULT_IMAGE;
         elseif (!isset($Path["Locandina"]) || !file_exists(RES_DIR."images".$Path["Locandina"]))
             return DEFAULT_IMAGE;
         else
            return RES_DIR."images".$Path["Locandina"];
     }

    function getNumticketInOrder($ticket){
        $sum = 0;
        if (isset($ticket) && is_array($ticket)) {
            foreach ($ticket as $key => $value)
                $sum += count($value);
        }

        return $sum;
    }

    function getLongDateFormat($date){
        $date = explode(",", date_format(date_create($date), "N, d/m/Y H:i"));
        return convertNumberInTextualDaby($date[0]).",".$date[1];
    }

    function getPaymentFormSection($IDPayment){
        switch ($IDPayment) {
            case 1: return "creditCard.php";
            case 2: return "paypal.php";
            case 3: return "18APP.php";
            default: throw new Exception("Error Processing Request", 1);
        }
    }

    function getNoticeColor($index){
        switch ($index) {
            case 0: return "danger";
            case 1: return "info";
            case 2: return "warning";
            case 3: return "success";
            case 4: return "primary";
            case 5: return "ticketBlue";
            default: throw new Exception("Error Processing Request", 1);
        }
    }

    function circularMonthList($direction = false){
        $circularList = array();
        $actualMonth = date("m");

        for ($i=0; $i < 12; $i++){
            array_push($circularList, $actualMonth);

            if ($actualMonth == 1 && !$direction)
                $actualMonth = 13;
            elseif ($actualMonth == 12 && $direction)
                $actualMonth = 0;

            if ($direction)
                $actualMonth++;
            else
                $actualMonth--;
        }

        return $circularList;
    }

    function convertListNumberInListMonth($MonthValue){
        $convertValue = array();

        foreach ($MonthValue as $key => $value)
            array_push($convertValue, convertNumberInMonth($value));

        return $convertValue;
    }

    function mapMonthString($MonthValue){
        return "\"".$MonthValue."\"";
    }

    function mapMonthlyRevenue($MonthlyRevenue){
        $convertValue = array();

        foreach (circularMonthList() as $key => $value) {
            $insertDone = false;

            foreach ($MonthlyRevenue as $item) {
                if($item["acquistoMonth"] == $value){
                    array_push($convertValue, intval($item["TotalRevenue"]));
                    $insertDone = true;
                }
            }

            if (!$insertDone)
                array_push($convertValue, 0);
        }

        return $convertValue;
    }

    function mapMonthlyEvent($MonthlyEvent){
        $convertValue = array();

        foreach (circularMonthList(true) as $key => $value) {
            $insertDone = false;

            foreach ($MonthlyEvent as $item) {
                if($item["eventoMonth"] == $value){
                    array_push($convertValue, intval($item["EventNum"]));
                    $insertDone = true;
                }
            }

            if (!$insertDone)
                array_push($convertValue, 0);
        }

        return $convertValue;
    }

    function mapPieValues($pieValues){
        $pie = array();

        foreach (range(0, 2) as $value) {
            if(isset($pieValues[$value]))
                array_push($pie, array("Text" => getCorrectArtistName($pieValues[$value]), "Value" => $pieValues[$value]["EventNum"]));
            else
                array_push($pie, array("Text" => "Nan", "Value" => 0));
        }

        return $pie;
    }

    function convertPieValues($pieUserValues){
        $pieValues = array();

        foreach ($pieUserValues as $key => $value)
            array_push($pieValues, $value["Value"]);

        return $pieValues;
    }

    function mapPieTexts($pieUserValues){
        $pieTexts = array();

        foreach ($pieUserValues as $key => $value)
            array_push($pieTexts, "\"".$value["Text"]."\"");

        return $pieTexts;
    }
?>
