<?php
$producten = [
    "Laptop" => 200,
    "Muis" => 50,
    "Toetsenbord" => 40,
    "Monitor" => 180,
    "USB-stick" => 25
];

foreach ($producten as $product => $prijs) {
    if ($prijs > 150) {
        $nieuwePrijs = $prijs * 1.19; // 19% duurder
    } elseif ($prijs < 55) {
        $nieuwePrijs = $prijs * 1.11; // 11% duurder
    } else {
        $nieuwePrijs = $prijs;
    }

    echo $product . " kost nu: €" . number_format($nieuwePrijs, 2, ',', '.') . "<br>";
}
?>
