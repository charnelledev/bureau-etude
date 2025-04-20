


<?php
session_start();
require_once('database.php');

$message = "";

if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "DELETE FROM produits WHERE id = ?";

        $query = $pdo->prepare($sql);

        $query->execute([$id]);

        if ($query->rowCount() > 0) {
          $message = "produit supprimer avec succes";
        } else {
        //   $message = "Aucun produit trouver a cette ID";
        }
}


?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title> Suprimer un produit</title>
</head>

<body>

  <body>
    <div>
      <!-- <h1>Supprimer un produit</h1> -->
      <?php if (isset($message)) : ?>
      <p><?= htmlspecialchars($message); ?></p>
      <?php endif; ?>
    </div>
    <div >
      <a  href="index-produit.php">Retour a la iste
        des produits
      </a>
    </div>
    <script src="script.js"></script>
  </body>


</html>






