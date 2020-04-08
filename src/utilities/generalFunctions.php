<?php
     function println($Value) {
          echo $Value."\n";
     }

     function printTabln($Value, int $tabNumber) {
          $item = $Value;

          for ($x = 0; $x < $tabNumber; $x++)
               $item = "\t".$item;

          println($item);
     }

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
          switch ($_SESSION["accountLog"][1]) {
               case 1:
                    return array("Aggiungi" => array(array("Locale", "insertLocation.php", "fas fa-map-marker-alt"), array("Account", "userData.php", "fas fa-user-circle")));
               case 2:
                    return array("Visualizza" => array(array("Eventi", "eventBase.php", "far fa-calendar-alt"), array("Artisti", "artistBase.php", "fas fa-user-tie")));
                    break;
               default:
                    return array();
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
         return isset($item["NomeDArte"]) ? $item["NomeDArte"] : $item["Nome"].$item["Cognome"];
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

     function getEventDate($value) {
         $date = explode(" ", $value);
         return $date[2]." ".convertNumberInMonth($date[1])." ".$date[0]." ".$date[3];
     }
?>
