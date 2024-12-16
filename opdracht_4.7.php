<?php
 
//auteur: Suhail Ismaili
//functie: spaargeld uitrekenen
 
$telefoonPrijs = 1000;
 
// Het spaargeld dat de gebruiker heeft
$spaargeld = 800;  // Pas dit aan om verschillende scenario's te testen
 
// Bereken het tekort of het overschot
$tekort = $telefoonPrijs - $spaargeld;
 
// Controleer de situatie
if ($spaargeld >= $telefoonPrijs) {
    $over = $spaargeld - $telefoonPrijs;  // Als er genoeg geld is, bereken het overschot
    echo "Je hebt genoeg geld om de telefoon te kopen! Je hebt nog €" . $over . " over voor een hoesje.";
} elseif ($tekort > 250) {
    echo "Je hebt te weinig spaargeld om de telefoon te kopen. Je komt €" . $tekort . " te kort. Misschien kun je beter een baantje zoeken!";
} else {
    echo "Je komt €" . $tekort . " te kort, maar je bent er bijna!";
}
?>