<?php
// config part
$dbhost = "";
$dbport ="";
$dbuser = "";
$dbpass = "";
$dbname = "";

// BDD connexion
try {
  $conn = new PDO('mysql:host='.$dbhost.';dbport='. $dbport.';dbname='.$dbname.';charset=utf8',$dbuser,$dbpass);
} catch (Exception $e) 
{
  die('Erreur : ' .$e -> getMessage());
};

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>