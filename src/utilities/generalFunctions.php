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
?>
