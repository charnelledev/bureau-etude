


<?php
session_start();
require_once "database.php";

// Affichage des produits
$sql = "SELECT * FROM nomenclature";
$req_select = $pdo->prepare($sql);
$req_select->execute();
$nomenclature = $req_select->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>nomenclature</title>

  <style>
    body {
      font-family: Arial, sans-serif;
      padding: 30px;
      background-color: #f9f9f9;
    }
    h1 {
      text-align: center;
      color: #333;
    }
    form {
      max-width: 400px;
      margin: 20px auto;
      padding: 20px;
      background: #fff;
      border: 1px solid #ddd;
      border-radius: 8px;
    }
    input[type="text"], button {
      width: 100%;
      padding: 10px;
      margin: 8px 0;
      box-sizing: border-box;
    }
    button {
      background-color:rgb(219, 52, 183);
      border: none;
      color: white;
      font-weight: bold;
      cursor: pointer;
      border-radius: 4px;
    }
      
    button:hover {
      background-color:rgb(185, 41, 137);
    }
    table {
      width: 80%;
      margin: 30px auto;
      border-collapse: collapse;
      background-color: white;
    }
    th, td {
      border: 1px solid #ddd;
      padding: 12px;
      text-align: left;
    }
    th {
      background-color: #f2f2f2;
    }
    .actions a {
      margin-right: 10px;
      text-decoration: none;
      color: #3498db;
    }
    .actions a:hover {
      text-decoration: underline;
    }

    .mes {
    padding: 80px;
    

    }
  </style>
</head>
<body>

  <h1>liste des nomenclature</h1>

  <a  href="create.php">ajouter une nomenclature</a>

  <table>
    <thead>
      <tr>
        <th>produit</th>
        <th>composant</th>
        <th>quantiter</th>
      </tr>
    </thead>
    <tbody>
      <?php if (count($nomenclature) > 0): ?>
        <?php foreach ($nomenclature as $p): ?>
          <tr>
            <td><?= htmlspecialchars($p['produit']) ?></td>
            <td><?= htmlspecialchars($p['composant']) ?></td>
            <td><?= htmlspecialchars($p['quanter']) ?></td>
          </tr>
        <?php endforeach; ?>
      <?php else: ?>
        <tr><td colspan="3">Aucun nomenclature  trouvé.</td></tr>
      <?php endif; ?>
    </tbody>
  </table>
  <div class="mes">
  <button><a href="create.php">produits</a></button>
    <button><a href="create-component.php">composant</a></button>
    <button><a href="create-nomenclature.php">nomenclature</a></button>
      </div>
      <script src="script.js"></script>
</body>
</html>






<