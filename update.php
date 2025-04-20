<?php
require_once "./database.php";

function clean_input($data){
    return htmlspecialchars(stripslashes(trim($data)));
}

$message = "";

if (isset($_GET['id'])) {
    $id = clean_input($_GET['id']);
    $sql = "SELECT * FROM produits WHERE id = :id";
    $request = $pdo->prepare($sql);
    $request->execute(['id' => $id]);
    $produits = $request->fetch();

    if (!$produits) {
        die("Produit introuvable.");
    }

    $libeller = $produits['libeller'];
    $description = $produits['description'];
}

if (isset($_POST['update'])) {
    $libeller = clean_input($_POST['libeller']);
    $description = clean_input($_POST['description']);

    if (!empty($libeller) && !empty($description)) {
        $sql = "UPDATE produits SET libeller = :libeller, description = :description WHERE id = :id";
        $request = $pdo->prepare($sql);
        $success = $request->execute([
            'libeller' => $libeller,
            'description' => $description,
            'id' => $id
        ]);

        if ($success) {
            $message = "<p style='color:green;'>Produit mis à jour avec succès</p>";
        } else {
            $message = "<p style='color:red;'>Erreur lors de la mise à jour</p>";
        }
    } else {
        $message = "<p style='color:red;'>Tous les champs sont obligatoires</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Modifier un produit</title>
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

  <h1>Modifier les informations du produit</h1>

  <?= $message ?>

  <form method="POST" action="">
    <input type="text" name="libeller" placeholder="Libellé du produit" value="<?= htmlspecialchars($libeller ?? '') ?>" required>
    <input type="text" name="description" placeholder="Description" value="<?= htmlspecialchars($description ?? '') ?>" required>
    <button type="submit" name="update">Modifier</button>
  </form>

  <div>
    <a href="index-produit.php">Retour à la liste des produits</a>
  </div>

</body>
</html>
