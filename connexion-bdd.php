<?php 
// connexion base de donnée
$connexion = new PDO(
"mysql:host=localhost;dbname=evaluation_php",
'root',
'',
);
$connexion->setAttribute(
    PDO::ATTR_ERRMODE,
    PDO::ERRMODE_EXCEPTION
);
 ?>