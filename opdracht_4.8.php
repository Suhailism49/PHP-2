<?php
 
//auteur: Suhail Ismaili
//functie: bepalen aan de hand van leeftijd
 
// Variabelen
$leeftijd = 17;  // Leeftijd van de persoon
$stempas = true;  // Heeft de persoon een stempas? true = ja, false = nee
 
// Controle voor scooter rijbewijs
if ($leeftijd >= 16) {
    echo "Je mag een scooter rijbewijs halen.<br>";
} else {
    echo "Je mag geen scooter rijbewijs halen. Je moet minimaal 16 jaar oud zijn.<br>";
}
 
// Controle voor stemmen
if ($leeftijd >= 18) {
    if ($stempas) {
        echo "Je mag stemmen, je hebt een stempas ontvangen.<br>";
    } else {
        echo "Je mag stemmen, maar je hebt geen stempas ontvangen.<br>";
    }
} else {
    echo "Je mag niet stemmen, je moet minimaal 18 jaar oud zijn.<br>";
}
?>