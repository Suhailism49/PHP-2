<!DOCTYPE html>
<html lang="nl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tekst Formatter</title>
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
       textarea {
           width: 100%;
           padding: 8px;
           border: 1px solid #ddd;
           border-radius: 4px;
           margin-bottom: 15px;
           min-height: 100px;
       }
       .radio-group {
           margin-bottom: 15px;
       }
       .radio-option {
           margin: 8px 0;
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
       .result {
           margin-top: 20px;
           padding: 15px;
           background-color: white;
           border-radius: 4px;
           border: 1px solid #ddd;
       }
       h3 {
           color: #333;
           margin-bottom: 10px;
       }
</style>
</head>
<body>
<div class="container">
<h2>Tekst Formatter</h2>
<form method="post">
<div class="form-group">
<label for="tekst">Voer uw tekst in:</label><br>
<textarea id="tekst" name="tekst" required><?php echo isset($_POST['tekst']) ? htmlspecialchars($_POST['tekst']) : ''; ?></textarea>
</div>
<div class="radio-group">
<div class="radio-option">
<input type="radio" id="hoofdletters" name="formaat" value="hoofdletters"
<?php echo (isset($_POST['formaat']) && $_POST['formaat'] == 'hoofdletters') ? 'checked' : ''; ?>>
<label for="hoofdletters">Alles in hoofdletters</label>
</div>
<div class="radio-option">
<input type="radio" id="kleineletters" name="formaat" value="kleineletters"
<?php echo (isset($_POST['formaat']) && $_POST['formaat'] == 'kleineletters') ? 'checked' : ''; ?>>
<label for="kleineletters">Alles in kleine letters</label>
</div>
<div class="radio-option">
<input type="radio" id="eerstehoofdletter" name="formaat" value="eerstehoofdletter"
<?php echo (isset($_POST['formaat']) && $_POST['formaat'] == 'eerstehoofdletter') ? 'checked' : ''; ?>>
<label for="eerstehoofdletter">Eerste letter van elke zin als hoofdletter</label>
</div>
<div class="radio-option">
<input type="radio" id="woordhoofdletters" name="formaat" value="woordhoofdletters"
<?php echo (isset($_POST['formaat']) && $_POST['formaat'] == 'woordhoofdletters') ? 'checked' : ''; ?>>
<label for="woordhoofdletters">Eerste letter van elk woord als hoofdletter</label>
</div>
</div>
<button type="submit">Tekst formatteren</button>
</form>
<?php
       if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tekst']) && isset($_POST['formaat'])) {
           $tekst = $_POST['tekst'];
           $formaat = $_POST['formaat'];
           $resultaat = '';
           switch ($formaat) {
               case 'hoofdletters':
                   $resultaat = strtoupper($tekst);
                   break;
               case 'kleineletters':
                   $resultaat = strtolower($tekst);
                   break;
               case 'eerstehoofdletter':
                   // Splits de tekst in zinnen en maak eerste letter hoofdletter
                   $zinnen = preg_split('/([.!?]+)/', $tekst, -1, PREG_SPLIT_DELIM_CAPTURE);
                   $resultaat = '';
                   for ($i = 0; $i < count($zinnen); $i++) {
                       if ($i % 2 == 0) {
                           $zin = trim($zinnen[$i]);
                           if (!empty($zin)) {
                               $resultaat .= ucfirst(strtolower($zin));
                           }
                       } else {
                           $resultaat .= $zinnen[$i] . ' ';
                       }
                   }
                   break;
               case 'woordhoofdletters':
                   $resultaat = ucwords(strtolower($tekst));
                   break;
           }
           echo '<div class="result">';
           echo '<h3>Geformatteerde tekst:</h3>';
           echo nl2br(htmlspecialchars($resultaat));
           echo '</div>';
       }
       ?>
</div>
</body>
</html>