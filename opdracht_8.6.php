<?php
session_start();
// Initialiseer de sessievariabele als die nog niet bestaat
if (!isset($_SESSION['cijfers'])) {
   $_SESSION['cijfers'] = [];
}
$melding = '';
$gemiddelde = 0;
$aantalCijfers = count($_SESSION['cijfers']);
// Verwerk het formulier als er een cijfer is ingediend
if (isset($_POST['cijfer'])) {
   $cijfer = str_replace(',', '.', $_POST['cijfer']); // Vervang komma door punt
   $cijfer = floatval($cijfer);
   // Controleer of het cijfer geldig is (tussen 1,0 en 10,0)
   if ($cijfer >= 1.0 && $cijfer <= 10.0) {
       $_SESSION['cijfers'][] = $cijfer;
       $aantalCijfers = count($_SESSION['cijfers']);
       $melding = "Cijfer $cijfer is toegevoegd.";
   } else {
       $melding = "Ongeldig cijfer! Voer een cijfer in tussen 1,0 en 10,0.";
   }
}
// Bereken het gemiddelde als er cijfers zijn
if ($aantalCijfers > 0) {
   $gemiddelde = array_sum($_SESSION['cijfers']) / $aantalCijfers;
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cijfer Gemiddelde Calculator</title>
<style>
       body {
           font-family: Arial, sans-serif;
           max-width: 600px;
           margin: 20px auto;
           padding: 20px;
       }
       .container {
           background-color: #f5f5f5;
           padding: 20px;
           border-radius: 5px;
           box-shadow: 0 2px 4px rgba(0,0,0,0.1);
       }
       .form-group {
           margin-bottom: 15px;
       }
       input[type="text"] {
           padding: 8px;
           border: 1px solid #ddd;
           border-radius: 4px;
           width: 100px;
       }
       button {
           background-color: #4CAF50;
           color: white;
           padding: 10px 15px;
           border: none;
           border-radius: 4px;
           cursor: pointer;
       }
       button:hover {
           background-color: #45a049;
       }
       .melding {
           margin-top: 10px;
           padding: 10px;
           border-radius: 4px;
       }
       .resultaat {
           margin-top: 20px;
           padding: 10px;
           background-color: #e7f3fe;
           border-radius: 4px;
       }
</style>
</head>
<body>
<div class="container">
<h2>Cijfer Gemiddelde Calculator</h2>
<form method="post">
<div class="form-group">
<label for="cijfer">Voer een cijfer in (1,0 - 10,0):</label><br>
<input type="text" id="cijfer" name="cijfer" required>
<button type="submit">Toevoegen</button>
</div>
</form>
<?php if ($melding): ?>
<div class="melding">
<?php echo htmlspecialchars($melding); ?>
</div>
<?php endif; ?>
<div class="resultaat">
<p>Aantal ingevoerde cijfers: <?php echo $aantalCijfers; ?></p>
<?php if ($aantalCijfers > 0): ?>
<p>Gemiddelde: <?php echo number_format($gemiddelde, 1); ?></p>
<?php endif; ?>
</div>
</div>
</body>
</html>