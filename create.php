<?php
session_start();
require_once "database.php";

// Ajout de produit
if (isset($_POST['add'])) {
    $libeller = htmlspecialchars(trim($_POST['libeller']));
    $description = htmlspecialchars(trim($_POST['description']));

    if (!empty($libeller) && !empty($description)) {
        $sql_insert = "INSERT INTO produits (libeller, description) VALUES (:libeller, :description)";
        $stmt = $pdo->prepare($sql_insert);
        $stmt->execute([
            'libeller' => $libeller,
            'description' => $description
        ]);
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>produit</title>
    <style>
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
    </style>
</head>
<body>

  <h1>Ajouter un produit</h1>

  <form method="POST" action="">
    <input type="text" name="libeller" placeholder="Libellé du produit" required>
    <input type="text" name="description" placeholder="Description" required>
    <button type="submit" name="add">Ajouter</button>
</form>

<div >
      <a  href="index-produit.php">Retour a la iste
        des produits
      </a>
    </div>
    <script src="script.js"></script>
    </body>


</html>