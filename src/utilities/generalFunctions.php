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

     function replaceGetMethod($value)
     {
          return str_replace(" ", "+", $value);
     }

     function parseUserPermission($value)
     {
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
?>
