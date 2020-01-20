<?php
switch ($_SESSION["accountLog"][1]) {
    case 1:
          require 'adminReservedArea.php';
        break;
    case 2:
        break;
    case 3:
        break;
    default: header("Location: reservedArea.php");
}
?>
