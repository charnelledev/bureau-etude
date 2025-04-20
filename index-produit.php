


<?php
session_start();
require_once "database.php";

// Ajout de produit
// if (isset($_POST['add'])) {
//     $libeller = htmlspecialchars(trim($_POST['libeller']));
//     $description = htmlspecialchars(trim($_POST['description']));

//     if (!empty($libeller) && !empty($description)) {
//         $sql_insert = "INSERT INTO produits (libeller, description) VALUES (:libeller, :description)";
//         $stmt = $pdo->prepare($sql_insert);
//         $stmt->execute([
//             'libeller' => $libeller,
//             'description' => $description
//         ]);
//     }
// }

// Affichage des produits
$sql = "SELECT * FROM produits ORDER BY id DESC";
$req_select = $pdo->prepare($sql);
$req_select->execute();
$produits = $req_select->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>produit</title>

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
<!-- 
  <h1>Ajouter un produit</h1>

  <form method="POST" action="">
    <input type="text" name="libeller" placeholder="Libellé du produit" required>
    <input type="text" name="description" placeholder="Description" required>
    <button type="submit" name="add">Ajouter</button>
  </form> -->

  <h1>Liste des produits</h1>

  <a  href="create.php">ajouter un nouveaux produit</a>

  <table>
    <thead>
      <tr>
        <th>Libellé</th>
        <th>Description</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php if (count($produits) > 0): ?>
        <?php foreach ($produits as $p): ?>
          <tr>
            <td><?= htmlspecialchars($p['libeller']) ?></td>
            <td><?= htmlspecialchars($p['description']) ?></td>
            <td class="actions">
              <a href="update.php?id=<?= $p['id'] ?>">Modifier</a>
              <a href="delete.php?id=<?= $p['id'] ?>" onclick="return confirm('Supprimer ce produit ?');">Supprimer</a>
            </td>
          </tr>
        <?php endforeach; ?>
      <?php else: ?>
        <tr><td colspan="3">Aucun produit trouvé.</td></tr>
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




