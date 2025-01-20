<!DOCTYPE html>
<html lang="nl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Spaargeld Berekening</title>
<style>
       body {
           font-family: Arial, sans-serif;
           max-width: 800px;
           margin: 20px auto;
           padding: 20px;
           line-height: 1.6;
       }
       .container {
           background-color: #f5f5f5;
           padding: 20px;
           border-radius: 5px;
           box-shadow: 0 2px 4px rgba(0,0,0,0.1);
       }
       table {
           width: 100%;
           border-collapse: collapse;
           margin-top: 20px;
       }
       th, td {
           border: 1px solid #ddd;
           padding: 8px;
           text-align: right;
       }
       th {
           background-color: #4CAF50;
           color: white;
       }
       tr:nth-child(even) {
           background-color: #f2f2f2;
       }
       .conclusie {
           margin-top: 20px;
           padding: 15px;
           background-color: #e7f3fe;
           border-radius: 4px;
           font-weight: bold;
       }
</style>
</head>
<body>
<div class="container">
<h2>Spaargeld Berekening voor Geert</h2>
<?php
       function formateerBedrag($bedrag) {
           return '€ ' . number_format($bedrag, 2, ',', '.');
       }
       // Initiële waarden
       $startKapitaal = 100000;
       $rentePercentage = 4;
       $jaarlijkseOpname = 5000;
       $maximaleJaren = 100;
       $saldo = $startKapitaal;
       $jaar = 0;
       $rente = $rentePercentage / 100;
       $oneindigheidsBereikt = false;
       $tabel = [];
       // Bereken voor elk jaar
       while ($saldo > 0 && $jaar < $maximaleJaren) {
           $jaar++;
           // Bereken rente over het huidige saldo
           $renteOpbrengst = $saldo * $rente;
           // Nieuw saldo na rente
           $saldoNaRente = $saldo + $renteOpbrengst;
           // Saldo na opname
           $nieuwSaldo = $saldoNaRente - $jaarlijkseOpname;
           // Sla de gegevens op voor de tabel
           $tabel[] = [
               'jaar' => $jaar,
               'beginSaldo' => $saldo,
               'rente' => $renteOpbrengst,
               'saldoNaRente' => $saldoNaRente,
               'opname' => $jaarlijkseOpname,
               'eindSaldo' => $nieuwSaldo
           ];
           // Check of we doorgaan
           if ($nieuwSaldo <= 0) {
               break;
           }
           $saldo = $nieuwSaldo;
       }
       // Bepaal of Geert het zijn hele leven lang kan opnemen
       $oneindigheidsBereikt = ($jaar >= $maximaleJaren);
       ?>
<h3>Uitgangspunten:</h3>
<ul>
<li>Startkapitaal: <?php echo formateerBedrag($startKapitaal); ?></li>
<li>Rente: <?php echo $rentePercentage; ?>% per jaar</li>
<li>Jaarlijkse opname: <?php echo formateerBedrag($jaarlijkseOpname); ?></li>
</ul>
<div class="conclusie">
<?php
           if ($oneindigheidsBereikt) {
               echo "Geert kan het bedrag zijn hele leven lang blijven opnemen!";
           } else {
               echo "Geert kan " . $jaar . " jaar lang €5.000 opnemen voordat het geld op is.";
           }
           ?>
</div>
<h3>Gedetailleerd overzicht:</h3>
<table>
<tr>
<th>Jaar</th>
<th>Begin Saldo</th>
<th>Rente</th>
<th>Saldo na Rente</th>
<th>Opname</th>
<th>Eind Saldo</th>
</tr>
<?php foreach ($tabel as $rij): ?>
<tr>
<td><?php echo $rij['jaar']; ?></td>
<td><?php echo formateerBedrag($rij['beginSaldo']); ?></td>
<td><?php echo formateerBedrag($rij['rente']); ?></td>
<td><?php echo formateerBedrag($rij['saldoNaRente']); ?></td>
<td><?php echo formateerBedrag($rij['opname']); ?></td>
<td><?php echo formateerBedrag($rij['eindSaldo']); ?></td>
</tr>
<?php endforeach; ?>
</table>
</div>
</body>
</html>