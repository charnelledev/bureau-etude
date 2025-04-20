<?php
// Démarrer la session
session_start();
require_once "database.php";

// Fonction pour sécuriser les entrées
function clean_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// Initialisation des variables
$libeller = $description = $cout = "";
$id = null;

// Vérifier si l'ID est passé via GET
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Sécuriser l'ID

    // Requête pour récupérer les informations du produit
    $sql = "SELECT * FROM composant WHERE id = :id";
    $request = $pdo->prepare($sql);
    $request->execute(['id' => $id]);
    $produit = $request->fetch();

    if ($produit) {
        $libeller = $produit['libeller'];
        $description = $produit['description'];
        $cout = $produit['cout'];
    }
}

// Si le formulaire est soumis pour mettre à jour le produit
if (isset($_POST['update'])) {
    $id = intval($_POST['id']); // Récupérer l'ID via POST aussi
    $libeller = clean_input($_POST['libeller']);
    $description = clean_input($_POST['description']);
    $cout = clean_input($_POST['cout']);

    // Requête de mise à jour
    $sql = "UPDATE composant 
            SET libelle = :libeller, description = :description, cout = :cout 
            WHERE id = :id";
    $request = $pdo->prepare($sql);
    $request->execute([
        'id' => $id,
        'libeller' => $libeller,
        'description' => $description,
        'cout' => $cout,
    ]);

    // Redirection après la mise à jour
    header("Location: index-component.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier le composant</title>
    <style>
        body {
            font-family: Arial;
            background-color: #f9f9f9;
            padding: 30px;
        }
        h1 {
            text-align: center;
            color: #444;
        }
        form {
            max-width: 400px;
            margin: auto;
            padding: 20px;
            background: #fff;
            border: 1px solid #ccc;
            border-radius: 8px;
        }
        input[type="text"], button {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            box-sizing: border-box;
        }
        button {
            background-color: rgb(219, 52, 183);
            color: white;
            border: none;
            font-weight: bold;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: rgb(185, 41, 137);
        }
        a {
            display: block;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
            color: #3498db;
        }
    </style>
</head>
<body>

<h1>Modifier les informations du composant</h1>

<form method="POST">
    <!-- Champ caché pour l'ID -->
    <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">

    <input type="text" name="libeller" placeholder="Libellé du produit" value="<?= htmlspecialchars($libeller) ?>" required>
    <input type="text" name="description" placeholder="Description" value="<?= htmlspecialchars($description) ?>" required>
    <input type="text" name="cout" placeholder="Coût" value="<?= htmlspecialchars($cout) ?>" required>

    <button type="submit" name="update">Modifier</button>
</form>

<a href="index-component.php">Retour à la liste des composant</a>

</body>
</html>