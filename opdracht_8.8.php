<?php
session_start();
// Initialiseer de sessievariabele als die nog niet bestaat
if (!isset($_SESSION['fruitmand'])) {
   $_SESSION['fruitmand'] = [];
}
// Verwerk het formulier
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   if (isset($_POST['fruit']) && !empty($_POST['fruit'])) {
       // Voeg fruit toe
       $_SESSION['fruitmand'][] = htmlspecialchars($_POST['fruit']);
   }
   elseif (isset($_POST['sorteer'])) {
       // Sorteer de array van A naar Z
       sort($_SESSION['fruitmand']);
   }
   elseif (isset($_POST['schud'])) {
       // Schud de array door elkaar
       shuffle($_SESSION['fruitmand']);
   }
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Fruitmand Beheer</title>
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
           width: 200px;
           margin-right: 10px;
       }
       button {
           padding: 8px 15px;
           border: none;
           border-radius: 4px;
           cursor: pointer;
           margin-right: 5px;
           color: white;
       }
       .toevoegen {
           background-color: #4CAF50;
       }
       .sorteer {
           background-color: #2196F3;
       }
       .schud {
           background-color: #ff9800;
       }
       button:hover {
           opacity: 0.9;
       }
       .fruitmand {
           margin-top: 20px;
           padding: 15px;
           background-color: white;
           border-radius: 4px;
           border: 1px solid #ddd;
       }
       .fruit-item {
           padding: 5px;
           margin: 2px 0;
           border-bottom: 1px solid #eee;
       }
       .fruit-item:last-child {
           border-bottom: none;
       }
       h3 {
           color: #333;
           margin-bottom: 10px;
       }
</style>
</head>
<body>
<div class="container">
<h2>Fruitmand Beheer</h2>
<form method="post">
<div class="form-group">
<input type="text" name="fruit" placeholder="Voer een fruitsoort in" required>
<button type="submit" name="toevoegen" class="toevoegen">Toevoegen</button>
</div>
<div class="form-group">
<button type="submit" name="sorteer" class="sorteer">Sorteer A-Z</button>
<button type="submit" name="schud" class="schud">Schud door elkaar</button>
</div>
</form>
<div class="fruitmand">
<h3>Inhoud van de fruitmand:</h3>
<?php if (empty($_SESSION['fruitmand'])): ?>
<p>De fruitmand is nog leeg.</p>
<?php else: ?>
<?php foreach ($_SESSION['fruitmand'] as $fruit): ?>
<div class="fruit-item">
<?php echo htmlspecialchars($fruit); ?>
</div>
<?php endforeach; ?>
<?php endif; ?>
</div>
</div>
</body>
</html>