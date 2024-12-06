<?php
date_default_timezone_set("Europe/Amsterdam");
$hour = date("H");

if ($hour >= 6 && $hour < 12) {
    echo "Goedemorgen!";
} elseif ($hour >= 12 && $hour < 18) {
    echo "Goedemiddag!";
} elseif ($hour >= 18 && $hour < 22) {
    echo "Goedenavond!";
} else {
    echo "Goedenacht!";
}
?>
