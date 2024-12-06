<?php
date_default_timezone_set("Europe/Amsterdam");
$hour = date("H");

switch (true) {
    case ($hour >= 6 && $hour < 12):
        echo "Goedemorgen!";
        break;
    case ($hour >= 12 && $hour < 18):
        echo "Goedemiddag!";
        break;
    case ($hour >= 18 && $hour < 22):
        echo "Goedenavond!";
        break;
    default:
        echo "Goedenacht!";
}
?>
