<?php
require_once "./database.php";
$message = "";
function clean_input($data){
  return htmlspecialchars(stripslashes(trim($data)));
  
}

if(isset($_POST['create'])){
  $produit = $_POST['produit'];
  $composant = $_POST['composant'];
  $quantite = $_POST['quantite'];
  
}
  if(empty($produit) || empty($composant)|| empty($quantite)){
    $message = ' <span> veillez remplir tous les information </span>';
}else{
  $sql_nomenclature = "SELECT * FROM nomenclature WHERE nomenclature = :nomenclature";
  $request_nomenclature= $pdo->prepare($sql_nomenclature);
  $request_nomenclatureit->execute(compact('nomenclature'));
  $nomenclature_exist= $request_nomenclature->fetch();

  if($produit_exist){
    $message = ' <span>se produits est deja nommer </span>';
  }else{
    $sql="INSERT INTO nomenclature(produit,composant,quantite) VALUES(:produit, :composant,:quantite)";
    $request= $pdo->prepare($sql);
    $request->execute(compact('produit','composant','quantite'));
    $message = ' <span">nomenclature ajouter  </span>';
  }

  $sql="INSERT INTO nomenclature(produit, composant, quantite) VALUES(:produit, :composant,:quantite)";
  $request= $pdo->prepare($sql);
  $request->execute(compact( 'produit','composant','quantite'));
  $message = ' <span> nomenclature ajouter avec succes</span>';

 
}



?>

<?php
session_start();
require_once "database.php";

// Ajout de produit
if (isset($_POST['add'])) {
    $produit = htmlspecialchars(trim($_POST['produit']));
    $composant = htmlspecialchars(trim($_POST['composant']));
    $quantite = htmlspecialchars(trim($_POST['quantite']));

    if (!empty($produit) && !empty($composant)&& !empty($quantite)) {
        $sql_insert = "INSERT INTO nomenclature (produit, composant, nomenclature) VALUES (:produit, :composant, :nomenclature)";
        $stmt = $pdo->prepare($sql_insert);
        $stmt->execute([
            'produit' => $produit,
            'composant' => $composant,
            'quantite' => $quantite
        ]);
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>nomenclature</title>
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

  <h1>Ajouter un une nomenclature</h1>

  <form method="POST" action="">
    <input type="text" name="produit" placeholder="nomenclature du produit" required>
    <input type="text" name="composant" placeholder="composant" required>
    <input type="decimal" name="quantite" placeholder="quantite" required>
    <button type="submit" name="add">Ajouter</button>
</form>

<div >
      <a  href="index-nomenclature.php">Retour a la iste
        des nomenclature
      </a>
    </div>
    <script src="script.js"></script>
    </body>


</html>

