<?php
 
//auteur: Suhail Ismaili
//functie: weet het huidige uur
 
 
$currentHour = date("H");  // Haal het huidige uur op in 24-uurs formaat
 
// Invoer van de gebruiker voor de temperatuur en luchtvochtigheid
$temperature = 22;  // Vervang dit door een dynamische invoer als gewenst (bijv. via een formulier)
$humidity = 80;  // Vervang dit door een dynamische invoer als gewenst (bijv. via een formulier)
 
// Beslissing of de airco aan of uit moet
if ($currentHour >= 17 || ($temperature < 20 && $humidity < 85)) {
    echo "De airco is UIT.";
} else {
    echo "De airco is AAN.";
}
?>
 
 
opdracht 6
 
<?php
 
//auteur: Suhail Ismaili
//functie: spaargeld uitrekenen
 
$telefoonPrijs = 1000;