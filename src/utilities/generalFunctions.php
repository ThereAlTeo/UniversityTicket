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
         return array(array(1, 8), array(4, 8), array(2, 8), array(3, 8));
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
?>
