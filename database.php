<?php 
 $servername = "127.0.0.1";
 $username = "root";
 $password = "";
 $database = "bureau-etude";
try {
     $pdo= new PDO("mysql:host=$servername;dbname=$database", $username,);
     // 2-Configurer le mode d'erreur pour lancer des exceptions
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     echo "<div style='background-color:#3c763d; color:white;'>Connexion à la base de donnée réussie</div>";
     
 } catch(PDOException $e) {
     echo "<div style='color:red;'>La connexion à la base de données a échoué :</div> " . $e->getMessage();
 }
 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
 </head>
 <body>
 <script src="script.js"></script>
 </body>
 </html>